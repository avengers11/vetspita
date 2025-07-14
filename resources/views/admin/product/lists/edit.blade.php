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
            <h4 class="mb-sm-0">Product</h4>

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
                <h5 class="mb-0">{{keywords()->Edit_Product ?? __('Edit Product')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.list.update', $product)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Package ?? __('Package')}} </label>
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="">Select a package</option>
                            @foreach ($packages as $package)
                                <option @if($product->package != null && $product->package->id  == $package->id) selected @endif value="{{ $package->id }}">{{ $package->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Plan ?? __('Plan')}} </label>
                        <select name="plan_id" id="plan_id" class="form-control">
                            <option value="">Select a plan</option>
                            @foreach ($plans as $plan)
                                <option @if($product->plan != null && $product->plan->id  == $plan->id) selected @endif value="{{ $plan->id }}">{{ $plan->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->category ?? __('category')}} </label>
                        <select name="product_category_id" id="product_category_id" class="form-control">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option @if($product->category != null && $product->category->id  == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Title ?? __('Title')}} </label>
                        <input type="text" class="form-control" name="title" value="{{ $product->title }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Short_Description ?? __('Short Description')}} </label>
                        <textarea id="short_description" style="height: 400px" class="form-control" name="short_description">@php echo $product->short_description; @endphp</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Stock ?? __('Stock')}} </label>
                        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->SKU ?? __('SKU')}} </label>
                        <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Price ?? __('Price')}} </label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Discount ?? __('Discount')}} </label>
                        <input type="text" class="form-control" name="discount" value="{{ $product->discount }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->More_Details ?? __('More Details')}} </label>
                        <textarea id="more_details" style="height: 400px" class="form-control ckeditor-classic" name="more_details">{!! $product->more_details !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Is_Feature ?? __('Is Feature')}} </label>
                        <select name="is_featured" id="" class="form-control">
                            <option @if(!$product->is_featured) selected @endif value="0">No</option>
                            <option @if($product->is_featured) selected @endif value="1">Yes</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Status ?? __('Status')}} </label>
                        <select name="status" id="" class="form-control">
                            <option @if($product->is_featured) selected @endif value="1">Yes</option>
                            <option @if(!$product->is_featured) selected @endif value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                        <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                        <div class="img-wrapper">
                            <img class="form-img" src="{{Storage::url($product->image)}}" alt="">
                        </div>
                    </div>

                    @php
                        $dbDetails = json_decode($product->details, true);
                    @endphp

                    <div class="row" style="padding: 15px; border-radius: 7px; border: 1px solid #dddd">
                        <div class="col-12 mb-3">
                            <h3>Package Details</h3>
                        </div>
                        @foreach ($dbDetails as $item)
                            @php
                                $key = key($item);
                                $value = $item[$key];
                            @endphp
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label text-capitalize" style="font-size: 14px; color: #3d3d3ddd">{{ __(str_replace("_", " ", $key))}}</label>
                                    <input type="text" class="form-control" name="{{ $key }}" value="{{ $value }}"/>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">SUBMIT</button>
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
        $('#short_description').summernote();
        $('#details').summernote();
        $('#more_details').summernote();

        // get plan  
        $("#package_id").change(function(){
            let id = $(this).val();

            $("#plan_id").html('');
            $("#product_category_id").html('');

            $.ajax({
                'url': '{{ route('admin.product.list.getPlan') }}',
                "headers" : {
                    "X-CSRF-TOKEN" : '{{csrf_token()}}'
                },
                'method': 'POST',
                'data': {
                    'id': id
                },
                success:function(data){
                    const mapdata = data.plans.map((curE) => {
                        return `
                        <option value='${curE.id}'>${curE.title}</option>
                        `;
                    })
                    $("#plan_id").html(mapdata);
                }
            });
            
        });
        // get plan  
        $("#plan_id").change(function(){
            let id = $(this).val();

            $("#product_category_id").html('');
            $.ajax({
                'url': '{{ route('admin.product.list.getCategory') }}',
                "headers" : {
                    "X-CSRF-TOKEN" : '{{csrf_token()}}'
                },
                'method': 'POST',
                'data': {
                    'id': id
                },
                success:function(data){
                    const mapdata = data.category.map((curE) => {
                        return `
                        <option value='${curE.id}'>${curE.title}</option>
                        `;
                    })
                    $("#product_category_id").html(mapdata);
                }
            });
            
        });
    })
  </script>
@endpush