@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Gallery</h4>

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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">All Gallery Items</h5>
                @can('Gallery Add')
                    <a href="{{ route('admin.gallery.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Items</a>
                @endcan
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Type ?? __('Type')}}</th>
                            <th>{{keywords()->title ?? __('title')}} </th>
                            <th>{{keywords()->React ?? __('React')}} </th>
                            @canany(['Gallery Edit', 'Gallery Delete'])
                                <th class="d-flex justify-content-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->type}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->react}}</td>
                                @canany(['Gallery Edit', 'Gallery Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            @can('Gallery Edit')
                                                <a href="{{route('admin.gallery.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Gallery Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.gallery.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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