@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Registration</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Patient</a></li>
                    <li class="breadcrumb-item active">Register</li>
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
                <h5 class="mb-0">{{keywords()->Client_Info ?? __('Client Info')}}</h5>
            </div>
            <form action="{{ route("admin.pet.registrationSubmit") }}" method="post" enctype="multipart/form-data">
                @csrf 

                <div class="card-body row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Old_Client ?? __('Old Client')}} </label>
                        <select class="selectpicker" name="user_id" id="select_client" data-live-search="true">
                            <option value="">Select a client</option>
                            @foreach ($users as $item)
                                <option value="{{$item->id}}" @if($user->id == $item->id) selected @endif data-subtext="{{ $item->number }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Name ?? __('Name')}} </label>
                        <input type="text" class="form-control" name="owner_name" value="{{ $user->name }}" required/>
                    </div>
    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Number ?? __('Number')}} </label>
                        <input type="number" class="form-control" name="owner_number" value="{{ $user->number }}" required/>
                    </div>
    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Email ?? __('Email')}} </label>
                        <input type="email" class="form-control" name="owner_email" value="{{ $user->email }}"/>
                    </div>
    
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Address ?? __('Address')}} </label>
                        <input type="text" class="form-control" name="owner_address" value="{{ $user->address }}" required/>
                    </div>
    
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{keywords()->Password ?? __('Password')}} </label>
                        <input type="text" class="form-control" name="owner_password" value=""/>
                    </div>
    
                    <div class="mb-3 col-md-12">
                        <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                        <input type="file" class="form-control" name="owner_image" accept=".jpg, .jpeg, .png, .web, .svg" />
                        <div class="img-wrapper">
                            <img class="form-img" src="{{Storage::url($user->image)}}" alt="">
                        </div>
                    </div>
                </div>
    
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{keywords()->Patient_Info ?? __('Patient Info')}}</h5>
                </div>
                
                <div class="card-body row pb-0">
                    <div class="card-body">
                        <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#arrow-new" role="tab">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                    <span class="d-none d-sm-block">New</span>
                                </a>
                            </li>
                            @foreach ($user->pets as $index=>$item)
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#arrow-{{ $item->id }}" role="tab">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                        <span class="d-none d-sm-block">{{ $item->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="arrow-new" role="tabpanel">
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label class="form-label" for="">{{keywords()->Name ?? __('Name')}} </label>
                                        <input type="text" class="form-control" name="pet_name" />
                                    </div>
                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="">{{keywords()->Species ?? __('Species')}} </label>
                                        <select name="pet_species" id="" class="form-select">
                                            <option value="">Select a species</option>
                                            @foreach ($species as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="">{{keywords()->Breed ?? __('Breed')}} </label>
                                        <input type="text" class="form-control" name="pet_breed" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label" for="">{{keywords()->Age ?? __('Age')}} </label>
                                                <input type="number" class="form-control" name="pet_age_year" placeholder="Enter patient years" />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label" for=""> . </label>
                                                <input type="number" class="form-control" name="pet_age_month" placeholder="Enter patient months" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="">{{keywords()->Gender ?? __('Gender')}} </label>
                                        <select name="pet_sex" id="" class="form-select">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
    
    
                            @foreach ($user->pets as $index=>$item)
                                <input type="hidden" name="ids[{{ $index }}]" value="{{ $item->id }}">

                                <div class="tab-pane" id="arrow-{{ $item->id }}" role="tabpanel">
                                    <div class="row">
                                        <div class="mb-3 col-12">
                                            <label class="form-label" for="">{{keywords()->Name ?? __('Name')}} </label>
                                            <input type="text" class="form-control" name="name[{{ $index }}]" value="{{ $item->name }}"/>
                                        </div>
                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">{{keywords()->Species ?? __('Species')}} </label>
                                            <select name="species[{{ $index }}]" id="" class="form-select">
                                                <option value="">Select a species</option>
                                                @foreach ($species as $specie)
                                                    <option value="{{ $specie->name }}" @if($specie->name == $item->species) selected @endif>{{ $specie->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">{{keywords()->Breed ?? __('Breed')}} </label>
                                            <input type="text" class="form-control" name="breed[{{ $index }}]" value="{{ $item->breed }}"/>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row">
                                                @php
                                                    // Target date
                                                    $currentDate = Carbon\Carbon::now();
                                                    $parsedDate = Carbon\Carbon::parse($item->age);
                                                    $years = $parsedDate->diffInYears($currentDate);
                                                    $months = $parsedDate->copy()->addYears($years)->diffInMonths($currentDate);
                                                @endphp 
                                                <div class="col-6">
                                                    <label class="form-label" for="">{{keywords()->Age ?? __('Age')}} </label>
                                                    <input type="number" class="form-control" name="age_year[{{ $index }}]" placeholder="Enter patient years" value="{{ $years }}"/>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label" for=""> . </label>
                                                    <input type="number" class="form-control" name="age_month[{{ $index }}]" placeholder="Enter patient months" value="{{ $months }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">{{keywords()->Gender ?? __('Gender')}} </label>
                                            <select name="sex[{{ $index }}]" id="" class="form-select">
                                                <option @if($item->sex == "Male") selected @endif value="Male">Male</option>
                                                <option @if($item->sex == "Female") selected @endif value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    
                <div class="card-body pt-0 row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('js')
    <script>
        $("#select_client").change(function(){
            let id = $(this).val();

            window.location.href=`/admin/pet/registration/${id}`;
        });
    </script>
@endpush