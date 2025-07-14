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
                        <div class="ckeditor-classic"></div>
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
    <script src="{{ url('assets/admin') }}/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            var $ckClassicEditor = $(".ckeditor-classic");
            if ($ckClassicEditor.length) {
                $ckClassicEditor.each(function () {
                    ClassicEditor.create(this)
                        .then(function (editor) {
                            editor.ui.view.editable.element.style.height = "200px";
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                });
            }
        });
    </script>
</body>
</html>