@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Roles</h4>

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
                <h5 class="card-title mb-0">All Roles</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Total Users</th>
                            <th>Created At</th>
                            @canany(['User Role Edit', 'User Role Delete'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$role->name}}</td>
                                <td>{{count($role->users)}}</td>
                                <td>{{date_format($role->created_at, 'd M, Y')}}</td>
                                @canany(['User Role Edit', 'User Role Delete'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('User Role Edit')
                                                <a href="{{ route('admin.role.roleEdit', $role) }}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('User Role Delete')
                                                {{-- <a onclick="return confirm('Are you sure?')" href="{{ route('admin.role.roleDelete', $role) }}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a> --}}
                                            @endcan
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>


@endsection