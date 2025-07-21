@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Tests</h4>

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
                <h5 class="card-title mb-0">All Tests</h5>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Patient_ID ?? __('Patient ID')}} </th>
                            <th>{{keywords()->Test_Name ?? __('Test Name')}} </th>
                            <th>{{keywords()->Sample_Type ?? __('Sample Type')}} </th>
                            <th>{{keywords()->Status ?? __('Status')}} </th>
                            @canany(['Lab Task Status', 'Lab Task Delete'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->patient_id}}</td>
                                <td>{{ isset($data->invoiceTest) ? $data->invoiceTest->name : "Test Deleted"}}</td>
                                <td class="text-capitalize">{{ isset($data->invoiceTest) ? $data->invoiceTest->type : "Test Deleted"}}</td>
                                <td>
                                    @if ($data->status == "success")
                                        <span class="badge bg-success">Success</span>
                                    @elseif($data->status == "rejected")
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-primary">Pending</span>
                                    @endif
                                </td>
                                @canany(['Lab Task Status', 'Lab Task Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">

                                            @if ($data->status == "pending")
                                                @can('Lab Task Status')
                                                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.lab.task.status', ["task" => $data, "status" => "success"])}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-add-line label-icon align-middle rounded-pill"></i> Accept</a>
                                                @endcan
                                                @can('Lab Task Status')
                                                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.lab.task.status', ["task" => $data, "status" => "rejected"])}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Rejected</a>
                                                @endcan
                                            @endif
                                            

                                            @can('Lab Task Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.lab.task.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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