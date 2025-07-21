<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <link rel="stylesheet" href="{{ asset("assets/css/test-report.css") }}?v=1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <style>
        .range-wrapper .bar1, .range-wrapper .bar2{
            display: none;
        }
        input.tinyMC_range {
            -webkit-appearance: none;
            width: 100%;
            height: 10px;
            background: #ddd; /* Background of the track */
            border-radius: 5px;
            outline: none;
        }

        /* Track (filled and unfilled parts) */
        input.tinyMC_range::-webkit-slider-runnable-track {
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: none;
        }

        /* Thumb (Circle) */
        input.tinyMC_range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #4CAF50; /* Circle color */
            border-radius: 50%;
            cursor: pointer;
            margin-top: -7px; /* Aligns thumb properly */
        }

        /* Firefox Support */
        input.tinyMC_range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #4CAF50;
            border-radius: 50%;
            cursor: pointer;
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
                                        <strong>Patient Name: {{ $testData->pet_name }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Species: {{ $testData->pet_species }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Weight: {{ $testData->pet_weight }}</strong>
                                    </div>
                
                                    <div class="box parents-name">
                                        <strong>Parent's Name: {{ $testData->owner_name }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Age: {{ $testData->pet_age }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Gender: {{ $testData->pet_sex }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Contact No: {{ $testData->owner_number }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Breed: {{ $testData->pet_breed }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Patient ID: {{ $testData->patient_id }}</strong>
                                    </div>
                                    <div class="box">
                                        <strong>Address: {{ $testData->address }}</strong>
                                    </div>
                                    <div class="box ">
                                        
                                    </div>
                                    <div class="box">
                                        <strong>Date: {{ $testData->date }}</strong>
                                    </div>
                                </div>
                                
                                @if ($testData->type === "Biochemical")
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
                                                    @foreach (json_decode($testData->prescription_content) as $index=>$content)
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
                                                            <td style="width: 15%">{{ $content->ref_result ?? "" }}</td>
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
                                @elseif($testData->type === "CBC")
                                    {{-- wrapper  --}}
                                    <div class="details-test-report-wrapper">
                                        <div class="test-report-wrapper">
                                            <div class="header-title">
                                                <h2>HEAMATOLOGY REPORT</h2>
                                            </div>
                                            <table style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>Test Name</th>
                                                        <th>Result</th>
                                                        <th></th>
                                                        <th>Ref Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (json_decode($testData->prescription_content) as $index=>$content)
                                                        <tr>
                                                            <td style="width: 50%">{{ $content->ref_parameter ?? "" }} </td>
                                                            <td style="width: 20%">{{ $content->ref_result ?? "" }}</td>
                                                            <td style="width: 10%">{{ $content->ref_unit ?? "" }}</td>
                                                            <td style="width: 20%">{{ $content->ref_value ?? "" }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    {{-- wrapper  --}}
                                    <div class="test-report-wrapper">
                                        {!! $testData->prescription_content !!}
                                    </div>
                                @endif
                                

                                
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
