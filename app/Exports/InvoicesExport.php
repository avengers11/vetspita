<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoicesExport implements FromCollection, WithHeadings
{
    protected $invoiceTransactions;

    // Constructor to pass the invoice data
    public function __construct($invoiceTransactions)
    {
        $this->invoiceTransactions = $invoiceTransactions;
    }

    // Method to define the rows of data in the Excel file
    public function collection()
    {
        return $this->invoiceTransactions->map(function($invoice) {
            return [
                'Date' => $invoice["date"],
                'Time' => $invoice["time"],
                'Pref Doctor' => $invoice["ref_dr"],
                'Species' => $invoice["pet_species"],
                'Pet Name' => $invoice["pet_name"],
                'Owner name' => $invoice["owner_name_address"],
                'Number' => $invoice["owner_number"],
                'Purpose' => $invoice["purpose"],
                'Remarks' => $invoice["remarks"],
                'Amount' => $invoice["amount"],
                'Payment Gateway' => $invoice["payment_gateway"],
                'Total Paid' => $invoice["total_paid"],
                'Due' => $invoice["due"],
            ];
        });
    }

    // Define the column headings (column names in the exported file)
    public function headings(): array
    {
        return [
            'Date', 'Time', 'Pref Doctor', 'Species', 'Pet Name', 'Owner name', 'Number', 'Purpose', 'Remarks', 'Amount', 'Payment Gateway', 'Total Paid', 'Due'
        ];
    }
}
