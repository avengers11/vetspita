@extends('admin.layouts.master')
@push('css')
@endpush
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Transaction  List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                    <li class="breadcrumb-item active">Transaction List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">All Transaction</h5>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Invoice_ID ?? __('Invoice ID')}}</th>
                            <th>{{keywords()->Name ?? __('Name')}}</th>
                            <th>{{keywords()->Total_Amount ?? __('Total Amount')}} </th>
                            <th>{{keywords()->Total_Cost ?? __('Total Cost')}} </th>
                            <th>{{keywords()->Discount ?? __('Discount')}} </th>
                            <th>{{keywords()->Profit ?? __('Profit')}} </th>

                            @canany(['Invoice Delete', 'Invoice Add'])
                                <th style="width: 10%" class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->invoice_id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->total_amount}}</td>
                                <td>{{$data->total_cost}}</td>
                                <td>{{$data->discount}}</td>
                                <td>{{($data->total_amount + $data->discount) - $data->total_cost}}</td>
                                
                                @canany(['Invoice Delete', 'Invoice Add'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Invoice Delete')
                                                <a href="{{route('admin.invoice.transaction.view', ["invoice" => $data->invoice_id])}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="label-icon align-middle rounded-pill ri-eye-fill"></i> View</a>
                                            @endcan
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
 
@endpush