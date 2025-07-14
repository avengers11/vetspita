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
</head>

<body>
    <form  method="post">

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
                            <div class="prescription-body">
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
                                    <div class="box ">
                                        
                                    </div>
                                    <div class="box">
                                        <strong>Date: {{ $prescription->date }}</strong>
                                    </div>
                                </div>
                
                                {{-- wrapper  --}}
                                <div class="details-medicine-wrapper">
                                    <div class="details-wrapper">
                                        <span class="details-content">
                                            <div class="details-box" id="clinical-history">
                                                <h2 class="headline d-flex justify-content-between">
                                                    <span class="d-flex align-items-center justify-content-start">Clinical History: {{ $prescription->clinical_history }}</span>
                                                </h2>
                                                <p class="title d-flex gap-2">
                                                    Vaccination: {{ $prescription->vaccinated }}
                                                </p>
                                                <p class="title d-flex gap-2 d-none" id="vaccinated-date">
                                                    Vaccinated Date:  {{ $prescription->vaccinated_date }}
                                                </p>
                                                <p class="title d-flex gap-2">
                                                    Deworming:  {{ $prescription->deworming }}
                                                </p>
                                                <p class="title d-flex gap-2 d-none" id="deworming-date">
                                                    Deworming Date:  {{ $prescription->deworming_date }}
                                                </p>
                                            </div>
                                            <div class="details-box" id="clinical-findings">
                                                <h2 class="headline">Clinical Findings:</h2>
                                                <p class="title mb-0">{{ $prescription->clinical_findings }}</p>
                                            </div>
                                            <div class="details-box" id="diagnosis-content">
                                                <h2 class="headline">Diagnosis:</h2>
                                                <p class="title mb-0">{{ $prescription->diagnosis }}</p>
                                            </div>
                
                                            <div class="details-box" id="tests-suggestion">
                                                <h2 class="headline">Tests Suggestion:</h2>
                                                <p class="title mb-0">{{ $prescription->test_suggestions != "null" ? $prescription->test_suggestions : "" }}</p>
                                            </div>
                
                                            <div class="details-box" id="dr-advice">
                                                <h2 class="headline">Dr. Advice:</h2>
                                                <p class="title mb-0">{{ $prescription->advice }}</p>
                                            </div>
                                        </span>
                                    </div>
                
                                    <div class="medicine-wrapper">
                                        <i style="font-size: 30px;" class="fa-solid fa-prescription nav-icon mb-2"></i>
                                        <div class="medicine-history-dr-wrapper">
                                            <div class="medicine-history-wrapper" id="medicine-history-wrapper">
                                                @if (!empty($prescription->medicine_history) && json_decode($prescription->medicine_history, true) !== null)
                                                    @foreach (json_decode($prescription->medicine_history) as $item)
                                                        <div class="medicine">
                                                            <div class="top">
                                                                <div class="left">
                                                                    <strong class="headline">{{ $item->medicine_category }}</strong>
                                                                    <span class="title">{{ $item->medicine_name }}</span>
                                                                    <strong class="headline">{{ $item->medicine_scientfic_name }}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <span class="title">Sig : {{ $item->medicine_sig }} {{ $item->medicine_dosage }} {{ $item->medicine_route }} {{ $item->medicine_frequency }} {{ $item->medicine_duration }}</span>
                                                            </div>
                                                        
                                                            <div class="search-wrapper d-none"></div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
    </form>
</body>

</html>
