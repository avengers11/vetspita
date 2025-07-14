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
    <form action="{{ route('admin.lab.test.template.edit', $template) }}" method="post">
        @csrf 

        <div id="prescription" class="">
            <div class="prescription-header">
                <img src="{{ asset("assets\images\icons\prescription-header.png") }}" alt="">
            </div>

            <div class="prescription-body" style="width: 100%;">
                <div class="information-top" style="grid-template-columns: 100%">
                    <div class="box">
                        <strong>Template Name: </strong>
                        <input type="text" name="prescription_name" id="prescription_name" class="title" value="{{ $template->prescription_name }}" required>
                    </div>
                </div>
                {{-- wrapper  --}}
                <div class="details-test-report-wrapper">

                    <div class="test-report-wrapper">
                        <textarea name="prescription_content" id="ckeditor-classic">@php echo $template->prescription_content; @endphp</textarea>
                    </div>

                    <div class="details-content-wrapper" id="details-content-wrapper"> </div>
                </div>
            </div>

            <div class="prescription-footer">
                <img src="{{ asset("assets\images\icons\prescription-footer.png") }}" alt="">
            </div>
        </div>

        <div class="btn-wrapper">
            <button type="submit" class="btn-success">Submit</button>
            <button type="button" class="btn-print">Preview</button>
        </div>
    </form>


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
            $(".btn-print").click(function(){
                $("#prescription").addClass("print");
                $(".btn-wrapper, .btn-group").addClass("d-none");
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
                    $(".btn-wrapper, .btn-group").removeClass("d-none");

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
            
        });
    </script>
</body>
</html>