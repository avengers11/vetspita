@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{keywords()->Edit_user ?? __('Edit user')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.user.update', $user)}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}}</label>
                                <input type="text" class="form-control" id="employees-name" name="name" value="{{$user->name}}" placeholder="{{keywords()->Enter ?? __('Enter')}} {{keywords()->Name ?? __('Name')}}..." />
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-email">{{keywords()->Email ?? __('Email')}}</label>
                                <input type="email" class="form-control" id="employees-email" name="email" value="{{$user->email}}" placeholder="{{keywords()->Enter ?? __('Enter')}} {{keywords()->Email ?? __('Email')}}..." />
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-password">{{keywords()->Password ?? __('Password')}}</label>
                                <input type="text" class="form-control" id="employees-password" name="password" placeholder="{{keywords()->Enter ?? __('Enter')}} {{keywords()->Password ?? __('Password')}}..." />
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-password">{{keywords()->Upload ?? __('Upload')}} {{keywords()->A ?? __('A')}} {{keywords()->Image ?? __('Image')}}</label>
                                <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                                <div class="img-wrapper">
                                    <img class="form-img" src="{{Storage::url($user->image)}}" alt="">
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-role">{{keywords()->Assign ?? __('Assign')}} {{keywords()->Role ?? __('Role')}}</label>
                                <select class="form-control" name="role">
                                    @foreach ($roles as $role)
                                        <option @if($roleName == $role->name) selected @endif value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
    
                            </div>
    
                            <button type="submit" class="btn btn-primary">{{keywords()->Submit ?? __('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection