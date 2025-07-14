<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription</title>
    <link rel="stylesheet" href="{{ asset("assets/css/test-report.css") }}?v=1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">

    <style>
        @page {
            margin: 0;
        }
    </style>
</head>
<body>
    <form action="{{ route('admin.prescription.store') }}" method="post">
        @csrf 

        <div id="prescription" class="">
            <div class="prescription-header">
                <img src="{{ asset("assets\images\icons\prescription-header.png") }}" alt="">
            </div>

            <div class="prescription-body">
                <div class="information-top">
                    <div class="box patient-name">
                        <strong>Patient Name: </strong>
                        <select name="pet_name" id="all_pets" class="selectpicker title" data-live-search="true" required>
                            @foreach ($pets as $item)
                                <option value="{{ $item->name }}" data-id="{{ $item->id }}" data-subtext="{{ $item->unique_id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
                        <input type="text" name="unique_id" class="title" value="" disabled>
                    </div>
                    <div class="box">
                        <strong>Address: </strong>
                        <input type="text" name="address" id="address" class="title">
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
                        <input type="text" name="date" class="title" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
    
                {{-- wrapper  --}}
                <div class="details-test-report-wrapper">
                    <div class="test-report-wrapper">
                        <div class="test-report-history-wrapper" id="test-report-history-wrapper">
                            <div class="test-report">
                                <div class="top">
                                    <div class="left">
                                        {{-- <span class="title">WBC</span>
                                        <span class="title">17.49 </span>
                                        <span class="title">H</span>
                                        <span class="title">5.50 - 19.90</span>
                                        <span class="title">%</span> --}}
                                        <input type="text" name="" class="title">
                                        <input type="text" name="" class="title">
                                        <input type="text" name="" class="title">
                                        <input type="text" name="" class="title">
                                        <input type="text" name="" class="title">
                                    </div>
                                    
                                    <div class="right">
                                        <div class="range-attr">
                                            <input type="range" name="" class="title">
                                            <span class="bar1"></span>
                                            <span class="bar2"></span>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button class="btn btn-outline-danger btn-sm remove-test-report"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>

            <div class="prescription-footer">
                <img src="{{ asset("assets\images\icons\prescription-footer.png") }}" alt="">
            </div>
        </div>

        <div class="btn-wrapper">
            <button type="submit" class="btn-success">Submit</button>
            <button type="button" class="btn-print">Preview</button>
            <button type="button" class="bg-warning" data-bs-toggle="modal" data-bs-target="#addNewUser">Add Patient</button>
            <button type="button" class="bg-danger" id="hide-show-all" data-name="0">Hide All</button>
        </div>
    </form>


    {{-- script  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

    <script>

        // print 
        $(".btn-print").click(function(){
            let hideScore = 0;
            const oldDetails = $("#test-report-history-wrapper").html();

            $("#prescription").addClass("print");
            $(".btn-wrapper").addClass("d-none");
            $("#add-new-test").addClass("d-none");
            $(".add-new-test-report").addClass("d-none");
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
            if($("#clinical-history #vaccinated-select").val() == "Yes" && $("#clinical-history #vaccinated-date input").val() == ""){
                $("#clinical-history #vaccinated-date").addClass("d-none");
            }
            if($("#clinical-history #deworming-select").val() == "Yes" && $("#clinical-history #deworming-date input").val() == ""){
                $("#clinical-history #deworming-date").addClass("d-none");
            }
            if($("#clinical-history textarea").val() == "" && $("#clinical-history #vaccinated-select").val() == "No" && $("#clinical-history #deworming-select").val() == "No"){
                $("#clinical-history").addClass("d-none");
                hideScore = hideScore + 1;
            }
            
            // Clinical Findings:
            if($("#clinical-findings textarea").val() == ""){
                $("#clinical-findings").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // check Diagnosis data 
            if($("#diagnosis-content textarea").val() == ""){
                $("#diagnosis-content").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // test 
            if($("#test-adding-wrapper input").length == 0){
                $("#tests-suggestion").addClass("d-none");
                hideScore = hideScore + 1;
            }

            //dr-advice
            if($("#dr-advice textarea").val() == ""){
                $("#dr-advice").addClass("d-none");
                hideScore = hideScore + 1;
            }

            // remove left side     
            if(hideScore == 5){
                $("#prescription .prescription-body .details-test-report-wrapper .details-wrapper").addClass("d-none");
            }

            // test-report value 
            let test-reportChild = $("#test-report-history-wrapper").children();
            test-reportChild.each((index, element) => {
                let test-reportDetails = $(element).find(".bottom");
                
                // now edit 
                let sigDetails = test-reportDetails.find("input").eq(0).val();
                let dosage = test-reportDetails.find("input").eq(1).val();
                let route = test-reportDetails.find("select").eq(0).val();
                let frequency = test-reportDetails.find("select").eq(1).val();
                let duration = test-reportDetails.find("input").eq(2).val();

                let planeText = sigDetails+" "+dosage+" "+route+" "+frequency+" "+duration;
                let finalText = planeText.trim();
                test-reportDetails.html(`<p class="title">Sig: ${finalText}</p>`);
            });

            // hide by input type 
            hideScore2 = 0;
            if($("#hidden-clinical-history").val() == 1){
                $("#clinical-history").addClass("d-none");
                hideScore2 = hideScore2 +1;
            }
            if($("#hidden-clinical-findings").val() == 1){
                $("#clinical-findings").addClass("d-none");
                hideScore2 = hideScore2 +1;
            }
            if($("#hidden-diagnosis").val() == 1){
                $("#diagnosis-content").addClass("d-none");
                hideScore2 = hideScore2 +1;
            }
            if($("#hidden-tests-suggestion").val() == 1){
                $("#tests-suggestion").addClass("d-none");
                hideScore2 = hideScore2 +1;
            }
            if($("#hidden-dr-advice").val() == 1){
                $("#dr-advice").addClass("d-none");
                hideScore2 = hideScore2 +1;
            }
            // remove left side     
            if(hideScore2 == 5){
                $("#prescription .prescription-body .details-test-report-wrapper .details-wrapper").addClass("d-none");
            }

            // print 
            window.print();

            setTimeout(() => {
                $("#prescription").removeClass("print");
                $(".btn-wrapper").removeClass("d-none");
                $("#add-new-test").removeClass("d-none");
                $(".add-new-test-report").removeClass("d-none");
                $(".btn-group").removeClass("d-none");
                $(".box.saved-prescriptions span, .box.saved-prescriptions strong").removeClass("d-none");
                $("#prescription .prescription-body .details-test-report-wrapper .details-wrapper").removeClass("d-none");
                $(".sig-details").removeClass("d-none");
                $(".badge").removeClass("d-none");
                $("textarea").each(function() {
                    if ($(this).val() === "") {
                        $(this).removeClass("d-none");
                    }
                });
                $(".details-box").removeClass("d-none");

                // clinical histories 
                if($("#clinical-history #vaccinated-select").val() == "Yes" && $("#clinical-history #vaccinated-date input").val() == ""){
                    $("#clinical-history #vaccinated-date").removeClass("d-none");
                }
                if($("#clinical-history #deworming-select").val() == "Yes" && $("#clinical-history #deworming-date input").val() == ""){
                    $("#clinical-history #deworming-date").removeClass("d-none");
                }
                
                // details 
                $("#test-report-history-wrapper").html(oldDetails);
            }, 100);
        });

        // add a test 
        $("#add-new-test").change(function(){
            let test = $(this).val();
            let i = $("span#test-adding-wrapper input").length + 1;

            $("#test-adding-wrapper").append(`<input type="text" name="test_suggestions[${i}]" class="title" value="${test}" />`);
        });

        // date 
        $("#vaccinated-select").change(function(){
            let val = $(this).val();
            if(val == "Yes"){
                $("#vaccinated-date").removeClass("d-none");
            }else{
                $("#vaccinated-date").addClass("d-none");
            }
        });
        $("#deworming-select").change(function(){
            let val = $(this).val();
            if(val == "Yes"){
                $("#deworming-date").removeClass("d-none");
            }else{
                $("#deworming-date").addClass("d-none");
            }
        });

        // sig details  
        $(document).on('click', "#test-report-history-wrapper .view-sig", function () {
            if($(this).hasClass("sig")){
                $(this).removeClass("sig");
                $(this).closest(".test-report").find(".removable").removeClass("d-none");
                $(this).closest(".test-report").find(".removable").removeAttr("required");
                $(this).closest(".test-report").find(".removable").attr("required", true);
            }else{
                $(this).addClass("sig");
                $(this).closest(".test-report").find(".removable").addClass("d-none");

                let options = $(this).closest(".test-report").find("option");
                options.removeAttr("selected");
                $(this).closest(".test-report").find(".removable").removeAttr("required");
                $(this).closest(".test-report").find("select").val("")
            }
        });

        // add test-report 
        $(document).on('changed.bs.select', '#select-new-test-report', function () {
            const selectedOption = $(this).find('option:selected');

            // Extract data attributes
            const id = selectedOption.data('id');
            const name = selectedOption.data('name');
            const category = selectedOption.data('category');
            const measure = selectedOption.data('measure');
            const scientific = selectedOption.data('scientific');
            const sectionCount = $('#test-report-history-wrapper').children().length + 1;

            // add new test-report 
            $("#test-report-history-wrapper").append(`
                <div class="test-report">
                    <input type="hidden" name="test-report_id[${sectionCount}]" value="${id}">
                    <input type="hidden" name="test-report_category[${sectionCount}]" value="${category}">
                    <input type="hidden" name="test-report_name[${sectionCount}]" value="${name}">
                    <input type="hidden" name="test-report_scientfic_name[${sectionCount}]" value="${scientific}">
                    <input type="hidden" name="test-report_measure[${sectionCount}]" value="${measure}">

                    <div class="top">
                        <div class="left">
                            <strong class="headline">${sectionCount}</strong>
                            <span class="title">${category}</span>
                            <strong class="headline">${name}</strong>
                            <span class="title">-</span>
                            <span class="title">${measure}</span>
                            <input type="text" name="test-report_additional_details[${sectionCount}]" class="title">
                        </div>
                        <div class="right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-success btn-sm view-sig"><i class="fa-solid fa-minus"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm remove-test-report"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <span class="title">Sig :</span>
                        <input type="text" required name="test-report_sig[${sectionCount}]" style="margin-left: 5px;" class="title sig-details ml-1">

                        <input type="text" required name="test-report_dosage[${sectionCount}]" style="margin-left: 5px;" class="removable title" placeholder="Dosage:">
                        <select required name="test-report_route[${sectionCount}]" class="removable title">
                            <option value="">Route</option>
                            @foreach ($routes as $route)
                                <option value="{{ $route->name }}">{{ $route->name }}</option>
                            @endforeach
                        </select>
                        <select required name="test-report_frequency[${sectionCount}]" class="removable title">
                            <option value="">Frequency</option>
                            @foreach ($frequncy as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                        <input type="text" required name="test-report_duration[${sectionCount}]" style="margin-left: 5px;" class="removable title" placeholder="Duration:">
                    </div>

                    <div class="search-wrapper d-none">
                    </div>
                </div>
            `);
        });

        // remove test-report 
        $(document).on("click", "#test-report-history-wrapper .remove-test-report", function(){
            $(this).closest(".test-report").remove();
        })

        // store a test-report 
        $("#addMedicineModel form").submit(function (e) {
            e.preventDefault();
            const formData = $(this).serialize();

            // Make an AJAX request
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData, 
                success: function (response) {
                    if (response.status === true) {
                        toastr.success(response.message);
                        $("#select-new-test-report").append(`
                            <option data-id="${response.test-report.id}" data-category="${response.test-report.category}" data-name="${response.test-report.name}" data-measure="${response.test-report.measure}" data-scientific="${response.test-report.scientific}">${response.test-report.category} ${response.test-report.name} - ${response.test-report.measure}</option>
                        `);
                        $("#select-new-test-report").selectpicker('destroy');
                        $("#select-new-test-report").selectpicker();
                    } else {
                        toastr.error(response.message);
                    }
                },
                complete: function(){
                    $("#addMedicineModel .btn-close").click();
                },
                error: function () {
                    toastr.error("An unexpected error occurred. Please try again.");
                }
            });
        });


        // saved prescriptions 
        $("#saved_prescriptions").change(function() {
            let id = $(this).val();
            $("#test-report-sections").html('');

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
                    const test-reportHistory = JSON.parse(data.test-report_history);
                    const mapData = test-reportHistory.map((curE, i) => {
                        console.log(curE);
                        
                        let sectionCount = i+1;
                        return `
                        <div class="test-report">
                            <input type="hidden" name="test-report_id[${sectionCount}]" value="${curE.test-report_id}">
                            <input type="hidden" name="test-report_category[${sectionCount}]" value="${curE.test-report_category}">
                            <input type="hidden" name="test-report_name[${sectionCount}]" value="${curE.test-report_name}">
                            <input type="hidden" name="test-report_scientfic_name[${sectionCount}]" value="${curE.test-report_scientfic_name}">
                            <input type="hidden" name="test-report_measure[${sectionCount}]" value="${curE.test-report_measure}">

                            <div class="top">
                                <div class="left">
                                    <strong class="headline">${sectionCount}</strong>
                                    <span class="title">${curE.test-report_category}</span>
                                    <strong class="headline">${curE.test-report_name}</strong>
                                    <span class="title">-</span>
                                    <span class="title">${curE.test-report_measure}</span>
                                    <input type="text" name="test-report_additional_details[${sectionCount}]" value="${curE.test-report_additional_details != null ? curE.test-report_additional_details : ""}" class="title">
                                </div>
                                <div class="right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success btn-sm view-sig"><i class="fa-solid fa-minus"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm remove-test-report"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <span class="title">Sig :</span>
                                <input type="text" required name="test-report_sig[${sectionCount}]" value="${curE.test-report_sig}" style="margin-left: 5px;" class="title sig-details ml-1">
                             
                                <input type="text" required name="test-report_dosage[${sectionCount}]" value="${curE.test-report_dosage == null ? "" : curE.test-report_dosage}" style="margin-left: 5px;" class="removable title" placeholder="Dosage:">
                                <select required name="test-report_route[${sectionCount}]" class="removable title">
                                    <option value="">Route</option>
                                    ${curE.test-report_route != null ? `<option value="${curE.test-report_route}" selected>${curE.test-report_route}</option>` : ""}
                                    @foreach ($routes as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <select required name="test-report_frequency[${sectionCount}]" class="removable title">
                                    <option value="">Frequency</option>
                                    ${curE.test-report_frequency != null ? `<option value="${curE.test-report_frequency}" selected>${curE.test-report_frequency}</option>` : ""}
                                    @foreach ($frequncy as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" required name="test-report_duration[${sectionCount}]" style="margin-left: 5px;" class="removable title" placeholder="Duration:" value="${curE.test-report_duration == null ? "" : curE.test-report_duration}">

                            </div>

                            <div class="search-wrapper d-none">
                            </div>
                        </div>
                        `;
                    });
                    $("#test-report-history-wrapper").html(mapData);
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
                    const options = `<option value=''>Select a patient name</option>` + petsMap.join("");
                    $("#all_pets").html(options);
                    $("#all_pets").selectpicker('destroy');
                    $("#all_pets").selectpicker();
                }
            });
        });
        // select a pets 
        $("#all_pets").change(function() {
            const selectedOption = $(this).find('option:selected');
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
                    let ageYears = data.pet.years != 0 ? `${data.pet.years} Years` : `` ;
                    let ageMonths = data.pet.months != 0 ? `${data.pet.months} Months` : `` ;

                    $("#species").val(data.pet.species);
                    $("#breed").val(data.pet.breed);
                    $("#sex").val(data.pet.sex);
                    $("#age").val(ageYears +" "+ ageMonths);
                    $("#weight").val(data.pet.weight + "Kg");
                    $("#user_number").val(data.user.number);
                    $("#address").val(data.user.address);
                    $("#select_user").val(data.user.name);
                    $("#select_user").html(`<option value='${data.user.name}'>${data.user.name}</option>`);
                    $("#select_user").selectpicker('destroy');
                    $("#select_user").selectpicker();
                }
            });
        });
        // add history  
        $(document).on("keypress", ".sig-details", function (event) {
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
                    success: function (data) {
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
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }
        });


        $(document).on("keyup", ".sig-details", function () {
            let wrapper = $(this).closest(".test-report").find(".search-wrapper");
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
                    
                    if(data.length > 0){
                        const mapData = data.map((curE) => {
                            console.log(curE.text);
                            
                            return `
                            <p class="title"> ${curE.text}</p>
                            `;
                        });
                        wrapper.html(mapData);

                        console.log(data);
                        
                    }else{
                        wrapper.addClass("d-none");
                    }
                }
            });
        });
        $(document).on("click", ".sig-details", function () {
            let wrapper = $(this).closest(".test-report").find(".search-wrapper");
            wrapper.addClass("d-none");
        });

        $(document).on("click", ".search-wrapper p", function () {
            let text = $(this).text();
            text = text.trim().replace(/\s+/g, ' ');
            $(this).closest(".test-report").find(".sig-details").val(text);
            $(this).closest(".test-report").find(".sig-details").attr("value", text);

            let wrapper = $(this).closest(".test-report").find(".search-wrapper");
            wrapper.addClass("d-none");
        });

        // input on writing 
        $(document).on("input", "input", function () {
            let val = $(this).val();
            val = val.trim();
            $(this).attr("value", val);
        });
        $(document).on("change", "select", function () {
            $(this).find("option").removeAttr("selected");
            $(this).find("option:selected").attr("selected", true);
        });

        // hide now 
        $("span.badge.hide-show-btn").click(function(){
            if($(this).hasClass("bg-success")){
                $(this).addClass("bg-danger")
                $(this).removeClass("bg-success")
                $(this).text("Hide Now");
            }else{
                $(this).addClass("bg-success")
                $(this).removeClass("bg-danger")
                $(this).text("Show Now");
            }
            // hide or remove 
            let name = $(this).attr("data-name");
            let id = $(`#hidden-${name}`);
            if(id.val() == "0"){
                id.val(1);
            }else{
                id.val(0);
            }
        });
        $("#hide-show-all").click(function(){
            if($(this).hasClass("bg-secondary")){
                $(this).addClass("bg-danger")
                $(this).removeClass("bg-secondary")
                $(this).text("Hide All");
            }else{
                $(this).addClass("bg-secondary")
                $(this).removeClass("bg-danger")
                $(this).text("Show All");
            }

            let attr = $(this).attr("data-name");
            if(attr == "1"){
                $(this).attr("data-name", "0");
                $(".hide-show-name").val("0");

                $("span.badge.hide-show-btn").addClass("bg-danger")
                $("span.badge.hide-show-btn").removeClass("bg-success")
                $("span.badge.hide-show-btn").text("Hide Now");
            }else{
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

        $(document).on("input", "textarea", function () {
            $(this).css("height", "22px");
            $(this).css("height", this.scrollHeight + "px");
        });
    </script>
</body>
</html>