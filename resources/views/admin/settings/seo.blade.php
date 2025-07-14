@extends('admin.layouts.master')
@push('css')
  <link rel="stylesheet" href="{{ url('assets/admin') }}/plugins/summernote/summernote-bs4.min.css">
  <style>
    .note-editable.card-block {
        height: 200px;
    }
  </style>
@endpush

@section('master')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">SEO</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                    <li class="breadcrumb-item active">SEO</li>
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
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-custom-code-tab" data-toggle="pill" href="#custom-tabs-custom-code" role="tab" aria-controls="custom-tabs-custom-code" aria-selected="true">Custom Code</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-others-tab" data-toggle="pill" href="#custom-tabs-others" role="tab" aria-controls="custom-tabs-others" aria-selected="false">Others</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-custom-code" role="tabpanel" aria-labelledby="custom-tabs-custom-code-tab">
                                <form action="{{route('admin.general.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
            
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Custom_HTML ?? __('Custom HTML')}} </label>
                                        <textarea name="custom_html" class="form-control" rows="5">{{ $dataTypes->custom_html }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Custom_CSS ?? __('Custom CSS')}} </label>
                                        <textarea name="custom_css" class="form-control" rows="5">{{ $dataTypes->custom_css }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Custom_JS ?? __('Custom JS')}} </label>
                                        <textarea name="custom_js" class="form-control" rows="5">{{ $dataTypes->custom_js }}</textarea>
                                    </div>
            
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-others" role="tabpanel" aria-labelledby="custom-tabs-others-tab">
                                <form action="{{route('admin.general.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Meta_Title ?? __('Meta Title')}} </label>
                                        <input type="text" class="form-control" value="meta_title" name="meta_title"/>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Meta_Description ?? __('Meta Description')}} </label>
                                        <input type="text" class="form-control" value="meta_description" name="meta_description"/>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Meta_Keywords ?? __('Meta Keywords (Use comma to separate the keyword )')}} </label>
                                        <input type="text" class="form-control" value="meta_keywords" name="meta_keywords"/>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Cookies ?? __('Cookies')}} </label>
                                        <textarea name="cookies" class="form-control" id="cookies" cols="30" rows="5">{{ $dataTypes->cookies }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Privacy_Policy ?? __('Privacy Policy')}} </label>
                                        <textarea name="privacy_policy" class="form-control" id="privacy_policy" cols="30" rows="5">{{ $dataTypes->privacy_policy }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Terms_Condition ?? __('Terms & Condition')}} </label>
                                        <textarea name="terms_condition" class="form-control" id="terms_condition" cols="30" rows="5">{{ $dataTypes->terms_condition }}</textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Favicon ?? __('Favicon')}} </label>
                                        <input type="file" class="form-control" name="favicon"/>

                                        <div class="img-wrapper">
                                            <img class="form-img" src="{{Storage::url($dataTypes->favicon)}}" alt="">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="employees-name">{{keywords()->Logo ?? __('Logo')}} </label>
                                        <input type="file" class="form-control" name="logo"/>

                                        <div class="img-wrapper">
                                            <img class="form-img" src="{{Storage::url($dataTypes->logo)}}" alt="">
                                        </div>
                                    </div>
            
            
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@push('js')
<script src="{{ url('assets/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>

<script>
    $(function () {
        $('#cookies').summernote();
        $('#privacy_policy').summernote();
        $('#terms_condition').summernote();
    })
  </script>
@endpush