@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Prescriptions</h4>

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
                <h5 class="card-title mb-0">All prescriptions</h5>
                @can('Prescription Add')
                    <a href="{{ route('admin.prescription.add', ['type' => $type]) }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Prescription</a>
                @endcan
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    # <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>
                            </th>
                            @if ($type == "saved")
                                <th>{{keywords()->Prescription_Name ?? __('Prescription Name')}}</th>
                            @endif
                            @if ($type == "normal")
                                <th>{{keywords()->Patient_ID ?? __('Patient ID')}}</th>
                                <th>{{keywords()->Patient_name ?? __('Patient name')}} </th>
                                <th>{{keywords()->Parents_Name ?? __('Parents Name')}}</th>
                                <th>{{keywords()->Parents_Number ?? __('Parents Number')}}</th>
                                <th>{{keywords()->Date ?? __('Date')}} </th>
                            @endif
                            @canany(['Prescription Edit', 'Prescription Delete'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }} <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option"></td>
                                <td>
                                    @if ($type == "saved")
                                        {{$data->prescription_name}}
                                    @else
                                        {{$data->patient_id}}
                                    @endif
                                </td>

                                @if ($type == "normal")
                                    <td>{{$data->pet_name}}</td>
                                    <td>{{$data->owner_name}}</td>
                                    <td>{{$data->owner_number}}</td>
                                    <td>{{$data->date}}</td>
                                @endif
                                
                                @canany(['Prescription Edit', 'Prescription Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Prescription Edit')
                                                <a href="{{route('admin.prescription.edit', ['prescription' => $data, 'type' => $type])}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Prescription Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.prescription.delete', ['prescription' => $data, 'type' => $type])}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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