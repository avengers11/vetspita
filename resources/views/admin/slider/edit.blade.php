@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Slider</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>
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
                <h5 class="mb-0">{{keywords()->Edit_Slider ?? __('Edit Slider')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.slider.update', $slider)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="employees-name">{{keywords()->Link ?? __('Link')}} </label>
                        <input type="text" class="form-control" id="employees-name" name="link" value="{{ $slider->link }}" placeholder="{{keywords()->Enter_your_slider_link ?? __('Enter your slider link')}}..." />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employees-email">{{keywords()->Order ?? __('Order')}} </label>
                        <input type="number" class="form-control" id="employees-email" name="order" value="{{ $slider->order }}" placeholder="{{keywords()->Auto ?? __('Auto')}}" />
                    </div>


                    <div class="mb-3">
                        <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                        <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                        <div class="img-wrapper">
                            <img class="form-img" src="{{Storage::url($slider->image)}}" alt="">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection