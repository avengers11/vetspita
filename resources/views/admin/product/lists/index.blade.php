@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Products</h4>

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
                <h5 class="card-title mb-0">All Products</h5>
                @can('Product Add')
                    <a href="{{ route('admin.product.list.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Product</a>
                @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Title ?? __('Title')}} </th>
                            <th>{{keywords()->Stock ?? __('Stock')}} </th>
                            <th>{{keywords()->Price ?? __('Price')}} </th>
                            <th>{{keywords()->Status ?? __('Status')}} </th>
                            @canany(['Product Edit', 'Product Delete'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->stock}}</td>
                                <td>{{$data->price}}</td>
                                <td>
                                    @if ($data->status)
                                        <a class="btn bg-gradient-success btn-sm" > {{keywords()->Active ?? __('Active')}}</a>
                                    @else
                                        <a class="btn bg-gradient-danger btn-sm" > {{keywords()->Deactive ?? __('Deactive')}}</a>
                                    @endif
                                </td>

                                @canany(['Product Edit', 'Product Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Product Edit')
                                                <a href="{{route('admin.product.list.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Product Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.product.list.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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