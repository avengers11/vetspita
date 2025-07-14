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
            <h4 class="mb-sm-0">Consultant</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
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
                <h5 class="mb-0">{{keywords()->Create_Consultants ?? __('Create Consultants')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.consultant.store')}}" class="row" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                        <input type="text" class="form-control" id="employees-name" name="name" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="employees-name">{{keywords()->Designation ?? __('Designation')}} </label>
                        <input type="text" class="form-control" id="employees-name" name="designation" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="employees-name">{{keywords()->Address ?? __('Address')}} </label>
                        <input type="text" class="form-control" id="employees-name" name="address" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="employees-name">{{keywords()->Phone ?? __('Phone')}} </label>
                        <input type="text" class="form-control" id="employees-name" name="phone" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="employees-name">{{keywords()->Email ?? __('Email')}} </label>
                        <input type="text" class="form-control" id="employees-name" name="email" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                        <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                        <textarea style="height: 400px" class="form-control ckeditor-classic" name="description"></textarea>
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
        $('#description').summernote()
    })
  </script>
@endpush