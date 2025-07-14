@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Blogs</h4>

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
                <h5 class="card-title mb-0">All Blog Posts</h5>
                @can('Blog Add')
                    <a href="{{ route('admin.post.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Post</a>
                @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Title ?? __('Title')}} </th>
                            <th>{{keywords()->view ?? __('view')}} </th>
                            <th>{{keywords()->Category_Name ?? __('Category Name')}} </th>
                            @canany(['Blog Edit', 'Blog Delete'])
                                <th class="d-flex justify-content-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->view}}</td>
                                <td>{{$data->category->name}}</td>

                                @canany(['Blog Edit', 'Blog Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Blog Edit')
                                                <a href="{{route('admin.post.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan

                                            @can('Blog Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.post.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
                                            @endcan
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach

                        @if(count($dataTypes) < 1)
                            <tr>
                                <td colspan="6" class="text-center">
                                    No data found!
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection