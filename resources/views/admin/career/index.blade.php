@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Career</h4>

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


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">All Careers</h5>
                        @can('Career Add')
                            <a href="{{ route('admin.career.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Career</a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{keywords()->Name ?? __('Name')}}</th>
                                    <th>{{keywords()->Vacancy ?? __('Vacancy')}} </th>
                                    <th>{{keywords()->Address ?? __('Address')}} </th>
                                    @canany(['Career Edit', 'Career Delete'])
                                        <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTypes as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->vacancy}}</td>
                                        <td>{{$data->address}}</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                @can('Career Edit')
                                                    <a href="{{route('admin.career.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                                @endcan
                                                @can('Career Delete')
                                                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.career.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
                                                @endcan
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
    </div>
</section>


@endsection