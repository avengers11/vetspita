@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Patients</h4>

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
                <h5 class="card-title mb-0">All Patients</h5>
                @can('Patient Add')
                    <a href="{{ route('admin.pet.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Patients</a>
                @endcan
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Parents_Name ?? __('Parents Name')}} </th>
                            <th>{{keywords()->Parents_ID ?? __('Parents ID')}} </th>
                            <th>{{keywords()->Pet_Name ?? __('Pet Name')}}</th>
                            <th>{{keywords()->Pet_Species ?? __('Pet Species')}} </th>
                            @canany(['Patient Edit', 'Patient Delete'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{isset($data->user) ? $data->user->name : "Not found!"}}</td>
                                <td>{{isset($data->user) ? $data->user->user_id : "Not found!"}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->species}}</td>
                                @canany(['Patient Edit', 'Patient Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Patient Edit')
                                                <a href="{{route('admin.pet.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Patient Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.pet.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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