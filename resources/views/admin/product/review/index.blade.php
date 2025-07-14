@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Reviews</h4>

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
                <h5 class="card-title mb-0">All Reviews</h5>
                @can('Review Add')
                    <a href="{{ route('admin.product.review.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Review</a>
                @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Title ?? __('Title')}} </th>
                            <th>{{keywords()->User_Name ?? __('User Name')}} </th>
                            <th>{{keywords()->Rattings ?? __('Rattings')}} </th>
                            @can('Review Edit')
                                <th>{{keywords()->Feature ?? __('Feature')}} </th>
                            @endcan
                            @canany(['Review Delete', 'Review Edit'])
                                <th class="d-flex justify-content-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->user->name}}</td>
                                <td>{{$data->ratings}} Star</td>
                                @can('Review Edit')
                                    <td>
                                        @if ($data->is_feature)
                                            <a href="{{route('admin.product.review.feature', $data)}}" class="btn btn-success btn-sm" > {{keywords()->YES ?? __('YES')}}</a>
                                        @else
                                            <a href="{{route('admin.product.review.feature', $data)}}" class="btn btn-danger btn-sm" > {{keywords()->NO ?? __('NO')}}</a>
                                        @endif
                                    </td>
                                @endcan
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> {{keywords()->View_Product ?? __('View Product')}}</a>

                                        @canany(['Review Delete', 'Review Edit'])
                                            @can('Review Edit')
                                                @if ($data->status == "pending")
                                                    <a href="{{route('admin.product.review.updateStatus', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Aprove Now</a>
                                                @endif
                                            @endcan
                                            
                                            @can('Review Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.product.review.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
                                            @endcan
                                        @endcanany
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection