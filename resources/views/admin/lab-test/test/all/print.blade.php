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
    <div id="prescription" class="">
        <div class="prescription-header">
            <img src="{{ asset("assets\images\icons\prescription-header.png") }}" alt="">
        </div>

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
                    <input type="text" name="ref_dr" id="ref_dr" class="title">
                </div>
                <div class="box">
                    <strong>Date: </strong>
                    <input type="text" name="date" class="title" value="{{ date('Y-m-d') }}">
                </div>
            </div>

            {{-- wrapper  --}}
            <div class="details-test-report-wrapper">

                <div class="test-report-wrapper">
                    <textarea name="prescription_content" id="ckeditor-classic">@php echo  isset($prescription) ? $prescription->prescription_content : ""; @endphp</textarea>
                </div>

                <div class="details-content-wrapper" id="details-content-wrapper"> </div>
            </div>
        </div>

        <div class="prescription-footer">
            <img src="{{ asset("assets\images\icons\prescription-footer.png") }}" alt="">
        </div>
    </div>

    <div class="btn-wrapper">
        <button type="button" class="btn-preview">Preview</button>
        <button type="button" class="btn-print">Print</button>
        <button type="button" style="background: red"><a href="{{ route('admin.lab.test.all.index') }}" type="button" style="color: white">Back</a></button>
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

                // editor 
                var content = tinymce.get('ckeditor-classic').getContent();
                $(".test-report-wrapper").addClass("d-none");
                $("#details-content-wrapper").html(content);

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

                // editor 
                var content = tinymce.get('ckeditor-classic').getContent();
                $(".test-report-wrapper").addClass("d-none");
                $("#details-content-wrapper").html(content);

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


            // Initialize TinyMCE
            tinymce.init({
                selector: '#ckeditor-classic',
                plugins: 'table advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons',
                toolbar: 'table tablecopyrow tablepasteafter tablerowdelete | fileupload | blocks | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify',
                height: 1100,
                // Add the custom styles inside the TinyMCE iframe
                content_style: `
                    .d-none {
                        display: none !important;
                    }
                `,
                setup: function (editor) {
                    // Register the "Paste Row After" button
                    editor.ui.registry.addButton('tablepasteafter', {
                        icon: 'paste', // Built-in paste icon
                        tooltip: 'Paste Row After',
                        onAction: function () {
                            editor.execCommand('mceTablePasteRowAfter');
                        }
                    });

                    // Register the "Delete Table Row" button
                    editor.ui.registry.addButton('tablerowdelete', {
                        icon: 'remove', // Built-in remove icon
                        tooltip: 'Delete Table Row',
                        onAction: function () {
                            editor.execCommand('mceTableDeleteRow');
                        }
                    });
                    editor.on('init', function() {
                        // Attach change event to inputs inside the editor
                        editor.getBody().addEventListener('change', function (e) {
                            if (e.target.classList.contains('tinyMC_range')) {
                                let speed = e.target.value;
                                e.target.setAttribute('value', speed);
                            }
                        });
                    });
                    // Add a custom "File Upload" button
                    editor.ui.registry.addButton('fileupload', {
                        icon: 'upload', // Use the built-in "upload" icon
                        tooltip: 'Upload Image',
                        onAction: function () {
                            const input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');

                            input.onchange = function () {
                                const file = this.files[0];
                                const reader = new FileReader();

                                reader.onload = function () {
                                    const img = new Image();
                                    img.src = reader.result;

                                    img.onload = function () {
                                        // Resize the image to 100x100
                                        const canvas = document.createElement('canvas');
                                        canvas.width = 100;
                                        canvas.height = 100;
                                        const ctx = canvas.getContext('2d');
                                        ctx.drawImage(img, 0, 0, 100, 100);

                                        // Convert the canvas to a data URL and insert it into the editor
                                        const resizedImage = canvas.toDataURL('image/png');
                                        editor.insertContent(`<img src="${resizedImage}" alt="${file.name}" />`);
                                    };
                                };

                                reader.readAsDataURL(file);
                            };

                            input.click();
                        }
                    });
                }
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

                        $("#user_number").val(data.user.number != null ? data.user.number : "");
                        $("#address").val(data.user.address != null ? data.user.address : "");
                        $("#select_user").val(data.user.name != null ? data.user.name : "");
                        $("#select_user").html(`<option value='${data.user.name != null ? data.user.name : ""}'>${data.user.name != null ? data.user.name : ""}</option>`);
                        $("#select_user").selectpicker('destroy');
                        $("#select_user").selectpicker();
                    }
                });
            }

            changeDataByPets();
        });
        
    </script>
</body>
</html>