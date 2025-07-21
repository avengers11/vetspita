<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription</title>
    <link rel="stylesheet" href="{{ asset("assets/css/test-report.css") }}?v=1.2">

    <style>
        @page {
            margin: 0;
        }
        #prescription{
            width: 100%;
        }
        .prescription-body{
            width: 100%;
        }
        #prescription .prescription-body .information-top {
            grid-template-columns: 33% 33% 33%;
        }
        .dropdown.bootstrap-select.category-equipment-selector.mb-3{
            width: 100% !important;
        }
        #prescription, #prescription .prescription-body{
            min-height: 40rem !important;
        }
        .images{
            width: 100%;
        }
    </style>
</head>
<body>
@extends('admin.layouts.master')
@section('master')

    <form action="{{ route('admin.lab-diognosis.cbc.create') }}" method="post" enctype="multipart/form-data">
        @csrf 

        <div id="prescription" class="">
            <div class="prescription-body">
                <div class="information-top">
                    <div class="box patient-name">
                        <strong>Patient Name: </strong>
                        @if (empty($pet) || $pet == null)
                            <select name="pet_name" id="all_pets" class="selectpicker title" data-live-search="true" required>
                                @foreach ($pets as $item)
                                    <option value="{{ $item->name }}" data-id="{{ $item->id }}" data-subtext="{{ $item->unique_id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="pet_name" id="all_pets" class="selectpicker title" data-live-search="true" required>
                                <option value="{{ $pet->name }}" data-id="{{ $pet->id }}" data-subtext="{{ $pet->unique_id }}">{{ $pet->name }}</option>
                            </select>
                        @endif
                    </div>
                    <div class="box">
                        <strong>Species: </strong>
                        <input type="text" name="pet_species" id="species" class="title">
                    </div>
                    <div class="box">
                        <strong>Weight: </strong>
                        <input type="text" name="pet_weight" id="weight" class="title">
                    </div>
                
                    <div class="box parents-name">
                        <strong>Parent's Name: </strong>
                        <select name="owner_name" id="select_user" class="selectpicker title" data-live-search="true" required>
                            @foreach ($users as $item)
                                <option value="{{ $item->name }}" data-id="{{ $item->id }}" data-subtext="{{ $item->number }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box">
                        <strong>Age: </strong>
                        <input type="text" name="pet_age" id="age" class="title">
                    </div>
                    <div class="box">
                        <strong>Gender: </strong>
                        <select name="pet_sex" id="sex" class="title">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="box">
                        <strong>Contact No: </strong>
                        <input type="text" name="owner_number" id="user_number" class="title">
                    </div>
                    <div class="box">
                        <strong>Breed: </strong>
                        <input type="text" name="pet_breed" id="breed" class="title">
                    </div>
                    <div class="box">
                        <strong>Patient ID: </strong>
                        <input type="text" name="patient_id" id="patient_id" class="title" value="">
                    </div>
                    <div class="box">
                        <strong>Address: </strong>
                        <input type="text" name="address" id="address" class="title">
                    </div>
                    <div class="box saved-prescriptions">
                        <strong>Referral Dr: </strong>
                        <select name="ref_dr" id="ref_dr" class="selectpicker title" data-live-search="true">
                            <option value="">-</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box">
                        <strong>Date: </strong>
                        <input type="text" name="date" class="title" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
    
                {{-- wrapper  --}}
                <div class="details-test-report-wrapper">
                    <div class="table-responsive">
                        <table class="invoice-table table table-borderless table-nowrap mb-0">
                            <thead class="align-middle">
                                <tr class="table-active">
                                    <th scope="col text-start" style="white-space: nowrap;">SL no</th>
                                    <th scope="col">Parameters</th>
                                    <th scope="col">Result</th>
                                    <th scope="col">Ref Value</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col" class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody id="newItems">
                             
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-wrapper">
            <button type="submit" class="btn-success">Submit & Print</button>
        </div>
    </form>

    @push('js')
        <script>
            $(document).ready(function () {
                $(".category-equipment-selector").change(function(){
                    const selectedOption = $(this).find('option:selected');
                    let id = selectedOption.data('id');
                    let category = selectedOption.data('category');
                    let parameter = selectedOption.data('parameter');
                    let abbreviation = selectedOption.data('abbreviation');
                    let canine_ref_range = selectedOption.data('canine_ref_range');
                    let feline_ref_range = selectedOption.data('feline_ref_range');
                    let units = selectedOption.data('units');
                    if (id === undefined || id === "") {
                        return;
                    }

                    addNewItemFileds(id, category, parameter, abbreviation, canine_ref_range, feline_ref_range, units);
                    $("#addItems .btn-close").click();
                });
                const addNewItemFileds = (id, parameter, abbreviation, canine_ref_range, feline_ref_range, units) => {
                    let length = $("#newItems").children().length + 1;
                    let refValue = "";
                    var petSpecies = $('[name="pet_species"]').val().toLowerCase();

                    // check match or not  
                    if(petSpecies === "feline"){
                        refValue = feline_ref_range;
                    }else{
                        refValue = canine_ref_range;
                    }

                    $("#newItems").append(`
                        <tr>
                            <input type="hidden" class="form-control" value="${id}" name="ref_ids[]"/>
                            <input type="hidden" class="form-control" value="${abbreviation}" name="ref_abbreviations[]"/>
                            <th scope="row" class="item-serial">${length}</th>
                            <td class="text-start">
                                <input type="text" class="form-control" value="${parameter}" name="ref_parameters[]"/>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="ref_results[]"/>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="ref_values[]" value="${refValue}" />
                            </td>
                            <td>
                                <input type="text" class="form-control" name="ref_units[]" value="${units}" />
                            </td>
                            <td class="item-removal">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger" type="button">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `);
                }
                // remove 
                $(document).on("click", "#newItems .item-removal", function(){
                    $(this).closest('tr').remove();
                    $("#newItems tr .item-serial").each(function(index) {
                        $(this).text(index + 1);
                    });
                });

                // select a user 
                $("#select_user").change(function() {
                    let id = $(this).find("option:selected").attr("data-id");
                    $("#user_number").val('');
                    $("#address").val('');
                    $("#all_pets").selectpicker('destroy');
                    $("#all_pets").selectpicker();
                    
                    if (id == "") {
                        return;
                    }
                    $.ajax({
                        method: "POST",
                        url: "{{ route('admin.lab.general.parentsInfo') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            id
                        },
                        success: function(data) {
                            $("#user_number").val(data.user.number);
                            $("#address").val(data.user.address);

                            // all_pets
                            const petsMap = data.pets.map((curE) => {
                                return `
                                    <option value='${curE.id}'>${curE.name}</option>
                                `;
                            });
                            const options = `<option value=''>Select a patient name</option>` + petsMap.join("");
                            $("#all_pets").html(options);
                            $("#all_pets").selectpicker('destroy');
                            $("#all_pets").selectpicker();
                        }
                    });
                });
            
                // select a pets 
                $("#all_pets").change(function() {
                    changeDataByPets();
                });
                const changeDataByPets = () => {
                    const selectedOption = $("#all_pets").find('option:selected');
                    const id = selectedOption.data('id');
                    $("#species").val('');
                    $("#breed").val('');
                    $("#sex").val('');
                    $("#age").val('');
                    $("#weight").val('');
                    $("#user_number").val('');
                    $("#address").val('');

                    if (id == "") {
                        return;
                    }
                    $.ajax({
                        method: "POST",
                        url: "{{ route('admin.lab.general.patientInfo') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            id
                        },
                        success: function(data) {
                            let ageYears = data.pet.years != 0 ? `${data.pet.years} Years` : `` ;
                            let ageMonths = data.pet.months != 0 ? `${data.pet.months} Months` : `` ;

                            $("#species").val(data.pet.species != null ? data.pet.species : "");
                            $("#breed").val(data.pet.breed != null ? data.pet.breed : "");
                            $("#sex").val(data.pet.sex != null ? data.pet.sex : "");
                            $("#age").val(ageYears +" "+ ageMonths);
                            $("#patient_id").val(data.pet.unique_id != null ? data.pet.unique_id : "");

                            allRefs();

                            $("#user_number").val(data.user != null ? data.user.number : "");
                            $("#address").val(data.user != null ? data.user.address : "");
                            $("#select_user").val(data.user != null ? data.user.name : "");
                            $("#select_user").html(`<option value='${data.user != null ? data.user.name : ""}'>${data.user != null ? data.user.name : ""}</option>`);
                            $("#select_user").selectpicker('destroy');
                            $("#select_user").selectpicker();
                        }
                    });
                }
                changeDataByPets();

                // all refs  
                const allRefs = () => {
                    $("#newItems").html("");
                    console.log("hi");
                    
                    $.ajax({
                        method: "GET",
                        url: "/admin/lab-diognosis/cbc/ref-values",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {},
                        success: function(data) {
                            data.map((curE) => {
                                addNewItemFileds(curE.id, curE.parameter, curE.abbreviation, curE.canine_ref_range, curE.feline_ref_range, curE.units);
                            })
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection

    