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
            <h4 class="mb-sm-0">Medicine</h4>

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

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{keywords()->Edit_Medicine ?? __('Edit Medicine')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.medicine.update', $medicine)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" >Select Medicine Category:*</label>
                                <select name="category" id="" class="form-select">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}" @if($medicine->category == $category->name) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" >Medicine Name:*</label>
                                <input type="text" class="form-control" value="{{ $medicine->name }}" name="name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" >Scientific Name (Optional):</label>
                                <input type="text" class="form-control" value="{{ $medicine->scientific }}" name="scientific" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" >Composition (Optional):</label>
                                <input type="text" class="form-control" value="{{ $medicine->measure }}" name="measure" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection