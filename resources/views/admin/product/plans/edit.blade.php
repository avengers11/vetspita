@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Plan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
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
                <h5 class="mb-0">{{keywords()->Edit_Plan ?? __('Edit Plan')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.plan.update', $plan)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Package ?? __('Package')}} </label>
                        <select name="package_id" id="" class="form-control">
                            <option value="">Select a package</option>
                            @foreach ($packages as $package)
                                <option @if($plan->package != null && $plan->package->id  == $package->id) selected @endif value="{{ $package->id }}">{{ $package->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Title ?? __('Title')}} </label>
                        <input type="text" class="form-control" name="title" value="{{ $plan->title }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Description ?? __('Description')}} </label>
                        <textarea name="description" class="form-control ckeditor-classic" cols="30" rows="10" class="form-control">{{ $plan->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection