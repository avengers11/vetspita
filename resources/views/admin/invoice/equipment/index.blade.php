@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $type }}s</h4>

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
                <h5 class="card-title mb-0">All {{ $type }}s</h5>

                @can('Invoice Equipment Add')
                    <a href="{{ route('admin.invoice.equipment.add', ["type" => $type]) }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add {{ $type }}</a>
                @endcan
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Name ?? __('Name')}}</th>
                            <th>{{keywords()->Rate ?? __('Rate')}} </th>
                            <th>{{keywords()->Cost ?? __('Cost')}} </th>
                            @canany(['Invoice Equipment Edit', 'Invoice Equipment Delete'])
                                <th class="d-flex justify-content-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->price}}</td>
                                <td>{{$data->cost}}</td>
                                @canany(['Invoice Equipment Edit', 'Invoice Equipment Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Invoice Equipment Edit')
                                                <a href="{{route('admin.invoice.equipment.edit', ["type" => $type, "equipment" => $data])}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Invoice Equipment Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.invoice.equipment.delete', ["type" => $type, "equipment" => $data])}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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