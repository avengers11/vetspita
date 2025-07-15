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
        table thead tr th:last-child {
            text-align: end;
            justify-items: end;
        }
        table tbody tr td:last-child {
            justify-items: end;
            text-align: end;
        }
        .prescription-body{
            display: flex;
            align-items: start;
            justify-content: space-between;
            flex-direction: column;
        }
        .prescription-body .attachment{
            display: flex;
            align-items: start;
            gap: 10px;
        }
        .prescription-body .attachment img{
            height: 100px
        }
        .borders{
            height: 15px;
            width: 80%;
            border: 1px solid black;
            border-radius: 15px;
            position: relative
        }
        .borders .bar{
            height: 14px;
            width: 1px;
            background: black;
            position: absolute;
            left: 50%;
            top: 0;
        }
        .borders .bar1{
            left: 25%;
        }
        .borders .bar2{
            left: 75%;
        }
        .borders .result{
            height: 14px;
            width: 5px;
            background: black;
            position: absolute;
            left: 50%;
            top: 0;
        }
    </style>
</head>
<body>
    <div id="prescription" class="">
        <div class="prescription-header">
            <img src="{{ asset("assets\images\icons\prescription-header.png") }}" alt="">
        </div>

        <div class="prescription-body">
            <div>
                <div class="information-top">
                    <div class="box patient-name">
                        <strong>Patient Name: {{ $prescription->pet_name }}</strong>
                    </div>
                    <div class="box">
                        <strong>Species: {{ $prescription->pet_species }}</strong>
                    </div>
                    <div class="box">
                        <strong>Weight: {{ $prescription->pet_weight }}</strong>
                    </div>
                
                    <div class="box parents-name">
                        <strong>Parent's Name: {{ $prescription->owner_name }}</strong>
                    </div>
                    <div class="box">
                        <strong>Age: {{ $prescription->pet_age }}</strong>
                    </div>
                    <div class="box">
                        <strong>Gender: {{ $prescription->pet_sex }}</strong>
                    </div>
                    <div class="box">
                        <strong>Contact No: {{ $prescription->owner_number }}</strong>
                    </div>
                    <div class="box">
                        <strong>Breed: {{ $prescription->pet_breed }}</strong>
                    </div>
                    <div class="box">
                        <strong>Patient ID: {{ $prescription->patient_id }}</strong>
                    </div>
                    <div class="box">
                        <strong>Address: {{ $prescription->address }}</strong>
                    </div>
                    <div class="box saved-prescriptions">
                        <strong>Referral Dr: {{ $prescription->ref_dr }}</strong>
                    </div>
                    <div class="box">
                        <strong>Date: </strong>
                        <input type="text" name="date" class="title" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                {{-- wrapper  --}}
                <div class="details-test-report-wrapper">
                    <div class="test-report-wrapper">
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Abbreviation</th>
                                    <th>Result</th>
                                    <th></th>
                                    <th>Ref Value</th>
                                    <th>Unit</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($prescription->prescription_content) as $index=>$content)
                                    @php
                                        $text = str_replace('\u2013', '–', trim($content->ref_value));

                                        $step = "";
                                        if (strpos($text, '<') !== false) {
                                            $text = str_replace('<', '', $text);
                                            $minRef = 0;
                                            $maxRef = trim($text);
                                            $step = 1;
                                        } elseif (strpos($text, '>') !== false) {
                                            $text = str_replace('>', '', $text);
                                            $minRef = trim($text);
                                            $maxRef = 100;
                                            $step = 2;
                                        } else {
                                            // Normal case with both min and max values
                                            $explode = explode('–', $text);
                                            $minRef = trim($explode[0]) ?? 0;
                                            $maxRef = trim($explode[1]) ?? 0;
                                            $step = 3;
                                        }
                                        $result = trim($content->ref_result);

                                        if ($result < $minRef) {
                                            $resultPosition = 21;
                                        } elseif ($result > $maxRef) {
                                            $resultPosition = 76;
                                        } else {
                                            $resultPosition = 25 + (($result - $minRef) / ($maxRef - $minRef)) * (75 - 25); 
                                        }
                                    @endphp         
                                    <tr>
                                        <td style="width: 20%">{{ $content->ref_abbreviation ?? "" }} </td>
                                        <td style="width: 15%">{{ $content->ref_result ?? "" }} == {{ $step }} == {{ $minRef }}</td>
                                        <td style="width: 10%">{{ $content->ref_comment ?? "" }}</td>
                                        <td style="width: 15%">{{ $content->ref_value ?? "" }}</td>
                                        <td style="width: 10%">{{ $content->ref_unit ?? "" }}</td>
                                        <td style="width: 40%">
                                            <div class="borders">
                                                <div class="bar bar1"></div>
                                                <div class="bar bar2"></div>
                                                <div class="result" style="left: {{ $resultPosition }}%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            {{-- <div class="attachment">
                @foreach (json_decode($prescription->attachment) as $attachment)
                    <img src="{{ Storage::url($attachment) }}" alt="">
                @endforeach
            </div> --}}
        </div>

        <div class="prescription-footer">
            <img src="{{ asset("assets\images\icons\prescription-footer.png") }}" alt="">
        </div>
    </div>

    <div class="btn-wrapper">
        <button type="button" class="btn-preview">Preview</button>
        <button type="button" class="btn-print">Print</button>
    </div>

    {{-- script  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <script src="{{asset('assets/admin/plugins/tinymce/tinymce.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            // btn-print
            $(".btn-preview").click(function(){
                $("#prescription").addClass("print");
                $(".btn-wrapper, .btn-group, .box.saved-prescriptions span, .box.saved-prescriptions strong").addClass("d-none");
                $("#details-content-wrapper").removeClass("d-none");

                // print
                window.print();

                // reset 
                setTimeout(() => {
                    $("#prescription").removeClass("print");
                    $(".btn-wrapper, .btn-group, .box.saved-prescriptions span, .box.saved-prescriptions strong").removeClass("d-none");

                    // editor 
                    $(".test-report-wrapper").removeClass("d-none");
                    $("#details-content-wrapper").addClass("d-none");
                }, 100);

            });
            $(".btn-print").click(function(){
                $("#prescription").addClass("print");
                $(".btn-wrapper, .btn-group, .box.saved-prescriptions span, .box.saved-prescriptions strong, .box.saved-prescriptions strong, #prescription .prescription-header img, #prescription .prescription-footer img").addClass("d-none");
                $("#details-content-wrapper").removeClass("d-none");

                // print
                window.print();

                // reset 
                setTimeout(() => {
                    $("#prescription").removeClass("print");
                    $(".btn-wrapper, .btn-group, .box.saved-prescriptions span, .box.saved-prescriptions strong, .box.saved-prescriptions strong, #prescription .prescription-header img, #prescription .prescription-footer img").removeClass("d-none");

                    // editor 
                    $(".test-report-wrapper").removeClass("d-none");
                    $("#details-content-wrapper").addClass("d-none");
                }, 100);

            });

            // select a user 
            $("#select_user").change(function() {
                let id = '{{ $prescription->patient_id }}';
                $("#user_number").val('');
                $("#address").val('');
                $("#all_pets").selectpicker('destroy');
                $("#all_pets").selectpicker();

                
                if (id == "") {
                    return;
                }
                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.lab-diognosis.biochemical.parentsInfo') }}",
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
                let id = '{{ $prescription->patient_id }}';
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
                    url: "{{ route('admin.lab-diognosis.biochemical.patientInfo') }}",
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

                        $("#user_number").val(data.user.number != null ? data.user.number : "");
                        $("#address").val(data.user.address != null ? data.user.address : "");
                        $("#select_user").val(data.user.name != null ? data.user.name : "");
                        $("#select_user").html(`<option value='${data.user.name != null ? data.user.name : ""}'>${data.user.name != null ? data.user.name : ""}</option>`);
                        $("#select_user").selectpicker('destroy');
                        $("#select_user").selectpicker();
                    }
                });
            }

            // changeDataByPets();
        });
        
    </script>
</body>
</html>