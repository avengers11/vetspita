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
                <h5 class="mb-0">{{keywords()->Create ?? __('Create')}} {{keywords()->User ?? __('User')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                        <input type="text" class="form-control" id="employees-name" name="name" placeholder="{{keywords()->Enter ?? __('Enter')}} {{keywords()->Name ?? __('Name')}}..." />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-email">{{keywords()->Email ?? __('Email')}} </label>
                        <input type="email" class="form-control" id="employees-email" name="email" placeholder="{{keywords()->Enter ?? __('Enter')}} {{keywords()->Email ?? __('Email')}}..." />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{keywords()->Password ?? __('Password')}} </label>
                        <input type="text" class="form-control" id="employees-password" name="password" placeholder="{{keywords()->Enter ?? __('Enter')}} {{keywords()->Password ?? __('Password')}}..." />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{keywords()->Upload ?? __('Upload')}} {{keywords()->A ?? __('A')}} {{keywords()->Image ?? __('Image')}}</label>
                        <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-role">{{keywords()->Assign ?? __('Assign')}} {{keywords()->Role ?? __('Role')}}</label>
                        <select class="form-control" name="role">
                            @foreach ($roles as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection