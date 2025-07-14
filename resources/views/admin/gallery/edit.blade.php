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
            <h4 class="mb-sm-0">Gallery</h4>

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
                        <h5 class="mb-0">{{keywords()->Edit_Gallery ?? __('Edit Gallery')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.gallery.update', $gallery)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Type ?? __('Type')}} </label>
                                <select name="type" id="gallery_type" class="form-control">
                                    <option @if($gallery->type == 'image') selected @endif value="image">Image</option>
                                    <option @if($gallery->type == 'video') selected @endif value="video">Video</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="">{{keywords()->Branch ?? __('Branch')}} </label>
                                <select name="branche_id" class="form-control">
                                    <option value="">Select a Branch</option>
                                    @foreach ($branches as $branch)
                                        <option @if($gallery->branch != null && $gallery->branch->id  == $branch->id) selected @endif value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->title ?? __('title')}} </label>
                                <input type="text" class="form-control" id="employees-name" name="title" value="{{ $gallery->title }}" />
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                                <textarea style="height: 400px" class="form-control ckeditor-classic" name="description">{{ $gallery->description }}</textarea>
                            </div>

                            <div class="mb-3 @if($gallery->type == 'image') d-none @endif" id="yt_url">
                                <label class="form-label" for="employees-name">{{keywords()->Youtube_URL ?? __('Youtube URL')}} </label>
                                <input type="text" class="form-control" name="yt_url" value="{{ $gallery->yt_url }}" />
                            </div>

                            <div class="mb-3 @if($gallery->type == 'video') d-none @endif" id="image_upload">
                                <label class="form-label">{{keywords()->Upload_a_image_video ?? __('Upload a image/video')}}</label>
                                <input type="file" class="form-control" name="file" accept=".jpg, .jpeg, .png, .web, .svg" />
                                <div class="img-wrapper">
                                    @if ($gallery->type == 'image')
                                        <img class="form-img" src="{{Storage::url($gallery->file)}}" alt="">
                                    @else
                                        <video src="{{Storage::url($gallery->file)}}" class="form-img"></video>
                                    @endif
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


@push('js')
<script src="{{ url('assets/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>

<script>
    $(function () {
        $('#description').summernote();

        $("#gallery_type").change(function(){
            let val = $(this).val();
            if(val == "image"){
                $("#yt_url").addClass("d-none");
                $("#image_upload").removeClass("d-none");
            }else{
                $("#yt_url").removeClass("d-none");
                $("#image_upload").addClass("d-none");
            }
        });
    })
  </script>
@endpush