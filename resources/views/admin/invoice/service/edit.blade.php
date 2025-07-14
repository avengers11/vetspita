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
            <h4 class="mb-sm-0">Service</h4>

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
                <h5 class="mb-0">{{keywords()->Create_Service ?? __('Create Service')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.invoice.service.edit', $service)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Price ?? __('Price')}} </label>
                        <input type="number" class="form-control" value="{{ $service->price }}" name="price" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                        <input type="text" class="form-control" value="{{ $service->name }}" name="name" />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                        <textarea style="height: 400px" class="form-control" name="description">{{ $service->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
