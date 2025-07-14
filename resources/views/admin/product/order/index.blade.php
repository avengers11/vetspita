@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Plans</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Showing</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0 text-capitalize">All {{ $page }} Orders</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->User_ID ?? __('User ID')}} </th>
                            <th>{{keywords()->Product_Name ?? __('Product Name')}} </th>
                            <th>{{keywords()->Price ?? __('Price')}} </th>
                            <th>{{keywords()->Payment_Method ?? __('Payment Method')}} </th>
                            <th>{{keywords()->Tranction_ID ?? __('Tranction ID')}} </th>
                            @canany(['Order Status'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->user->user_id}}</td>
                                <td>{{$data->product->title}}</td>
                                <td>৳ {{$data->product_price}}</td>
                                <td class="text-capitalize">{{$data->payment_method}}</td>
                                <td>{{$data->trx_id}}</td>

                                @canany(['Order Status'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{route('product.details', $data->product->id)}}" target="_BLANK" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-focus-3-line label-icon rounded-pill"></i> View Product</a>

                                            @if ($page == "pending")
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('admin.product.order.accept', $data) }}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-check-double-line align-middle label-icon rounded-pill"></i> Accept</a>
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('admin.product.order.reject', $data) }}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Rejected</a>
                                            @endif

                                            @if ($page == "reject")
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('admin.product.order.delete', $data) }}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
                                            @endif
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