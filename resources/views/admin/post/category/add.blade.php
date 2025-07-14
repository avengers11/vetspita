@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Post Categories</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add</a></li>
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
                        <h5 class="mb-0">{{keywords()->Create_Post ?? __('Create Post')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.post.category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                                <input type="text" class="form-control" name="name"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
    
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection