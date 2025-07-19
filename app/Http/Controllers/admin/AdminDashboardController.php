<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\InvoiceTransaction;
use App\Models\LabTechnicianTest;
use App\Models\LabTestPrescription;
use App\Models\Pet;
use App\Models\Post;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminDashboardController extends Controller
{
    //index
    public function index(Request $request)
    {
        $user = auth()->user();
        
        
        if($user->can('Onwer Dashboard')){
            
            $totalAppointment = Invoice::get();
            $serviceItems = 0;
            $testItems = 0;
            $productItems = 0;
            $surgeryItems = 0;
            $vaccineItems = 0;
            foreach($totalAppointment as $appointment){
                $jsonData = json_decode($appointment->items_arry);
                foreach($jsonData as $json){
                    if(isset($json->item_type) && $json->item_type === "service"){
                        $serviceItems = $serviceItems+1;
                    }
                    
                    if(isset($json->item_type) && $json->item_type === "product"){
                        $productItems = $productItems+1;
                    }
                    
                    if(isset($json->item_type) && $json->item_type === "surgery"){
                        $surgeryItems = $surgeryItems+1;
                    }
                    
                    if(isset($json->item_type) && $json->item_type === "test"){
                        $testItems = $testItems+1;
                    }
                    
                    if(isset($json->item_type) && $json->item_type === "vaccine"){
                        $vaccineItems = $vaccineItems+1;
                    }
                }
            }
            
            $totalAppointment = Appointment::count();
            $totalPatient = Pet::count();
            $totalProducts = Product::count();
            $totalPosts = Post::count();
            $lapTest = LabTestPrescription::selectRaw('type, COUNT(id) as total_tests')
            ->where('type', '!=', 'saved')
            ->groupBy('type', 'created_at')
            ->latest()
            ->get();

            // Patients chart
            if($request->isMethod("POST")){
                if($request->type == 'registered'){
                    if($request->filter == "1y"){
                        return $this->lastYearRegisterUsers();
                    }else if($request->filter == "30d"){
                        return $this->monthlyRegisterUsers();
                    }else if($request->filter == "7d"){
                        return $this->savenDaysRegisterUsers();
                    }else{
                        return $this->TodaysRegisterUsers();
                    }
                }
                if($request->type == 'income'){
                    if($request->filter == "1y"){
                        return $this->yearlyBalanceSummary();
                    }else if($request->filter == "30d"){
                        return $this->monthlyBalanceSummary();
                    }else if($request->filter == "7d"){
                        return $this->savenDaysBalanceSummary();
                    }else if($request->filter == "1d"){
                        return $this->TodaysBalanceSummary();
                    }else{
                        return $this->allBalanceSummary();
                    }
                }
            }

            return view('admin.owner-dashboard', compact('totalPatient', 'totalProducts', 'totalPosts', 'lapTest', 'totalAppointment', 'serviceItems', 'testItems', 'productItems', 'surgeryItems', 'vaccineItems'));
        }else if($user->can('Doctor Dashboard')){
            $totalPatientCount = Pet::count();
            $todayPatientsCount = Pet::whereDate('created_at', Carbon::today())->count();
            $totalAppointmentCount = Appointment::count();
            $todaysAppointment = Appointment::whereDate('date_time', Carbon::today())->get();
            $nextAppointment = Appointment::latest()->where("status", "authorize")->where("doctor_id", $user->id)->first();
            
            return view('admin.doctor-dashboard', compact("totalPatientCount", "todayPatientsCount", "totalAppointmentCount", "todaysAppointment", "nextAppointment"));
        }else if($user->can('Lab Technician Dashboard')){
            $totalReportCount = LabTestPrescription::where("type", "!=", "saved")->count();
            $todaysReportCount = LabTestPrescription::whereDate('created_at', Carbon::today())->where("type", "!=", "saved")->count();
            $pendningTaskCount = LabTechnicianTest::where("status", "pending")->count();
            $allTasks = LabTechnicianTest::latest()->take(10)->get();
            $pendningTasks = LabTechnicianTest::where("status", "pending")->latest()->take(10)->get();

            return view('admin.lab-dashboard', compact("totalReportCount", "todaysReportCount", "pendningTaskCount", "allTasks", "pendningTasks"));
        }else{
            return "Something went wrong!";
        }
    }

    // doctorStatus
    public function doctorStatus(Request $request)
    {
        $user = auth()->user();
        $user->doctor_status = $user-> doctor_status == 1 ? 0 : 1;
        $user->save();

        return back()->with(['status' => true, 'msg' => 'You are successfully change your status!']);
    } 

    // lap  
    function labReportEdit($type)
    {
        $lab = LabTestPrescription::where("prescription_name", $type)->first();

        if($lab){
            return redirect(route('admin.lab.test.template.edit', $lab));
        }else{
            return back()->with(['status' => false, 'msg' => 'Something went wrong!']);
        }
    }







    // graph
    private function lastYearRegisterUsers(){
        $usersData = [];
        $months = [];
        $currentMonth = Carbon::now()->format('M');

        for ($i = 11; $i >= 0; $i--) {
            $startMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endMonth = Carbon::now()->subMonths($i)->endOfMonth();
            $formattedMonth = $startMonth->format('M');
            $userCount = Pet::whereBetween('created_at', [$startMonth, $endMonth])->count();
            $usersData[] = $userCount;
            $months[] = $formattedMonth;
        }

        $startIndex = array_search($currentMonth, $months);
        $usersData = array_merge(array_slice($usersData, $startIndex), array_slice($usersData, 0, $startIndex));
        $months = array_merge(array_slice($months, $startIndex), array_slice($months, 0, $startIndex));

        $response = [
            "users_count" => $usersData,
            "categories" => $months
        ];

        return response()->json($response);
    }
    private function monthlyRegisterUsers(){
        $usersData = [];
        $dates = [];
        $startDate = Carbon::today()->subDays(29);
        for ($i = 0; $i < 10; $i++) {
            $startRange = $startDate->copy()->addDays($i * 3);
            $endRange = $startRange->copy()->addDays(2);
            $formattedDate = $startRange->format('d M');
            $userCount = Pet::whereBetween('created_at', [$startRange, $endRange])->count();

            $usersData[] = $userCount;
            $dates[] = $formattedDate;
        }

        $response = [
            "users_count" => $usersData,
            "categories" => $dates
        ];

        return response()->json($response);
    }
    private function savenDaysRegisterUsers(){
        $usersData = [];
        $dates = [];
        $startDate = Carbon::today()->subDays(6);
        for ($i = 0; $i < 7; $i++) {
            $startRange = $startDate->copy()->addDays($i);
            $endRange = $startRange->copy()->addDays(2);
            $formattedDate = $startRange->format('d M');
            $userCount = Pet::whereBetween('created_at', [$startRange, $endRange])->count();

            $usersData[] = $userCount;
            $dates[] = $formattedDate;
        }

        $response = [
            "users_count" => $usersData,
            "categories" => $dates
        ];

        return response()->json($response);
    }
    private function TodaysRegisterUsers(){
        $timeSlots = [
            '01 AM' => ['01:00:00', '04:59:59'],
            '05 AM' => ['05:00:00', '09:59:59'],
            '10 AM' => ['10:00:00', '14:59:59'],
            '03 PM' => ['15:00:00', '19:59:59'],
            '08 PM' => ['20:00:00', '23:59:59'],
            '12 PM' => ['00:00:00', '00:59:59'],
        ];

        $usersData = [];
        $timeLabels = [];
        foreach ($timeSlots as $label => $times) {
            $startTime = Carbon::today()->format('Y-m-d') . " " . $times[0];
            $endTime = Carbon::today()->format('Y-m-d') . " " . $times[1];
            $userCount = Pet::whereBetween('created_at', [$startTime, $endTime])->count();
            $usersData[] = $userCount;
            $timeLabels[] = $label;
        }

        $response = [
            "users_count" => $usersData,
            "categories" => $timeLabels
        ];

        return response()->json($response);
    }

    // balance chart 
    private function allBalanceSummary(){
        $transactions = InvoiceTransaction::select(
            DB::raw('SUM(total_amount - discount) as total_amount'),
            DB::raw('SUM(total_cost) as total_cost'),
            DB::raw('(SUM(total_amount - discount) - SUM(total_cost)) as total_profit')
        )
        ->first();
    
        return response()->json([
            'total_amount' => (float) $transactions->total_amount,
            'total_cost' => (float) $transactions->total_cost,
            'total_profit' => (float) $transactions->total_profit,
        ]);
    }
    private function yearlyBalanceSummary(){
        $startTime = Carbon::today()->subDays(364)->startOfDay();
        $endTime = Carbon::today()->endOfDay();
        
        // Step 1: Get invoices filtered by date
        $invoiceTransactions = Invoice::latest()
        ->whereBetween('created_at', [$startTime, $endTime])
        ->get();

        $total_amount = $invoiceTransactions->sum("cart_paid");
        $total_cost = $invoiceTransactions->sum("cart_cost");
        $total_profit = $total_amount - $total_cost;
        
        return response()->json([
            "total_amount" => $total_amount,
            "total_cost" => $total_cost,
            "total_profit" => $total_profit
        ]);
    }
    private function monthlyBalanceSummary(){
        $startTime = Carbon::today()->subDays(29)->startOfDay();
        $endTime = Carbon::today()->endOfDay();
        
        // Step 1: Get invoices filtered by date
        $invoiceTransactions = Invoice::latest()
        ->whereBetween('created_at', [$startTime, $endTime])
        ->get();

        $total_amount = $invoiceTransactions->sum("cart_paid");
        $total_cost = $invoiceTransactions->sum("cart_cost");
        $total_profit = $total_amount - $total_cost;
        
        return response()->json([
            "total_amount" => $total_amount,
            "total_cost" => $total_cost,
            "total_profit" => $total_profit
        ]);
    }
    private function savenDaysBalanceSummary(){
        $startTime = Carbon::today()->subDays(6)->startOfDay();
        $endTime = Carbon::today()->endOfDay();
        
        // Step 1: Get invoices filtered by date
        $invoiceTransactions = Invoice::latest()
        ->whereBetween('created_at', [$startTime, $endTime])
        ->get();

        $total_amount = $invoiceTransactions->sum("cart_paid");
        $total_cost = $invoiceTransactions->sum("cart_cost");
        $total_profit = $total_amount - $total_cost;
        
        return response()->json([
            "total_amount" => $total_amount,
            "total_cost" => $total_cost,
            "total_profit" => $total_profit
        ]);
    }
    private function TodaysBalanceSummary(){
        $startTime = Carbon::today()->startOfDay();
        $endTime = Carbon::today()->endOfDay();

        // Step 1: Get invoices filtered by date
        $invoiceTransactions = Invoice::latest()
        ->whereBetween('created_at', [$startTime, $endTime])
        ->get();

        $total_amount = $invoiceTransactions->sum("cart_paid");
        $total_cost = $invoiceTransactions->sum("cart_cost");
        $total_profit = $total_amount - $total_cost;
        
        return response()->json([
            "total_amount" => $total_amount,
            "total_cost" => $total_cost,
            "total_profit" => $total_profit
        ]);
    }


    // download excel
    public function excelInvoice(Request $request)
    {
        $date = $request->date;
        if($date === "all"){
            $startTime = Carbon::today()->subDays(9999)->startOfDay();
            $endTime = Carbon::today()->endOfDay();
        }

        else if($date === "1y"){
            $startTime = Carbon::today()->subDays(364)->startOfDay();
            $endTime = Carbon::today()->endOfDay();
        }

        else if($date === "30d"){
            $startTime = Carbon::today()->subDays(29)->startOfDay();
            $endTime = Carbon::today()->endOfDay();
        }

        else if($date === "7d"){
            $startTime = Carbon::today()->subDays(6)->startOfDay();
            $endTime = Carbon::today()->endOfDay();
        }

        else if($date === "1d"){
            $startTime = Carbon::today()->startOfDay();
            $endTime = Carbon::today()->endOfDay();
        }
        
        
        

        $invoiceTransactions = Invoice::leftJoin('pets', 'invoices.patient_id', '=', 'pets.unique_id')
        ->whereBetween('invoices.created_at', [$startTime, $endTime])
        ->orderBy('invoices.created_at', 'desc')
        ->select([
            \DB::raw("DATE_FORMAT(invoices.created_at, '%d/%m/%y') as date"),
            \DB::raw("DATE_FORMAT(invoices.created_at, '%h:%i %p') as time"),
            \DB::raw('NULL as ref_dr'),
            'pets.species as pet_species',
            'pets.name as pet_name',
            \DB::raw("CONCAT(parents_name, ', ', address) as owner_name_address"),
            'user_number as owner_number',
            \DB::raw('NULL as purpose'),
            \DB::raw('NULL as remarks'),
            'cart_total as amount',
            'payment_method as payment_gateway',
            'cart_paid as total_paid',
            'cart_due as due',
        ])
        ->get();

        $uniqueInvoices = [];
        $lastSeenDate = null;
        foreach ($invoiceTransactions as $invoice) {
            if ($invoice->date !== $lastSeenDate) {
                $uniqueInvoices[] = [
                    'date' => $invoice->date,
                    'time' => $invoice->time,
                    'ref_dr' => $invoice->ref_dr,
                    'pet_species' => $invoice->pet_species,
                    'pet_name' => $invoice->pet_name,
                    'owner_name_address' => $invoice->owner_name_address,
                    'owner_number' => $invoice->owner_number,
                    'purpose' => $invoice->purpose,
                    'remarks' => $invoice->remarks,
                    'amount' => $invoice->amount,
                    'payment_gateway' => $invoice->payment_gateway,
                    'total_paid' => $invoice->total_paid,
                    'due' => $invoice->due
                ];
                $lastSeenDate = $invoice->date;
            } else {
                $uniqueInvoices[] = [
                    'date' => '',
                    'time' => $invoice->time,
                    'ref_dr' => $invoice->ref_dr,
                    'pet_species' => $invoice->pet_species,
                    'pet_name' => $invoice->pet_name,
                    'owner_name_address' => $invoice->owner_name_address,
                    'owner_number' => $invoice->owner_number,
                    'purpose' => $invoice->purpose,
                    'remarks' => $invoice->remarks,
                    'amount' => $invoice->amount,
                    'payment_gateway' => $invoice->payment_gateway,
                    'total_paid' => $invoice->total_paid,
                    'due' => $invoice->due
                ];
            }
        }
        $uniqueInvoicesCollection = collect($uniqueInvoices);

        $sheetName = $date."-".date("dmyhis").".xlsx";
        return Excel::download(new InvoicesExport($uniqueInvoicesCollection), $sheetName);
    }
}
