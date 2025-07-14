<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceEquipment;
use App\Models\InvoiceTransaction;
use App\Models\LabTechnicianTest;
use App\Models\Pet;
use App\Models\ServiceBilling;
use App\Models\Test;
use Illuminate\Http\Request;
use DB;

class AdminInvoiceController extends Controller
{
    public function invoice(Request $req)
    {
        $date = $req->input('date', now()->toDateString());
        $itemType = $req->input('item');
    
        // Step 1: Get invoices filtered by date
        $dataTypes = Invoice::latest()
            ->whereDate('created_at', $date)
            ->get();
    
        // Step 2: If item filter is applied, refine further
        if (!empty($itemType)) {
            $dataTypes = $dataTypes->filter(function ($invoice) use ($itemType) {
                $items = json_decode($invoice->items_arry, true);
    
                if (!is_array($items)) return false;
    
                return collect($items)->contains('item_type', $itemType);
            })->values(); // Reset keys
        }
    
        // Step 3: Get transactions summary for that date
        $transactions = InvoiceTransaction::whereDate('created_at', $date)
            ->selectRaw('
                SUM(total_amount - discount) as total_amount,
                SUM(total_cost) as total_cost,
                SUM(total_amount - discount - total_cost) as total_profit
            ')
            ->first();
    
        // Step 4: Handle possible nulls
        $total_amount = (float) ($transactions->total_amount ?? 0);
        $total_cost = (float) ($transactions->total_cost ?? 0);
        $total_profit = (float) ($transactions->total_profit ?? 0);
    
        return view('admin.invoice.index', compact(
            'dataTypes',
            'total_amount',
            'total_cost',
            'total_profit'
        ));
    }
    public function addInvoice(Request $request)
    {
        if($request->isMethod('POST')){
            // history  
            $iten_histories = [];
            if(!empty($request->item_id)){
                foreach ($request->item_id as $index=>$value) {
                    $iten_histories[] = [
                        "item_details" => $request->item_details[$index] != null ? $request->item_details[$index] : 0,
                        "item_price" => $request->item_price[$index] != null ? $request->item_price[$index] : 0,
                        "item_discount" => $request->item_discount[$index] != null ? $request->item_discount[$index] : 0,
                        "item_quantity" => $request->item_quantity[$index] != null ? $request->item_quantity[$index] : 0,
                        "item_total_amount" => $request->item_total_amount[$index] != null ? $request->item_total_amount[$index] : 0,
                        "item_total_cost" => $request->item_total_cost[$index] != null ? $request->item_total_cost[$index] : 0,
                        "item_type" => $request->item_type[$index] != null ? $request->item_type[$index] : 0,
                    ];
                }
            }

            $invoiceDB = new Invoice();
            $invoiceDB->unique_id = $request->unique_id;
            $invoiceDB->patient_id = $request->patient_id;
            $invoiceDB->patient_name = $request->patient_name;
            $invoiceDB->parents_name = $request->parents_name;
            $invoiceDB->user_number = $request->user_number;
            $invoiceDB->address = $request->address;
            $invoiceDB->date = $request->date;
            $invoiceDB->items_arry = json_encode($iten_histories);
            $invoiceDB->cart_subtotal = $request->cart_subtotal;
            $invoiceDB->cart_discount = $request->cart_discount;
            $invoiceDB->cart_total = $request->cart_total;
            $invoiceDB->cart_paid = $request->cart_paid;
            $invoiceDB->cart_due = $request->cart_due;
            $invoiceDB->cart_cost = $request->cart_cost;
            $invoiceDB->payment_method = $request->payment_method;
            $invoiceDB->status = !empty($request->cart_due) ? "Due" : "Paid";
            $invoiceDB->save();

            // data
            if(!empty($request->item_id)){
                foreach ($request->item_id as $index=>$value) {
                    // test
                    if($request->item_type[$index] == "test"){
                        $labTask = new LabTechnicianTest();
                        $labTask->user_id = null;
                        $labTask->test_id = $request->item_db_id[$index];
                        $labTask->patient_id = $request->patient_id;
                        $labTask->status = 'pending';
                        $labTask->save();
                    }

                    // trax history  
                    if(empty($invoiceDB->cart_due)){
                        $item_details = $request->item_details[$index] != null ? $request->item_details[$index] : 0;
                        $item_discount = $request->item_discount[$index] != null ? $request->item_discount[$index] : 0;
                        $item_quantity = $request->item_quantity[$index] != null ? $request->item_quantity[$index] : 0;
                        $item_total_amount = $request->item_total_amount[$index] != null ? $request->item_total_amount[$index] : 0;
                        $item_total_cost = $request->item_total_cost[$index] != null ? $request->item_total_cost[$index] : 0;

                        $transaction = new InvoiceTransaction();
                        $transaction->invoice_id = $invoiceDB->unique_id;
                        $transaction->name = $item_details." - ".$item_quantity."x";
                        $transaction->total_amount = $item_total_amount;
                        $transaction->total_cost = $item_total_cost;
                        $transaction->discount = $item_discount;
                        $transaction->save();
                    }
                }
            }

            return redirect(route('admin.invoice.print', $invoiceDB))->with(['status' => true, 'msg' => 'You are successfully created a invoice!']);
        }

        $pets = Pet::latest()->get();
        $tests = Test::latest()->get();
        $invoice_id = $this->generateUniqueInvoiceID();

        // Equipment 
        $equipmentProducts = InvoiceEquipment::latest()->where("type", "product")->get();
        $equipmentServices = InvoiceEquipment::latest()->where("type", "service")->get();
        $equipmentCategorys = InvoiceEquipment::latest()->where("type", "category")->get();
        $equipmentSurgerys = InvoiceEquipment::latest()->where("type", "surgery")->get();
        $equipmentTests = InvoiceEquipment::latest()->where("type", "test")->get();
        $equipmentVaccine = InvoiceEquipment::latest()->where("type", "vaccine")->get();

        return view('admin.invoice.add', compact('pets', 'invoice_id', 'tests', 'equipmentProducts', 'equipmentServices', 'equipmentCategorys', 'equipmentSurgerys', "equipmentTests", "equipmentVaccine"));
    }
    public function printInvoice(Invoice $invoice)
    {
        return view('admin.invoice.print', compact('invoice'));
    }
    public function editInvoice(Request $request, Invoice $invoiceDB)
    {
        if($request->isMethod('POST')){
            // history  
            $iten_histories = [];
            if(!empty($request->item_id)){
                foreach ($request->item_id as $index=>$value) {
                    $iten_histories[] = [
                        "item_details" => $request->item_details[$index] != null ? $request->item_details[$index] : 0,
                        "item_price" => $request->item_price[$index] != null ? $request->item_price[$index] : 0,
                        "item_discount" => $request->item_discount[$index] != null ? $request->item_discount[$index] : 0,
                        "item_discount" => $request->item_discount[$index] != null ? $request->item_discount[$index] : 0,
                        "item_total_amount" => $request->item_total_amount[$index] != null ? $request->item_total_amount[$index] : 0,
                    ];
                }
            }

            $invoiceDB->patient_id = $request->patient_id;
            $invoiceDB->patient_name = $request->patient_name;
            $invoiceDB->parents_name = $request->parents_name;
            $invoiceDB->user_number = $request->user_number;
            $invoiceDB->address = $request->address;
            $invoiceDB->date = $request->date;
            $invoiceDB->items_arry = json_encode($iten_histories);
            $invoiceDB->cart_subtotal = $request->cart_subtotal;
            $invoiceDB->cart_discount = $request->cart_discount;
            $invoiceDB->cart_total = $request->cart_total;
            $invoiceDB->cart_paid = $request->cart_paid;
            $invoiceDB->cart_due = $request->cart_due;
            $invoiceDB->payment_method = $request->payment_method;
            $invoiceDB->status = 1;
            $invoiceDB->save();

            return redirect(route('admin.invoice.index'))->with(['status' => true, 'msg' => 'You are successfully created a invoice!']);
        }

        $pets = Pet::latest()->get();
        $services = ServiceBilling::latest()->get();
        $tests = Test::latest()->get();
        $invoice_id = $this->generateUniqueInvoiceID();
        return view('admin.invoice.add', compact('pets', 'tests', 'services', 'invoice_id'));
    }
    public function deleteInvoice(Invoice $invoice)
    {
        // delete tranction 
        $transactions = InvoiceTransaction::where("invoice_id", $invoice->unique_id)->get();
        foreach($transactions as $transaction){
            $transaction->delete();
        }
                        
        $invoice->delete();
        return redirect(route('admin.invoice.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a invoice report!']);
    }
    public function paidInvoice(Invoice $invoice)
    {
        // data
        foreach (json_decode($invoice->items_arry) as $index=>$value) {
            $transaction = new InvoiceTransaction();
            $transaction->invoice_id = $invoice->unique_id;
            $transaction->name = $value->item_details." - ".$value->item_quantity."x";
            $transaction->total_amount = $value->item_total_amount;
            $transaction->total_cost = $value->item_total_cost;
            $transaction->discount = $value->item_discount;
            $transaction->save();
        }
            
        $invoice->status = "Paid";
        $invoice->cart_paid = $invoice->cart_total;
        $invoice->save();
        
        return redirect(route('admin.invoice.index'))->with(['status' => true, 'msg' => 'You are successfully mark as paid a invoice report!']);
    }
    public function generateUniqueInvoiceID() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (Invoice::where('unique_id', $uniqueId)->exists());
    
        return $uniqueId;
    }

    /*
    =======================
            service
    =======================
    */
    public function service()
    {
        $dataTypes = ServiceBilling::latest()->get();

        return view('admin.invoice.service.index', compact('dataTypes'));
    }
    public function addService(Request $request)
    {
        if($request->isMethod('POST')){
            // history  
            $invoiceDB = new ServiceBilling();
            $invoiceDB->price = $request->price;
            $invoiceDB->name = $request->name;
            $invoiceDB->description = $request->description;
            $invoiceDB->save();

            return redirect(route('admin.invoice.service.index'))->with(['status' => true, 'msg' => 'You are successfully created a service!']);
        }

        return view('admin.invoice.service.add');
    }
    public function editService(Request $request, ServiceBilling $service)
    {
        if($request->isMethod('POST')){
            // history  
            $service->price = $request->price;
            $service->name = $request->name;
            $service->description = $request->description;
            $service->save();

            return redirect(route('admin.invoice.service.index'))->with(['status' => true, 'msg' => 'You are successfully edit a service!']);
        }

        return view('admin.invoice.service.edit', compact('service'));
    }
    public function deleteService(ServiceBilling $service)
    {
        $service->delete();

        return redirect(route('admin.invoice.service.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a service!']);
    }


    /*
    =======================
            equipment
    =======================
    */
    public function equipment($type)
    {
        $dataTypes = InvoiceEquipment::latest()->where("type", $type)->get();

        return view('admin.invoice.equipment.index', compact('dataTypes', 'type'));
    }
    public function addEquipment(Request $request, $type)
    {
        if($request->isMethod('POST')){
            // history  
            $invoiceDB = new InvoiceEquipment();
            $invoiceDB->name = $request->name;
            $invoiceDB->price = $request->price;
            $invoiceDB->cost = $request->cost;
            $invoiceDB->type = $request->type;
            $invoiceDB->save();

            return redirect(route('admin.invoice.equipment.index', ["type" => $type]))->with(['status' => true, 'msg' => 'You are successfully created a equipment!']);
        }

        return view('admin.invoice.equipment.add', compact('type'));
    }
    public function editEquipment(Request $request, $type, InvoiceEquipment $equipment)
    {
        if($request->isMethod('POST')){
            // history  
            $equipment->name = $request->name;
            $equipment->price = $request->price;
            $equipment->cost = $request->cost;
            $equipment->save();

            return redirect(route('admin.invoice.equipment.index', ["type" => $type]))->with(['status' => true, 'msg' => 'You are successfully edit a equipment!']);
        }

        return view('admin.invoice.equipment.edit', compact('equipment', 'type'));
    }
    public function deleteEquipment($type, InvoiceEquipment $equipment)
    {
        $equipment->delete();

        return redirect(route('admin.invoice.equipment.index', ["type" => $type]))->with(['status' => true, 'msg' => 'You are successfully deleted a equipment!']);
    }


    /*
    =======================
            transaction 
    =======================
    */
    public function transaction()
    {
        $dataTypes = InvoiceTransaction::latest()->get();

        return view('admin.invoice.transaction.index', compact('dataTypes'));
    }
    public function viewTransaction($invoice)
    {
        $invoice = Invoice::where("unique_id", $invoice)->first();
        return view('admin.invoice.transaction.view', compact('invoice'));
    }
}