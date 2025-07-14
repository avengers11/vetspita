@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Templates</h4>

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
                <h5 class="card-title mb-0">All Templates</h5>
                @can('Lap Diognosis Template Add')
                    <a href="{{ route('admin.lab.test.template.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Template</a>
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
                            <th>{{keywords()->Templates_Name ?? __('Templates Name')}}</th>
                            <th>{{keywords()->Date ?? __('Date')}} </th>
                            @canany(['Lap Diognosis Template Edit', 'Lap Diognosis Template Delete'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }} <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option"></td>
                                <td>{{$data->prescription_name}}</td>
                                <td>{{$data->created_at}}</td>
                                @canany(['Lap Diognosis Template Edit', 'Lap Diognosis Template Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Lap Diognosis Template Edit')
                                                <a href="{{route('admin.lab.test.template.edit',  $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Lap Diognosis Template Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.lab.test.template.delete',  $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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