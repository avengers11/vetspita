@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Branch</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Branch</a></li>
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
                        <h5 class="mb-0">{{keywords()->Edit_Branch ?? __('Edit Branch')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.branch.update', $branch)}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Name ?? __('Name')}} </label>
                                <input type="text" class="form-control" id="" name="name" value="{{ $branch->name }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Address ?? __('Address')}} </label>
                                <input type="text" class="form-control" id="" name="address" value="{{ $branch->address }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Number ?? __('Number')}} </label>
                                <input type="text" class="form-control" id="" name="number" value="{{ $branch->number }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Email ?? __('Email')}} </label>
                                <input type="text" class="form-control" id="" name="email" value="{{ $branch->email }}" />
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