@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Role</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Role</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{keywords()->Create ?? __('Create')}} {{keywords()->New ?? __('New')}} {{keywords()->Role ?? __('Role')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.role.roleStore')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="employees-role-name">{{keywords()->Name ?? __('Name')}}</label>
                        <input type="text" class="form-control" id="employees-role-name" name="name" placeholder="Enter role name..." />
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p class="text-dark mt-2">{{keywords()->Select_permission_for_assign ?? __('Select permission for assign')}} </p>
                        </div>

                        @foreach ($groupedPermissions as $permission)
                            <div class="col-md-6 mb-3">
                                <small class="text-dark fw-semibold">{{$permission[0]->page_name}} Page</small>

                                @foreach ($permission as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{$item->name}}" id="permissions-{{$item->id}}" />
                                        <label class="form-check-label" for="permissions-{{$item->id}}"> {{$item->name}} </label>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach

                    </div>

                    <button type="submit" class="btn btn-primary">{{keywords()->Submit ?? __('Submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection