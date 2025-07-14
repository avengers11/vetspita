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
            <h4 class="mb-sm-0">Post</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add</a></li>
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
                <h5 class="mb-0">{{keywords()->Add_Post ?? __('Add Post')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Category ?? __('Category')}} </label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Title ?? __('Title')}} </label>
                        <input type="text" class="form-control" name="title" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                        <textarea name="description" style="height: 400px" class="form-control ckeditor-classic"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                        <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
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
    })
  </script>
@endpush