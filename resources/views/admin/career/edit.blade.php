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
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Career</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Career</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                <h5 class="mb-0">{{keywords()->Create_Career ?? __('Create Career')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.career.update', $career)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                        <input type="text" class="form-control" id="employees-name" value="{{ $career->name }}" name="name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Location ?? __('Location')}} </label>
                        <input type="text" class="form-control" id="employees-name" value="{{ $career->address }}" name="address" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Vacancy ?? __('Vacancy')}} </label>
                        <input type="text" class="form-control" id="employees-name" value="{{ $career->vacancy }}" name="vacancy" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Submit_url ?? __('Submit URL')}} </label>
                        <input type="text" class="form-control" id="employees-name" value="{{ $career->form_url }}" name="form_url" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-email">{{keywords()->Desacription ?? __('Desacription')}} </label>
                        <textarea name="details" class="form-control" id="details" cols="30" rows="10">{!! $career->details !!}</textarea>
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
        $('#details').summernote();
    })
  </script>
@endpush