@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Patient</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                    <li class="breadcrumb-item active">Form</li>
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
                        <h5 class="mb-0">{{keywords()->Edit ?? __('Edit')}} {{keywords()-> Patient ?? __(' Patient')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.patient.update', $patient)}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                                <input type="text" class="form-control" name="name" value="{{ $patient->name }}" />
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Number ?? __('Number')}} </label>
                                <input type="number" class="form-control" name="number" value="{{ $patient->number }}"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Email ?? __('Email')}} </label>
                                <input type="email" class="form-control" name="email" value="{{ $patient->email }}"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Address ?? __('Address')}} </label>
                                <input type="text" class="form-control" name="address" value="{{ $patient->address }}"/>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">{{keywords()->Password ?? __('Password')}} </label>
                                <input type="text" class="form-control" name="password" value=""/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                                <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                                <div class="img-wrapper">
                                    <img class="form-img" src="{{Storage::url($patient->image)}}" alt="">
                                </div>
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