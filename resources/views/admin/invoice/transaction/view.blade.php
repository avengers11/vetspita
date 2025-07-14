@extends('admin.layouts.master')
@section('master')
@push('css')
<style>
    @page {
        margin: 0;
    }
</style>
@endpush
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Invoice Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                    <li class="breadcrumb-item active">Invoice Details</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row justify-content-center">
    <div class="col-xxl-9" style="padding: 0 !important;">
        <div class="card" id="demo">
            <div class="row">
                <div class="col-lg-12" style="">
                    <div class="card-header border-bottom-dashed p-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <img src="{{Storage::url(getSettings('favicon'))}}" style="height: 82px">
                                <div class="">
                                    <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                    <p class="text-muted mb-1" id="address-details">{{ $invoice->address }}</p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                <h6><span class="text-muted fw-normal">Patient ID:</span> <span>{{ $invoice->patient_id }}</span></h6>
                                <h6><span class="text-muted fw-normal">Patient Name:</span> <span>{{ $invoice->patient_name }}</span></h6>
                                <h6><span class="text-muted fw-normal">Parent's Name:</span> <span>{{ $invoice->parents_name }}</span></h6>
                                <h6><span class="text-muted fw-normal">Mobile Number:</span> <span>{{ $invoice->user_number }}</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--end card-header-->
                </div><!--end col-->
                <div class="col-lg-12" style="">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-4">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                                <h5 class="fs-14 mb-0">#<span id="invoice-no">{{ $invoice->unique_id }}</span></h5>
                            </div>
                            <!--end col-->
                            <div class="col-4">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                <h5 class="fs-14 mb-0"><span id="invoice-date">{{ \Carbon\Carbon::parse($invoice->date)->format('d M, Y h:ia') }}</span></h5>
                            </div>
                            <!--end col-->
                            <div class="col-4">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Method</p>
                                <h5 class="fs-14 mb-0"><span id="invoice-no">{{ $invoice->payment_method }}</span></h5>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
               
                <div class="col-lg-12" style="">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col" style="width: 50px;">#</th>
                                        <th scope="col" style="text-align: start">Product Details</th>
                                        <th scope="col" style="text-align: start">Total Amount</th>
                                        <th scope="col" style="text-align: start">Discount</th>
                                        <th scope="col" style="text-align: start">Cost</th>
                                        <th scope="col" class="text-end">Profit</th>
                                    </tr>
                                </thead>
                                <tbody id="products-list">
                                    @foreach (json_decode($invoice->items_arry) as $index=>$item)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <td class="text-start">{{ $item->item_details }} - {{ $item->item_quantity }}x</td>
                                            <td class="text-start">৳{{ $item->item_quantity * $item->item_price }}</td>
                                            <td class="text-start">-৳{{ $item->item_discount }}</td>
                                            <td class="text-start">৳{{ $item->item_total_cost }}</td>
                                            <td class="text-end">৳{{ ($item->item_total_amount)-$item->item_total_cost }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!--end table-->
                        </div>
                        <div class="border-top border-top-dashed mt-2">
                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                <tbody>
                                    <tr>
                                        <td>Total Amount</td>
                                        <td class="text-end">৳{{ $invoice->cart_subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td class="text-end">- ৳{{ $invoice->cart_discount }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total Cost</th>
                                        <th class="text-end">৳{{ $invoice->cart_cost }}</th>
                                    </tr>
                                    <tr  class="border-top border-top-dashed fs-15">
                                        <td>Profit</td>
                                        <td class="text-end">৳{{ $invoice->cart_total - $invoice->cart_cost }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                            <a href="javascript:window.print()" class="btn btn-soft-primary"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                            {{-- <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a> --}}
                        </div>
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->


@endsection

@push('js')
@endpush