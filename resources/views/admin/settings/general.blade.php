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

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">General</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                    <li class="breadcrumb-item active">General</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border">
                <ul class="nav nav-pills custom-hover-nav-tabs">
                    <li class="nav-item">
                        <a href="#custom-hover-general" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            <i class="ri-chat-settings-line nav-icon nav-tab-position"></i>
                            <h5 class="nav-titl nav-tab-position m-0">General</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#custom-hover-custom-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            <i class="ri-code-box-line nav-icon nav-tab-position"></i>
                            <h5 class="nav-titl nav-tab-position m-0">Custom Code</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#custom-hover-seo" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="ri-seo-line nav-icon nav-tab-position"></i>
                            <h5 class="nav-titl nav-tab-position m-0">SEO</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#custom-hover-choose-us" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="ri-psychotherapy-fill  nav-icon nav-tab-position"></i>
                            <h5 class="nav-titl nav-tab-position m-0">Choose Us</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#custom-hover-about-us" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="ri-pages-fill nav-icon nav-tab-position"></i>
                            <h5 class="nav-titl nav-tab-position m-0">About Us Page</h5>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane show active" id="custom-hover-general">
                        <h4>General</h4>
                        <form action="{{route('admin.general.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Consultation ?? __('Consultation')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->choose_us_consultation }}" name="choose_us_consultation"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Surgery ?? __('Surgery')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->choose_us_surgery }}" name="choose_us_surgery"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Online_Consultation ?? __('Online Consultation')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->choose_us_online_consultation }}" name="choose_us_online_consultation"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Diagnostics ?? __('Diagnostics')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->choose_us_diagnostic }}" name="choose_us_diagnostic"/>
                            </div>
    
    
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="custom-hover-custom-code">
                        <h4>Custom Code</h4>
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
                    <div class="tab-pane" id="custom-hover-seo">
                        <h4>SEO</h4>
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
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="custom-hover-choose-us">
                        <h4>Choose Us</h4>
                        <form action="{{route('admin.general.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Title ?? __('Title')}} </label>
                                <input type="text" class="form-control" value="title" name="title"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->company_description }}" name="company_description"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Number ?? __('Number')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->company_number }}" name="company_number"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Email ?? __('Email')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->company_email }}" name="company_email"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Address ?? __('Address')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->company_address }}" name="company_address"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Social_Media ?? __('Social Media')}} </label>

                                <span style="font-size: 15px; text-transform: capitalize ! IMPORTANT;" class="d-block mt-2">Facebook</span>
                                <input type="text" class="form-control" value="{{ $dataTypes->company_social_media_facebook }}" name="company_social_media_facebook"/>

                                <span style="font-size: 15px; text-transform: capitalize ! IMPORTANT;" class="d-block mt-2">Twiter</span>
                                <input type="text" class="form-control" value="{{ $dataTypes->company_social_media_twitter }}" name="company_social_media_twitter"/>
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
                    <div class="tab-pane" id="custom-hover-about-us">
                        <h4>About Us Page</h4>
                        <form action="{{route('admin.general.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Title ?? __('Title')}} </label>
                                <input type="text" class="form-control" value="{{ $dataTypes->about_title }}" name="about_title"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                                <textarea id="summernote" style="height: 400px" class="form-control" name="about_description">{{ $dataTypes->about_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Cover ?? __('Cover')}} </label>
                                <input type="file" class="form-control" name="about_cover"/>

                                <div class="img-wrapper">
                                    <img class="form-img" src="{{Storage::url($dataTypes->about_cover)}}" alt="">
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


@endsection

@push('js')
<script src="{{ url('assets/admin2') }}/plugins/summernote/summernote-bs4.min.js"></script>

<script>
    $(function () {
        $('#summernote').summernote();
        $('#cookies').summernote();
        $('#privacy_policy').summernote();
        $('#terms_condition').summernote();
    });
  </script>
@endpush