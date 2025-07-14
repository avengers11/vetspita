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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add</a></li>
                    <li class="breadcrumb-item active">Form</li>
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
                <h5 class="mb-0">{{keywords()->Create_Gallery ?? __('Create Gallery')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Type ?? __('Type')}} </label>
                        <select name="type" id="gallery_type" class="form-control">
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Branch ?? __('Branch')}} </label>
                        <select name="branche_id" class="form-control">
                            <option value="">Select a Branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->title ?? __('title')}} </label>
                        <input type="text" class="form-control" name="title" />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                        <textarea style="height: 400px" class="form-control ckeditor-classic" name="description"></textarea>
                    </div>

                    <div class="mb-3 d-none" id="yt_url">
                        <label class="form-label" for="employees-name">{{keywords()->Youtube_URL ?? __('Youtube URL')}} </label>
                        <input type="text" class="form-control" name="yt_url" />
                    </div>
                    <div class="mb-3" id="image_upload">
                        <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                        <input type="file" class="form-control" name="file" accept=".jpg, .jpeg, .png, .web, .svg" />
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


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