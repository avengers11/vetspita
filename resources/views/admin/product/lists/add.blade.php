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
            <h4 class="mb-sm-0">Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Add</li>
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
                <h5 class="mb-0">{{keywords()->Add_Product ?? __('Add Product')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.list.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Package ?? __('Package')}} </label>
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="">Select a package</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Plan ?? __('Plan')}} </label>
                        <select name="plan_id" id="plan_id" class="form-control">
                            <option value="">Select a plan</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->category ?? __('category')}} </label>
                        <select name="product_category_id" id="product_category_id" class="form-control">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Title ?? __('Title')}} </label>
                        <input type="text" class="form-control" name="title" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Short_Description ?? __('Short Description')}} </label>
                        <textarea style="height: 400px" class="form-control" name="short_description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Stock ?? __('Stock')}} </label>
                        <input type="number" class="form-control" name="stock" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->SKU ?? __('SKU')}} </label>
                        <input type="text" class="form-control" name="sku" value="{{ $sku }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Price ?? __('Price')}} </label>
                        <input type="text" class="form-control" name="price" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Discount ?? __('Discount')}} </label>
                        <input type="text" class="form-control" name="discount" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->More_Details ?? __('More Details')}} </label>
                        <textarea style="height: 400px" class="form-control ckeditor-classic" name="more_details"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Is_Feature ?? __('Is Feature')}} </label>
                        <select name="is_featured" id="" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Status ?? __('Status')}} </label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                        <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                    </div>

                    @php
                        $details = [
                            "package_validity" => "",
                            "wellness_or_sick_visit" => "",
                            "virtual_chat_with_information_centre" => "",
                            "vaccination_core_dhppi_corona" => "",
                            "rabies_first_vaccination" => "",
                            "rabies_second_vaccination" => "",
                            "kennel_cough_vaccination" => "",
                            "puppy_deworming" => "",
                            "tick_or_flea_treatment" => "",
                            "basic_grooming_session" => "",
                            "swimming" => "",
                            "fecal_testing" => "",
                            "teleconsultation_or_online_consultation" => "",
                            "hip_xray_3_or_6_months" => "",
                            "health_and_fitness_certificate" => "",
                            "basic_blood_test" => "",
                            "cbc" => "",
                            "dog_food_and_medicine_discount" => "",
                            "toys_and_accessories" => "",
                            "nutrition_or_diet_consult_with_prior_appointment" => ""
                        ];
                    @endphp

                    <div class="row" style="padding: 15px; border-radius: 7px; border: 1px solid #dddd; margin: 0px;">
                        <div class="col-12 mb-3">
                            <h3>Package Details</h3>
                        </div>
                        @foreach ($details as $key=>$item)
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label text-capitalize" style="font-size: 14px; color: #3d3d3ddd">{{ __(str_replace("_", " ", $key))}}</label>
                                    <input type="text" class="form-control" name="{{ $key }}" />
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')

<script>
    $(function () {
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
                    });
                    
                    // Add an empty option at the start
                    const options = `<option value=''>Select an option</option>` + mapdata.join("");
                    $("#plan_id").html(options);
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
                    });
                    const options = `<option value=''>Select an option</option>` + mapdata.join("");
                    $("#product_category_id").html(options);
                }
            });
            
        });
    })
  </script>
@endpush