@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">General Settings</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Branch</a></li>
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
                <h5 class="card-title mb-0">All Brances</h5>
                @can('Branch Add')
                    <a href="{{ route('admin.branch.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Brance</a>
                @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Name ?? __('Name')}}</th>
                            <th>{{keywords()->Address ?? __('Address')}} </th>
                            <th>{{keywords()->Number ?? __('Number')}} </th>
                            <th>{{keywords()->Email ?? __('Email')}} </th>
                            @canany(['Branch Edit', 'Branch Delete'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->number}}</td>
                                <td>{{$data->email}}</td>
                                @canany(['Branch Edit', 'Branch Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            @can('Branch Edit')
                                                <a href="{{route('admin.branch.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Branch Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.branch.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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