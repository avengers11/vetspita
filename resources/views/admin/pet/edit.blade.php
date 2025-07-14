@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Patients</h4>

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
                <h5 class="mb-0">{{keywords()->Edit ?? __('Edit')}} {{keywords()-> Pet ?? __(' Pet')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.pet.update', $pet)}}" class="row" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 col-6">
                        <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                        <input type="text" class="form-control" name="name" value="{{ $pet->name }}" />
                    </div>

                    <div class="mb-3 col-6">
                        <label class="form-label" for="">{{keywords()->Species ?? __('Species')}} </label>
                        <select name="species" id="" class="form-select">
                            @foreach ($species as $item)
                                <option @if($pet->species == $item->name) selected @endif value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label" for="">{{keywords()->Breed ?? __('Breed')}} </label>
                        <input type="text" class="form-control" name="breed" value="{{ $pet->breed }}" required/>
                    </div>

                    <div class="mb-3 col-6">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="">{{keywords()->Age ?? __('Age')}} (Years) </label>
                                <input type="number" class="form-control" name="age_year" value="{{ $years }}" placeholder="Enter patient years" required/>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for=""> (Months) </label>
                                <input type="number" class="form-control" name="age_month" value="{{ $months }}" placeholder="Enter patient months" required/>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 col-6">
                        <label class="form-label" for="">{{keywords()->Gender ?? __('Gender')}} </label>
                        <select name="sex" id="" class="form-select">
                            <option value="Male" {{ $pet->sex == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $pet->sex == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label class="form-label" for="employees-role">{{keywords()->Assign_a_patient ?? __('Assign a patient')}}</label>
                        <select  class="selectpicker" data-live-search="true" name="user_id" disabled>
                            <option value="">Select a parents</option>
                            @foreach ($users as $item)
                                <option @if($item->id == $pet->user_id) selected @endif value="{{$item->id}}">{{$item->name}} - {{$item->user_id}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection