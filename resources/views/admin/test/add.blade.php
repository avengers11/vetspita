@extends('admin.layouts.master')
@push('css')
  <link rel="stylesheet" href="{{ url('assets/admin') }}/plugins/summernote/summernote-bs4.min.css">
  <style>
    .note-editable.card-block {
        height: 300px;
    }
  </style>
@endpush
@section('master')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Test</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{keywords()->Create_Test ?? __('Create Test')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.test.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                          
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                                        <input type="text" class="form-control" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Shortcut ?? __('Shortcut')}} </label>
                                        <input type="text" class="form-control" name="shortcut" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Sample_Type ?? __('Sample Type')}} </label>
                                        <input type="text" class="form-control" name="sample_type" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Price ?? __('Price')}} </label>
                                        <input type="text" class="form-control" name="price" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-email">{{keywords()->Precautions ?? __('Precautions')}} </label>
                                        <textarea name="details" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
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