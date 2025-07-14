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
                    <li class="breadcrumb-item active">Edit</li>
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
                <h5 class="mb-0">{{keywords()->Edit ?? __('Edit')}} {{keywords()->New ?? __('New')}} {{keywords()->Role ?? __('Role')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.role.roleUpdate', $role)}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="employees-role-name">{{keywords()->Name ?? __('Name')}}</label>
                        <input type="text" class="form-control" id="employees-role-name" value="{{$role->name}}" name="name" placeholder="Enter role name..." />
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p class="text-dark mt-2">{{keywords()->Select_permission_for_assign ?? __('Select permission for assign')}} <input type="checkbox" class="form-check-input" id="select-all-role" value="1"/></p>
                        </div>
                        @foreach ($groupedPermissions as $permission)
                            <div class="col-md-6 mb-3">
                                <small class="text-dark fw-semibold">{{$permission[0]->page_name}} Page</small>

                                @foreach ($permission as $item)
                                    <div class="form-check">
                                        <input class="form-check-input form-check-permission" type="checkbox" name="permission[]" @if(in_array($item->name, $activePermissions)) checked @endif value="{{$item->name}}" id="permissions-{{$item->id}}" />
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

@push('js')
    <script>
        $("#select-all-role").change(function(){
            if($(this).is(":checked")){
                $(".form-check-permission").prop("checked", true);
                console.log("c");
                
            }else{
                $(".form-check-permission").prop("checked", false);
            }
        });
    </script>
@endpush