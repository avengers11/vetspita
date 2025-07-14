<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription</title>
    <link rel="stylesheet" href="{{ asset('assets\css\prescription.css') }}?v=1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: letter; /* Set paper size to A4 */
                margin: 0; /* Remove margins if needed */
            }

            body {
                margin: 0; /* Ensure no extra spacing */
            }
        }
    </style>
    @if ($type == 'saved')
        <style>
            .prescription-body {
                width: 100%
            }

            #prescription .prescription-body .details-medicine-wrapper .medicine-wrapper {
                width: 49rem;
            }

            .prescription_name {
                padding: 15px;
                width: 100%;
                display: block !important;
            }
        </style>
    @endif
</head>

<body>
        @csrf

        @php
            $dynamicClass = '';
            if ($type == 'saved') {
                $dynamicClass = 'd-none';
            }
        @endphp

        <form action="{{ route('admin.prescription.store') }}" method="post">
            <input type="hidden" name="user_id" id="user_id">
            @csrf
            {{-- hidden inputs --}}
            <input type="hidden" class="hide-show-name" id="hidden-clinical-history" name="clinical-history-status"
                value="0">
            <input type="hidden" class="hide-show-name" id="hidden-clinical-findings" name="clinical-findings-status"
                value="0">
            <input type="hidden" class="hide-show-name" id="hidden-diagnosis" name="diagnosis-status" value="0">
            <input type="hidden" class="hide-show-name" id="hidden-tests-suggestion" name="tests-suggestion-status"
                value="0">
            <input type="hidden" class="hide-show-name" id="hidden-dr-advice" name="dr-advice-status" value="0">
            <input type="hidden" name="type" value="{{ $type }}">

            <div id="prescription" class="print-container">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <td>
                                <div class="prescription-header">
                                    <img src="{{ asset('assets\images\icons\prescription-header.png') }}" alt="">
                                </div>
                            </td>
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <td>
                                <div class="prescription_name d-none">
                                    <strong>Prescriprion Name:</strong>
                                    <input type="text" name="prescription_name" class="title">
                                </div>
                    
                                <div class="prescription-body">
                                    <div class="information-top {{ $dynamicClass }}">
                                        <div class="box patient-name">
                                            <strong>Patient Name: </strong>
                                            <select name="pet_name" id="all_pets" class="selectpicker title" data-live-search="true" required>
                                                <option value="{{ $pet->name }}" data-id="{{ $pet->id }}" data-subtext="{{ $prescription->unique_id }}">{{ $pet->name }}</option>
                                                
                                                @foreach ($pets as $item)
                                                    <option value="{{ $item->name }}" data-id="{{ $item->id }}" data-subtext="{{ $item->unique_id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                    
                                        </div>
                                        <div class="box">
                                            <strong>Species: </strong>
                                            <input type="text" name="pet_species" id="species" class="title" value="{{$prescription->pet_species}}">
                                        </div>
                                        <div class="box">
                                            <strong>Weight: </strong>
                                            <input type="text" name="pet_weight" id="weight" class="title" value="{{$prescription->pet_weight}}">
                                        </div>
                    
                                        <div class="box parents-name">
                                            <strong>Parent's Name: </strong>
                                            <select name="owner_name" id="select_user" class="selectpicker title" data-live-search="true" required>
                                                <option value="{{ $patient->name }}" data-id="{{ $patient->id }}" data-subtext="{{ $patient->user_id }}">{{ $patient->name }}</option>
                                                
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->name }}" data-id="{{ $item->id }}"
                                                        data-subtext="{{ $item->number }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="box">
                                            <strong>Age: </strong>
                                            <input type="text" name="pet_age" id="age" class="title" value="{{$prescription->pet_age}}">
                                        </div>
                                        <div class="box">
                                            <strong>Gender: </strong>
                                            <select name="pet_sex" id="sex" class="title">
                                                <option value="Male" @if($prescription->pet_sex === "Male") selected @endif>Male</option>
                                                <option value="Female" @if($prescription->pet_sex === "Female") selected @endif>Female</option>
                                            </select>
                                        </div>
                                        <div class="box">
                                            <strong class="text-nowrap">Contact No: </strong>
                                            <input type="text" name="owner_number" id="user_number" class="title" value="{{$prescription->owner_number}}">
                                        </div>
                                        <div class="box">
                                            <strong>Breed: </strong>
                                            <input type="text" name="pet_breed" id="breed" class="title" value="{{$prescription->pet_breed}}">
                                        </div>
                                        <div class="box">
                                            <strong style="white-space: nowrap;">Patient ID: </strong>
                                            <input type="text" name="patient_id" id="patient_id" class="title" value="{{$prescription->patient_id}}">
                                        </div>
                                        <div class="box">
                                            <strong>Address: </strong>
                                            <textarea name="address" id="address" class="title">{{$prescription->address}}</textarea>
                                        </div>
                                        <div class="box saved-prescriptions">
                                            <strong>Saved: </strong>
                                            <span>
                                                <select id="saved_prescriptions" class="selectpicker title" data-live-search="true">
                                                    <option value="" selected>Select a prescription</option>
                                                    @foreach ($savedPrescription as $item)
                                                        <option value="{{ $item->id }}">{{ $item->prescription_name }}</option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </div>
                                        <div class="box">
                                            <strong>Date: </strong>
                                            <input type="text" name="date" class="title" value="{{$prescription->date}}">
                                        </div>
                                    </div>
                    
                                    {{-- wrapper  --}}
                                    <div class="details-medicine-wrapper">
                                        <div class="details-wrapper {{ $dynamicClass }}">
                                            <span class="details-content">
                                                <div class="details-box" id="clinical-history">
                                                    <h2 class="headline d-flex justify-content-between">
                                                        <span class="d-flex align-items-center justify-content-start"><span
                                                                class="badge bg-danger hide-show-btn" data-name="clinical-history">Hide
                                                                Now</span> Clinical History:</span>
                                                    </h2>
                                                    <p class="title d-flex gap-2">
                                                        Vaccination:
                                                        <select name="vaccinated" id="vaccinated-select">
                                                            <option value="No" @if($prescription->vaccinated === "No") selected @endif>No</option>
                                                            <option value="Yes" @if($prescription->vaccinated === "Yes") selected @endif>Yes</option>
                                                        </select>
                                                    </p>
                                                    
                                                    @if($prescription->vaccinated === "Yes")
                                                        <p class="title d-flex gap-2 text-nowrap" id="vaccinated-date">
                                                            Vaccinated Date: <input type="date" name="vaccinated_date" value="{{$prescription->vaccinated_date}}">
                                                        </p>
                                                    @endif
                                                    
                                                    <p class="title d-flex gap-2">
                                                        Deworming:
                                                        <select name="deworming" id="deworming-select">
                                                            <option value="No" @if($prescription->deworming === "No") selected @endif>No</option>
                                                            <option value="Yes" @if($prescription->deworming === "Yes") selected @endif>Yes</option>
                                                        </select>
                                                    </p>
                                                    
                                                    @if($prescription->deworming === "Yes")
                                                        <p class="title d-flex gap-2 d-none" id="deworming-date">
                                                            Deworming Date: <input type="date" name="deworming_date" value="{{$prescription->deworming_date}}">
                                                        </p>
                                                    @endif
                                                    
                    
                                                    <textarea name="clinical_history" id="" class="title mb-0"></textarea>
                                                </div>
                                                <div class="details-box" id="clinical-findings">
                                                    <h2 class="headline"><span class="badge bg-danger hide-show-btn"
                                                            data-name="clinical-findings">Hide Now</span> Clinical Findings:</h2>
                    
                                                    <textarea name="clinical_findings" id="" class="title mb-0">{{$prescription->clinical_findings}}</textarea>
                                                </div>
                                                <div class="details-box" id="diagnosis-content">
                                                    <h2 class="headline"><span class="badge bg-danger hide-show-btn"
                                                            data-name="diagnosis">Hide Now</span> Diagnosis:</h2>
                    
                                                    <textarea name="diagnosis" id="" class="title mb-0">{{$prescription->diagnosis}}</textarea>
                                                </div>
                    
                                                <div class="details-box" id="tests-suggestion">
                                                    <h2 class="headline"><span class="badge bg-danger hide-show-btn" data-name="tests-suggestion">Hide Now</span> Tests Suggestion:</h2>
                                                    <select name="" id="add-new-test" class="mb-3 title">
                                                        <option value="">Select a test</option>
                                                        @foreach ($tests as $item)
                                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                        @endforeach 
                                                    </select>
                    
                                                    <span id="test-adding-wrapper">
                                                        {{$prescription->test_suggestions != 'null' ? $prescription->test_suggestions : '' }}
                                                    </span>
                                                </div>
                    
                                                <div class="details-box" id="dr-advice">
                                                    <h2 class="headline"><span class="badge bg-danger hide-show-btn"
                                                            data-name="dr-advice">Hide Now</span> Dr. Advice:</h2>
                                                    <textarea name="advice" id="" class="title mb-0">{{$prescription->advice}}</textarea>
                                                </div>
                                            </span>
                    
                                            <div class="details-box mb-0">
                                           
                                            </div>
                                        </div>
                    
                                        <div class="medicine-wrapper">
                                            <i style="font-size: 30px;" class="fa-solid fa-prescription nav-icon mb-2"></i>
                                            <div class="add-new-medicine d-flex">
                                                <select id="select-new-medicine" class="selectpicker" data-live-search="true">
                                                    <option value="">Select a medicine</option>
                                                    @foreach ($medicines as $item)
                                                        <option data-id="{{ $item->id }}" data-category="{{ $item->category }}"
                                                            data-name="{{ $item->name }}"
                                                            data-measure="{{ !empty($item->measure) ? $item->measure : '' }}"
                                                            data-scientific="{{ $item->scientific }}">{{ $item->category }}
                                                            {{ $item->name }} {{ !empty($item->measure) ? "-$item->measure" : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMedicineModel"><i class="fa-solid fa-plus"></i></button>
                                            </div>
                    
                                            <div class="medicine-history-dr-wrapper"> 
                                                <div class="medicine-history-wrapper" id="medicine-history-wrapper">
                                                    @foreach (json_decode($prescription->medicine_history) as $index=>$item)
                                                        <div class="medicine">
                                                            <input type="hidden" name="medicine_id[{{$index}}]" value="{{$item->medicine_id}}" />
                                                            <input type="hidden" name="medicine_category[{{$index}}]" value="{{$item->medicine_category}}" />
                                                            <input type="hidden" name="medicine_name[{{$index}}]" value="{{$item->medicine_name}}" />
                                                            <input type="hidden" name="medicine_scientfic_name[{{$index}}]" value="{{$item->medicine_scientfic_name}}" />
                                                            <input type="hidden" name="medicine_measure[{{$index}}]" value="{{$item->medicine_measure}}" />
                                                        
                                                            <div class="top">
                                                                <div class="left">
                                                                    <strong class="headline">{{$item->medicine_category}}</strong>
                                                                    <span class="title">{{$item->medicine_name}}</span>
                                                                    <strong class="headline">{{$item->medicine_measure}}</strong>
                                                                    <span class="title">- {{$item->medicine_id}}</span>
                                                                    <input type="text" name="medicine_additional_details[{{$index}}]" class="title" value="{{$item->medicine_additional_details}}"/>
                                                                </div>
                                                                <div class="right">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-outline-success btn-sm view-sig"><i class="fa-solid fa-minus"></i></button>
                                                                        <button type="button" class="btn btn-outline-danger btn-sm remove-medicine"><i class="fa-solid fa-xmark"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <span class="title text-nowrap">Sig :</span>
                                                                <textarea name="medicine_sig[{{$index}}]" style="margin-left: 5px;" class="title sig-details ml-1 d-none">{{$item->medicine_sig}}</textarea>
                                                        
                                                                <input type="text" name="medicine_dosage[{{$index}}]" style="margin-left: 5px;" class="removable title" placeholder="Dosage:" value="{{$item->medicine_id}}"/>
                                                                <select  name="medicine_route[{{$index}}]" class="removable title">
                                                                    <option value="{{$item->medicine_route}}">{{$item->medicine_route}}</option>
                                                                </select>
                                                                <select  name="medicine_frequency[{{$index}}]" class="removable title">
                                                                    <option value="{{$item->medicine_frequency}}">{{$item->medicine_frequency}}</option>
                                                                </select>
                                                        
                                                                <input type="text"  name="medicine_duration[{{$index}}]" style="margin-left: 5px;" class="removable title" placeholder="Duration:" value="{{$item->medicine_duration}}" />
                                                            </div>
                                                        
                                                            <div class="search-wrapper d-none"></div>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="details-box d-none" id="dr-advice2">
                                    <div class="d-flex" style="padding-left: 15px;">
                                        <h2 class="headline">Dr. Advice:</h2>
                                        <p style="width: 46rem;" id="" class="title mb-0"></p>
                                    </div>
                                </div>
    
                            </td>
                        </tr>
                    </tbody>
    
                    <tfoot>
                        <tr>
                            <td>
                                <div class="prescription-footer">
                                    <img src="{{ asset('assets\images\icons\prescription-footer.png') }}" alt="">
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="btn-wrapper">
                <button type="submit" class="btn-success">Update</button>
                <button type="button" class="btn-preview {{ $dynamicClass }}">Preview</button>
                <button type="button" class="btn-print {{ $dynamicClass }}">Print</button>
                <button type="button" class="bg-warning {{ $dynamicClass }}" data-bs-toggle="modal"
                    data-bs-target="#addNewUser">Add Patient</button>
                <button type="button" class="bg-danger {{ $dynamicClass }}" id="hide-show-all" data-name="0">Hide
                    All</button>
            </div>
        </form>

            

    {{-- models  --}}
    <div class="modal fade" id="addMedicineModel" tabindex="-1" aria-labelledby="addMedicineModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.medicine.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="response" value="json">

                    <div class="modal-header">
                        <h5 class="modal-title" id="addMedicineModelLabel">Add Medicine</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label title">Select Medicine Category:*</label>
                                    <select name="category" class="form-select title" required>
                                        <option value="">Select a category</option>
                                        @foreach ($medicineCategories as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label title">Medicine Name:*</label>
                                    <input type="text" class="form-control title" name="name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label title">Scientific Name (Optional):</label>
                                    <input type="text" class="form-control title" name="scientific">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label title">Composition (Optional):</label>
                                    <input type="text" class="form-control title" name="measure">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add user  --}}
    <div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" id="new-user-pet-add">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewUserLabel">Add Owner & Pet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="">Owner Name:*</label>
                            <input type="text" class="form-control" id="new-owner-name" required />
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Contact No:*</label>
                            <input type="number" class="form-control" id="new-contact-no"
                                placeholder="Ex: 01*********" required />
                        </div>
                        <hr>
                        <div class="form-group mb-2">
                            <label for="">Pet Name:*</label>
                            <input type="text" class="form-control" id="new-pet-name" required />
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Select Species:*</label>
                            <select class="form-select" id="new-species" required>
                                <option disabled="" selected="" value="">---Select Species---</option>
                                @foreach ($species as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Breed:*</label>
                            <input type="text" class="form-control" id="new-pet-breed" required />
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Gender</label>
                            <select id="new-pet-sex" class="form-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option> 
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="">Age (Months):*</label>
                                    <input type="text" class="form-control" id="new-pet-age-year" required />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="">Age (Years):*</label>
                                    <input type="text" class="form-control" id="new-pet-age-month" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Weight (kg)</label>
                            <input type="text" class="form-control" id="new-pet-weight" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="new-user-add">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        

    {{-- script  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
        integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

    <script>
        // print 
        $(".btn-preview").click(function() {
            let hideScore = 0;
            const oldDetails = $("#medicine-history-wrapper").html();

            $("#prescription").addClass("print");
            $(".btn-wrapper").addClass("d-none");
            $("#add-new-test").addClass("d-none");
            $(".add-new-medicine").addClass("d-none");
            $(".btn-group").addClass("d-none");
            $(".badge").addClass("d-none");
            $(".box.saved-prescriptions span, .box.saved-prescriptions strong").addClass("d-none");
            $("textarea").each(function() {
                if ($(this).val() === "") {
                    $(this).addClass("d-none");
                }
            });
            $(".sig-details").each(function() {
                if ($(this).val() === "") {
                    $(this).addClass("d-none");
                }
            });

            // clinical history 
            if ($("#clinical-history #vaccinated-select").val() == "Yes" && $(
                    "#clinical-history #vaccinated-date input").val() == "") {
                $("#clinical-history #vaccinated-date").addClass("d-none");
            }
            if ($("#clinical-history #deworming-select").val() == "Yes" && $(
                    "#clinical-history #deworming-date input").val() == "") {
                $("#clinical-history #deworming-date").addClass("d-none");
            }
            if ($("#clinical-history textarea").val() == "" && $("#clinical-history #vaccinated-select").val() ==
                "No" && $("#clinical-history #deworming-select").val() == "No") {
                // $("#clinical-history").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // Clinical Findings:
            if ($("#clinical-findings textarea").val() == "") {
                $("#clinical-findings").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // check Diagnosis data 
            if ($("#diagnosis-content textarea").val() == "") {
                $("#diagnosis-content").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // test 
            if ($("#test-adding-wrapper input").length == 0) {
                $("#tests-suggestion").addClass("d-none");
                hideScore = hideScore + 1;
            }

            //dr-advice
            if ($("#dr-advice textarea").val() == "") {
                $("#dr-advice").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // remove left side     
            if (hideScore == 5) {
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper").addClass("d-none");
            }

            // medicine value 
            let medicineChild = $("#medicine-history-wrapper").children();
            medicineChild.each((index, element) => {
                let medicineDetails = $(element).find(".bottom");

                // now edit 
                let sigDetails = medicineDetails.find("textarea").val();
                let dosage = medicineDetails.find("input").eq(0).val();
                let route = medicineDetails.find("select").eq(0).val();
                let frequency = medicineDetails.find("select").eq(1).val();
                let duration = medicineDetails.find("input").eq(1).val();

                let planeText = sigDetails + " " + dosage + " " + route + " " + frequency + " " + duration;
                let finalText = planeText.trim();
                medicineDetails.html(`<p class="title text-break">Sig: ${finalText}</p>`);
            });

            // hide by input type 
            hideScore2 = 0;
            if ($("#hidden-clinical-history").val() == 1) {
                $("#clinical-history").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-clinical-findings").val() == 1) {
                $("#clinical-findings").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-diagnosis").val() == 1) {
                $("#diagnosis-content").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-tests-suggestion").val() == 1) {
                $("#tests-suggestion").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-dr-advice").val() == 1) {
                $("#dr-advice").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }

            // remove left side     
            if (hideScore2 == 5) {
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper").addClass("d-none");
            }

            // dr mod 
            if ($("#hidden-dr-advice").val() == 0 && $("#hidden-tests-suggestion").val() == 1 && $(
                    "#hidden-diagnosis").val() == 1 && $("#hidden-clinical-findings").val() == 1 && $(
                    "#hidden-clinical-history").val() == 1) {
                $("#dr-advice").addClass('d-none');
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper").addClass("d-none");
                $("#dr-advice2").removeClass("d-none");
            }

            // print 
            window.print();
         





            setTimeout(() => {
                $("#prescription").removeClass("print");
                $(".btn-wrapper").removeClass("d-none");
                $("#add-new-test").removeClass("d-none");
                $(".add-new-medicine").removeClass("d-none");
                $(".btn-group").removeClass("d-none");
                $(".box.saved-prescriptions span, .box.saved-prescriptions strong").removeClass("d-none");
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper")
                    .removeClass("d-none");
                $(".sig-details").removeClass("d-none");
                $(".badge").removeClass("d-none");
                $("textarea").each(function() {
                    if ($(this).val() === "") {
                        $(this).removeClass("d-none");
                    }
                });
                $(".details-box").removeClass("d-none");

                // clinical histories 
                if ($("#clinical-history #vaccinated-select").val() == "Yes" && $(
                        "#clinical-history #vaccinated-date input").val() == "") {
                    $("#clinical-history #vaccinated-date").removeClass("d-none");
                }
                if ($("#clinical-history #deworming-select").val() == "Yes" && $(
                        "#clinical-history #deworming-date input").val() == "") {
                    $("#clinical-history #deworming-date").removeClass("d-none");
                }

                // details 
                $("#medicine-history-wrapper").html(oldDetails);

                $("#dr-advice2").addClass("d-none");
            }, 100);
        });

        // print 
        $(".btn-print").click(function() {
            let hideScore = 0;
            const oldDetails = $("#medicine-history-wrapper").html();

            $("#prescription").addClass("print");
            $(".btn-wrapper").addClass("d-none");
            $("#add-new-test").addClass("d-none");
            $(".add-new-medicine").addClass("d-none");
            $(".btn-group").addClass("d-none");
            $(".badge").addClass("d-none");
            $(".box.saved-prescriptions span, .box.saved-prescriptions strong, .box.saved-prescriptions strong, #prescription .prescription-header img, #prescription .prescription-footer img")
                .addClass("d-none");
            $("textarea").each(function() {
                if ($(this).val() === "") {
                    $(this).addClass("d-none");
                }
            });
            $(".sig-details").each(function() {
                if ($(this).val() === "") {
                    $(this).addClass("d-none");
                }
            });

            // clinical history 
            if ($("#clinical-history #vaccinated-select").val() == "Yes" && $(
                    "#clinical-history #vaccinated-date input").val() == "") {
                $("#clinical-history #vaccinated-date").addClass("d-none");
            }
            if ($("#clinical-history #deworming-select").val() == "Yes" && $(
                    "#clinical-history #deworming-date input").val() == "") {
                $("#clinical-history #deworming-date").addClass("d-none");
            }
            if ($("#clinical-history textarea").val() == "" && $("#clinical-history #vaccinated-select").val() ==
                "No" && $("#clinical-history #deworming-select").val() == "No") {
                // $("#clinical-history").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // Clinical Findings:
            if ($("#clinical-findings textarea").val() == "") {
                $("#clinical-findings").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // check Diagnosis data 
            if ($("#diagnosis-content textarea").val() == "") {
                $("#diagnosis-content").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // test 
            if ($("#test-adding-wrapper input").length == 0) {
                $("#tests-suggestion").addClass("d-none");
                hideScore = hideScore + 1;
            }

            //dr-advice
            if ($("#dr-advice textarea").val() == "") {
                $("#dr-advice").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // remove left side     
            if (hideScore == 5) {
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper").addClass("d-none");
            }

            // medicine value 
            let medicineChild = $("#medicine-history-wrapper").children();
            medicineChild.each((index, element) => {
                let medicineDetails = $(element).find(".bottom");

                // now edit 
                let sigDetails = medicineDetails.find("textarea").val();
                let dosage = medicineDetails.find("input").eq(0).val();
                let route = medicineDetails.find("select").eq(0).val();
                let frequency = medicineDetails.find("select").eq(1).val();
                let duration = medicineDetails.find("input").eq(1).val();

                let planeText = sigDetails + " " + dosage + " " + route + " " + frequency + " " + duration;
                let finalText = planeText.trim();
                medicineDetails.html(`<p class="title text-break">Sig: ${finalText}</p>`);
            });

            // hide by input type 
            hideScore2 = 0;
            if ($("#hidden-clinical-history").val() == 1) {
                $("#clinical-history").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-clinical-findings").val() == 1) {
                $("#clinical-findings").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-diagnosis").val() == 1) {
                $("#diagnosis-content").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-tests-suggestion").val() == 1) {
                $("#tests-suggestion").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }
            if ($("#hidden-dr-advice").val() == 1) {
                $("#dr-advice").addClass("d-none");
                hideScore2 = hideScore2 + 1;
            }

            // remove left side     
            if (hideScore2 == 5) {
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper").addClass("d-none");
            }

            // dr mod 
            if ($("#hidden-dr-advice").val() == 0 && $("#hidden-tests-suggestion").val() == 1 && $(
                    "#hidden-diagnosis").val() == 1 && $("#hidden-clinical-findings").val() == 1 && $(
                    "#hidden-clinical-history").val() == 1) {
                $("#dr-advice").addClass('d-none');
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper").addClass("d-none");

                $("#dr-advice2").removeClass("d-none");
            }

            // print 
            window.print();

            setTimeout(() => {
                $("#prescription").removeClass("print");
                $(".btn-wrapper").removeClass("d-none");
                $("#add-new-test").removeClass("d-none");
                $(".add-new-medicine").removeClass("d-none");
                $(".btn-group").removeClass("d-none");
                $(".box.saved-prescriptions span, .box.saved-prescriptions strong").removeClass("d-none");
                $("#prescription .prescription-body .details-medicine-wrapper .details-wrapper, .box.saved-prescriptions strong, .box.saved-prescriptions strong, #prescription .prescription-header img, #prescription .prescription-footer img")
                    .removeClass("d-none");
                $(".sig-details").removeClass("d-none");
                $(".badge").removeClass("d-none");
                $("textarea").each(function() {
                    if ($(this).val() === "") {
                        $(this).removeClass("d-none");
                    }
                });
                $(".details-box").removeClass("d-none");

                // clinical histories 
                if ($("#clinical-history #vaccinated-select").val() == "Yes" && $(
                        "#clinical-history #vaccinated-date input").val() == "") {
                    $("#clinical-history #vaccinated-date").removeClass("d-none");
                }
                if ($("#clinical-history #deworming-select").val() == "Yes" && $(
                        "#clinical-history #deworming-date input").val() == "") {
                    $("#clinical-history #deworming-date").removeClass("d-none");
                }

                // details 
                $("#medicine-history-wrapper").html(oldDetails);

                $("#dr-advice2").addClass("d-none");
            }, 100);
        });

        // add a test 
        $("#add-new-test").change(function() {
            let test = $(this).val();
            let i = $("span#test-adding-wrapper input").length + 1;

            $("#test-adding-wrapper").append(
                `<input type="text" name="test_suggestions[${i}]" class="title" value="${test}" />`);
        });

        // date 
        $("#vaccinated-select").change(function() {
            let val = $(this).val();
            if (val == "Yes") {
                $("#vaccinated-date").removeClass("d-none");
            } else {
                $("#vaccinated-date").addClass("d-none");
            }
        });
        $("#deworming-select").change(function() {
            let val = $(this).val();
            if (val == "Yes") {
                $("#deworming-date").removeClass("d-none");
            } else {
                $("#deworming-date").addClass("d-none");
            }
        });

        // sig details  
        $(document).on('click', "#medicine-history-wrapper .view-sig", function() {
            if ($(this).hasClass("sig")) {
                $(this).removeClass("sig");
                $(this).closest(".medicine").find(".removable").removeClass("d-none");
                $(this).closest(".medicine").find(".removable").removeAttr("required");
                $(this).closest(".medicine").find(".removable").attr("required", true);
                $(this).closest(".medicine").find(".sig-details").removeAttr("required").addClass("d-none");
                $()
            } else {
                $(this).addClass("sig");
                $(this).closest(".medicine").find(".removable").addClass("d-none");

                let options = $(this).closest(".medicine").find("option");
                options.removeAttr("selected");
                $(this).closest(".medicine").find(".removable").removeAttr("required");
                $(this).closest(".medicine").find("select").val("");
                $(this).closest(".medicine").find(".sig-details").attr("required", true).removeClass("d-none");
            }
        });

        // add medicine 
        $(document).on('changed.bs.select', '#select-new-medicine', function() {
            const selectedOption = $(this).find('option:selected');

            // Extract data attributes
            const id = selectedOption.data('id');
            const name = selectedOption.data('name');
            const category = selectedOption.data('category');
            const measure = selectedOption.data('measure');
            const scientific = selectedOption.data('scientific');
            const sectionCount = $('#medicine-history-wrapper').children().length + 1;

            // add new medicine 
            $("#medicine-history-wrapper").append(`
                <div class="medicine">
                    <input type="hidden" name="medicine_id[${sectionCount}]" value="${id}">
                    <input type="hidden" name="medicine_category[${sectionCount}]" value="${category}">
                    <input type="hidden" name="medicine_name[${sectionCount}]" value="${name}">
                    <input type="hidden" name="medicine_scientfic_name[${sectionCount}]" value="${scientific}">
                    <input type="hidden" name="medicine_measure[${sectionCount}]" value="${measure}">

                    <div class="top">
                        <div class="left">
                            <strong class="headline">${sectionCount}</strong>
                            <span class="title">${category}</span>
                            <strong class="headline">${name}</strong>
                            <span class="title">${measure !== "" && measure !== null ? "- " + measure : ""}</span>
                            <input type="text" name="medicine_additional_details[${sectionCount}]" class="title">
                        </div>
                        <div class="right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-success btn-sm view-sig"><i class="fa-solid fa-minus"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm remove-medicine"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <span class="title text-nowrap">Sig :</span>
                        <textarea name="medicine_sig[${sectionCount}]" style="margin-left: 5px;" class="title sig-details ml-1 d-none"></textarea>

                        <input type="text" required name="medicine_dosage[${sectionCount}]" style="margin-left: 5px;" class="removable title" placeholder="Dosage:">
                        <select required name="medicine_route[${sectionCount}]" class="removable title">
                            <option value="">Route</option>
                            @foreach ($routes as $route)
                                <option value="{{ $route->name }}">{{ $route->name }}</option>
                            @endforeach
                        </select>
                        <select required name="medicine_frequency[${sectionCount}]" class="removable title">
                            <option value="">Frequency</option>
                            @foreach ($frequncy as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                        <input type="text" required name="medicine_duration[${sectionCount}]" style="margin-left: 5px;" class="removable title" placeholder="Duration:">
                    </div>

                    <div class="search-wrapper d-none">
                    </div>
                </div>
            `);
        });

        // remove medicine 
        $(document).on("click", "#medicine-history-wrapper .remove-medicine", function() {
            $(this).closest(".medicine").remove();
        })

        // store a medicine 
        $("#addMedicineModel form").submit(function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            // Make an AJAX request
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                success: function(response) {
                    if (response.status === true) {
                        toastr.success(response.message);
                        $("#select-new-medicine").append(`
                            <option data-id="${response.medicine.id}" data-category="${response.medicine.category}" data-name="${response.medicine.name}" data-measure="${response.medicine.measure}" data-scientific="${response.medicine.scientific}">${response.medicine.category} ${response.medicine.name} ${response.medicine.measure != null ? "-"+response.medicine.measure : ""}</option>
                        `);
                        $("#select-new-medicine").selectpicker('destroy');
                        $("#select-new-medicine").selectpicker();
                    } else {
                        toastr.error(response.message);
                    }
                },
                complete: function() {
                    $("#addMedicineModel .btn-close").click();
                },
                error: function() {
                    toastr.error("An unexpected error occurred. Please try again.");
                }
            });
        });


        // saved prescriptions 
        $("#saved_prescriptions").change(function() {
            let id = $(this).val();
            $("#medicine-sections").html('');

            if (id == "") {
                return;
            }
            $.ajax({
                method: "POST",
                url: `/admin/prescription/saved-info/${id}`,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    // others 
                    $("#advice").val(data.advice);
                    $("#clinical_history").val(data.clinical_history);
                    $("#clinical_findings").val(data.clinical_findings);
                    $("#diagnosis").val(data.diagnosis);

                    // history 
                    const medicineHistory = JSON.parse(data.medicine_history);
                    const mapData = medicineHistory.map((curE, i) => {
                        console.log(curE);

                        let sectionCount = i + 1;
                        return `
                        <div class="medicine">
                            <input type="hidden" name="medicine_id[${sectionCount}]" value="${curE.medicine_id}">
                            <input type="hidden" name="medicine_category[${sectionCount}]" value="${curE.medicine_category}">
                            <input type="hidden" name="medicine_name[${sectionCount}]" value="${curE.medicine_name}">
                            <input type="hidden" name="medicine_scientfic_name[${sectionCount}]" value="${curE.medicine_scientfic_name}">
                            <input type="hidden" name="medicine_measure[${sectionCount}]" value="${curE.medicine_measure}">

                            <div class="top">
                                <div class="left">
                                    <strong class="headline">${sectionCount}</strong>
                                    <span class="title">${curE.medicine_category}</span>
                                    <strong class="headline">${curE.medicine_name}</strong>
                                    <span class="title">-</span>
                                    <span class="title">${curE.medicine_measure}</span>
                                    <input type="text" name="medicine_additional_details[${sectionCount}]" value="${curE.medicine_additional_details != null ? curE.medicine_additional_details : ""}" class="title">
                                </div>
                                <div class="right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success btn-sm view-sig"><i class="fa-solid fa-minus"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-medicine"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <span class="title text-nowrap">Sig :</span>
                                <input type="text" name="medicine_sig[${sectionCount}]" value="${curE.medicine_sig}" style="margin-left: 5px;" class="title sig-details ml-1 d-none">
                             
                                <input type="text" required name="medicine_dosage[${sectionCount}]" value="${curE.medicine_dosage == null ? "" : curE.medicine_dosage}" style="margin-left: 5px;" class="removable title" placeholder="Dosage:">
                                <select required name="medicine_route[${sectionCount}]" class="removable title">
                                    <option value="">Route</option>
                                    ${curE.medicine_route != null ? `<option value="${curE.medicine_route}" selected>${curE.medicine_route}</option>` : ""}
                                    @foreach ($routes as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <select required name="medicine_frequency[${sectionCount}]" class="removable title">
                                    <option value="">Frequency</option>
                                    ${curE.medicine_frequency != null ? `<option value="${curE.medicine_frequency}" selected>${curE.medicine_frequency}</option>` : ""}
                                    @foreach ($frequncy as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" required name="medicine_duration[${sectionCount}]" style="margin-left: 5px;" class="removable title" placeholder="Duration:" value="${curE.medicine_duration == null ? "" : curE.medicine_duration}">

                            </div>

                            <div class="search-wrapper d-none">
                            </div>
                        </div>
                        `;
                    });
                    $("#medicine-history-wrapper").html(mapData);
                }
            });
        });

        // select a user 
        $("#select_user").change(function() {
            let id = $(this).find("option:selected").attr("data-id");
            $("#user_number").val('');
            $("#address").val('');
            $("#all_pets").selectpicker('destroy');
            $("#all_pets").selectpicker();
            $("#user_id").val(id);

            if (id == "") {
                return;
            }
            $.ajax({
                method: "POST",
                url: "/admin/prescription/user-info",
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
                    const options = `<option value=''>Select a patient name</option>` + petsMap.join(
                        "");
                    $("#all_pets").html(options);
                    $("#all_pets").selectpicker('destroy');
                    $("#all_pets").selectpicker();
                }
            });
        });

        // select a pets 
        $("#all_pets").change(function() {
            getUsers();
        });
        const getUsers = () => {
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
                url: "/admin/prescription/pet-info",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id
                },
                success: function(data) {
                    if(!data.status){
                        return;
                    }
                    let ageYears = data.pet.years != 0 ? `${data.pet.years} Years` : ``;
                    let ageMonths = data.pet.months != 0 ? `${data.pet.months} Months` : ``;

                    $("#species").val(data.pet.species != null ? data.pet.species : "");
                    $("#breed").val(data.pet.breed != null ? data.pet.breed : "");
                    $("#sex").val(data.pet.sex != null ? data.pet.sex : "");
                    $("#age").val(ageYears + " " + ageMonths);
                    $("#patient_id").val(data.pet.unique_id != null ? data.pet.unique_id : "");

                    $("#user_number").val(data.user.number != null ? data.user.number : "");
                    $("#address").val(data.user.address != null ? data.user.address : "");
                    $("#select_user").val(data.user.name != null ? data.user.name : "");
                    $("#select_user").html(
                        `<option value='${data.user.name != null ? data.user.name : ""}'>${data.user.name != null ? data.user.name : ""}</option>`
                    );
                    $("#select_user").selectpicker('destroy');
                    $("#select_user").selectpicker();

                    $("#user_id").val(data.user.id);
                }
            });
        }
        // getUsers();

        // add history  
        $(document).on("keypress", ".sig-details", function(event) {
            if (event.which === 13) { // Check if 'Enter' key is pressed
                event.preventDefault(); // Prevent default action (if needed)
                const inputField = $(this); // Store reference to the input field

                $.ajax({
                    method: "POST",
                    url: `/admin/prescription/add-search-history`,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        "text": inputField.val()
                    },
                    success: function(data) {
                        // Assuming `data` contains the response you want to display
                        // Add a container to display the result if it doesn't exist
                        let resultContainer = inputField.next('.result-container');
                        if (resultContainer.length === 0) {
                            resultContainer = $('<div class="result-container"></div>');
                            inputField.after(resultContainer);
                        }
                        // Display the response data
                        resultContainer.html(`<p>${data}</p>`).show();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }
        });


        $(document).on("keyup", ".sig-details", function() {
            let wrapper = $(this).closest(".medicine").find(".search-wrapper");
            wrapper.removeClass("d-none");
            wrapper.html(`<p class="title">Loading...</p>`);
            let text = $(this).val();
            text = text.trim().replace(/\s+/g, ' ');

            $.ajax({
                method: "POST",
                url: `/admin/prescription/get-search-history`,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    "text": text
                },
                success: function(data) {
                    console.log(data.length);

                    if (data.length > 0) {
                        const mapData = data.map((curE) => {
                            console.log(curE.text);

                            return `
                            <p class="title"> ${curE.text}</p>
                            `;
                        });
                        wrapper.html(mapData);

                        console.log(data);

                    } else {
                        wrapper.addClass("d-none");
                    }
                }
            });
        });
        $(document).on("click", ".sig-details", function() {
            let wrapper = $(this).closest(".medicine").find(".search-wrapper");
            wrapper.addClass("d-none");
        });

        $(document).on("click", ".search-wrapper p", function() {
            let text = $(this).text();
            text = text.trim().replace(/\s+/g, ' ');
            $(this).closest(".medicine").find(".sig-details").val(text);
            $(this).closest(".medicine").find(".sig-details").attr("value", text);

            let wrapper = $(this).closest(".medicine").find(".search-wrapper");
            wrapper.addClass("d-none");
        });

        // input on writing 
        $(document).on("input", "input", function() {
            let val = $(this).val();
            val = val.trim();
            $(this).attr("value", val);
        });

        // textarea on writing 
        $(document).on("input", "textarea", function() {
            let val = $(this).val();
            val = val.trim();
            $(this).text(val);
        });

        $(document).on("change", "select", function() {
            $(this).find("option").removeAttr("selected");
            $(this).find("option:selected").attr("selected", true);
        });

        // hide now 
        $("span.badge.hide-show-btn").click(function() {
            if ($(this).hasClass("bg-success")) {
                $(this).addClass("bg-danger")
                $(this).removeClass("bg-success")
                $(this).text("Hide Now");
            } else {
                $(this).addClass("bg-success")
                $(this).removeClass("bg-danger")
                $(this).text("Show Now");
            }
            // hide or remove 
            let name = $(this).attr("data-name");
            let id = $(`#hidden-${name}`);
            if (id.val() == "0") {
                id.val(1);
            } else {
                id.val(0);
            }
        });
        $("#hide-show-all").click(function() {
            if ($(this).hasClass("bg-secondary")) {
                $(this).addClass("bg-danger")
                $(this).removeClass("bg-secondary")
                $(this).text("Hide All");
            } else {
                $(this).addClass("bg-secondary")
                $(this).removeClass("bg-danger")
                $(this).text("Show All");
            }

            let attr = $(this).attr("data-name");
            if (attr == "1") {
                $(this).attr("data-name", "0");
                $(".hide-show-name").val("0");

                $("span.badge.hide-show-btn").addClass("bg-danger")
                $("span.badge.hide-show-btn").removeClass("bg-success")
                $("span.badge.hide-show-btn").text("Hide Now");
            } else {
                $(this).attr("data-name", "1");
                $(".hide-show-name").val("1");

                $("span.badge.hide-show-btn").addClass("bg-success")
                $("span.badge.hide-show-btn").removeClass("bg-danger")
                $("span.badge.hide-show-btn").text("Show Now");
            }
        });


        /*
        ===================
        ===================
        */
        // add new user 
        $("#new-user-pet-add").submit(function(e) {
            e.preventDefault();

            $("#new-user-add").html("Loading...");
            // data 
            let userName = $("#new-owner-name").val();
            let userNumber = $("#new-contact-no").val();
            let petName = $("input#new-pet-name").val();
            let species = $("select#new-species").val();
            let breed = $("input#new-pet-breed").val();
            let sex = $("input#new-pet-sex").val();
            let weight = $("input#new-pet-weight").val();
            let ageMonth = $("input#new-pet-age-month").val();
            let ageYear = $("input#new-pet-age-year").val();

            $.ajax({
                method: "POST",
                url: `/admin/prescription/user-pet-add`,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    userName,
                    userNumber,
                    petName,
                    species,
                    breed,
                    sex,
                    ageMonth,
                    ageYear,
                    weight,
                },
                success: function(response) {
                    if (response.status) {
                        // user details 
                        $("#select_user").append(
                            `<option value="${userName}" selected>${userName}</option>`);
                        $("#user_number").val(userNumber);
                        $("select#all_pets").append(
                            `<option value="${petName}" selected>${petName}</option>`);
                        $("select#species").val($("select#new-species").val());
                        $("input#breed").val($("input#new-pet-breed").val());
                        $("input#sex").val($("input#new-pet-sex").val());
                        $("input#age").val($("input#new-pet-age").val());
                        $("input#weight").val($("input#new-pet-weight").val());
                        $("#addNewUser .btn-close").click();
                        $("#new-user-add").html("Save");

                        $("#select_user").selectpicker('destroy');
                        $("#select_user").selectpicker();
                        $("#all_pets").selectpicker('destroy');
                        $("#all_pets").selectpicker();

                        toastr.success(response.message);
                    } else {
                        $("#new-user-add").html("Try Again");

                        toastr.error(response.message);
                    }
                }
            });

        });

        $(document).on("input", "textarea", function() {
            $(this).css("height", "22px");
            $(this).css("height", this.scrollHeight + "px");
        });

        // text area  
        $(document).on("input", "#dr-advice textarea", function() {
            let text = $(this).val();
            $("#dr-advice2 p").text(text);
        });
    </script>
</body>

</html>
