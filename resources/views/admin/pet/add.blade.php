@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Patients</h4>

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
                <h5 class="mb-0">{{keywords()->Add_Patients ?? __('Add Patients')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.pet.store')}}" class="row" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                        <input type="text" class="form-control" name="name" />
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Species ?? __('Species')}} </label>
                        <select name="species" id="" class="form-select">
                            <option value="">Select a species</option>
                            @foreach ($species as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Breed ?? __('Breed')}} </label>
                        <input type="text" class="form-control" name="breed" required/>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="">{{keywords()->Age ?? __('Age')}} </label>
                                <input type="number" class="form-control" name="age_year" placeholder="Enter patient years" required/>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for=""> . </label>
                                <input type="number" class="form-control" name="age_month" placeholder="Enter patient months" required/>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">{{keywords()->Gender ?? __('Gender')}} </label>
                        <select name="sex" id="" class="form-select">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6" class="selectpicker-wrapper">
                        <label class="form-label d-block" for="employees-role"><span>{{keywords()->Assign_a_parents ?? __('Assign a parents')}}</span> <span class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#addParents">Add New</span></label>
                        <select class="selectpicker title" data-live-search="true" name="user_id" id="select_parents" required>
                            @foreach ($users as $item)
                                <option value="{{$item->id}}" data-subtext="{{ $item->number }}">{{$item->name}}</option>
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


<!-- Modal -->
<div class="modal fade" id="addParents" tabindex="-1" aria-labelledby="addParentsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-2">
            <form action="{{route('admin.pet.addParents')}}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addParentsLabel">Add Parents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="employees-name">{{keywords()->Name ?? __('Name')}} </label>
                            <input type="text" class="form-control userName" name="name" />
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="">{{keywords()->Number ?? __('Number')}} </label>
                            <input type="number" class="form-control" name="number" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="">{{keywords()->Email ?? __('Email')}} </label>
                            <input type="email" class="form-control" name="email" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="">{{keywords()->Address ?? __('Address')}} </label>
                            <input type="text" class="form-control" name="address"/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{keywords()->Password ?? __('Password')}} </label>
                            <input type="text" class="form-control" name="password" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{keywords()->Upload_a_image ?? __('Upload a image')}}</label>
                            <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .web, .svg" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $("#addParents form").submit(function(e) {
            e.preventDefault();
            $("#addParents form .submit").html("Loading...");
            // data 
            let formData = $(this).serialize();
            let userName = $("#addParents form .userName").val();

            $.ajax({
                url: $(this).attr("action"),
                method: $(this).attr("method"),
                data: formData,
                success: function(response) {
                    if (response.status) {
                        // user details 
                        $("#select_parents").append(`<option value="${response.user.id}" data-subtext=${response.user.number}" selected>${userName}</option>`);
                        $("#select_parents").selectpicker('destroy');
                        $("#select_parents").selectpicker();
                        $("#addParents .btn-close").click();

                        toastr.success(response.msg);
                    } else {
                        $("#addParents form .submit").html("Try Again");
                        toastr.error(response.msg);
                    }
                }
            });

        });
    </script>
@endpush