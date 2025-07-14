@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Slider</h4>

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
                <h5 class="card-title mb-0">All Slider</h5>
                @can('Slider Add')
                    <a href="{{ route('admin.slider.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Slider</a>
                @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Image ?? __('Image')}}</th>
                            <th>{{keywords()->Link ?? __('Link')}} </th>
                            <th>{{keywords()->Order ?? __('Order')}} </th>
                            @canany(['Slider Edit', 'Slider Delete'])
                                <th class="d-flex justify-content-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="height: 50px" src="{{ Storage::url($data->image) }}" alt="">
                                </td>
                                <td>{{$data->link}}</td>
                                <td>{{$data->order}}</td>
                                @canany(['Slider Edit', 'Slider Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Slider Edit')
                                                <a href="{{route('admin.slider.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Slider Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.slider.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
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