@extends('admin.layouts.master')

@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Owner Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Analytics</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row dashboard">
    <div class="col-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-semibold text-muted mb-0">Appointment</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $totalAppointment }}">{{ $totalAppointment }}</span></h2>
                                <p class="mb-0 text-muted">Total Appointment</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i class="ri-survey-fill text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-semibold text-muted mb-0">Surgery</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $surgeryItems }}">{{ $surgeryItems }}</span></h2>
                                <p class="mb-0 text-muted">Total Surgery</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i class="ri-medicine-bottle-line text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-semibold text-muted mb-0">Vaccine</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $vaccineItems }}">{{ $vaccineItems }}</span></h2>
                                <p class="mb-0 text-muted">Total Vaccine</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i class="ri-capsule-fill text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-semibold text-muted mb-0">Services</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $serviceItems }}">{{ $serviceItems }}</span></h2>
                                <p class="mb-0 text-muted">Total Services</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i class="ri-shopping-cart-fill text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-semibold text-muted mb-0">Invoice Test</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $testItems }}">{{ $testItems }}</span></h2>
                                <p class="mb-0 text-muted">Total Test</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i data-feather="users" class="text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-semibold text-muted mb-0">Patient</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $totalPatient }}">{{ $totalPatient }}</span></h2>
                                <p class="mb-0 text-muted">Total Patient</p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i data-feather="users" class="text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- patient  --}}
<div class="row dashboard d-none">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Register Patients</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <select name="" id="" class="form-control" onchange="registeredUsersGraph(this.value)">
                            <option value="1y" selected>This Year</option>
                            <option value="30d">This Month</option>
                            <option value="7d">Last 7 Days</option>
                            <option value="1d">Today's</option>
                        </select>
                    </div>
                </div>
            </div>
           
            <div class="card-body p-0 pb-2">
                <div>
                    <div id="all_patients_bar" data-colors='["--vz-primary", "--vz-light"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row dashboard">
    <div class="col-xl-4">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Balance Summary</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <select name="" id="" class="form-control" onchange="balanceChartGraph(this.value)">
                            <option value="all" selected>All</option>
                            <option value="1y">This Year</option>
                            <option value="30d">This Month</option>
                            <option value="7d">Last 7 Days</option>
                            <option value="1d">Today's</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div id="summaryPieChart" data-colors='["--vz-primary", "--vz-warning", "--vz-info"]' class="apex-charts" dir="ltr"></div>

                <div class="table-responsive mt-3">
                    <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                        <tbody class="border-0">
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Total Amount</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i class="ri-coin-fill"></i> <span class="balance-summary-total-amount"></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Total Cost</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i class="ri-coin-fill"></i> <span class="balance-summary-total-cost"></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-info me-2"></i>Total Income</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i class="ri-coin-fill"></i> <span class="balance-summary-total-profit"></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-xl-4 col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Export Google Sheet</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <select name="" id="" class="form-control" onchange="googleSheet(this.value)">
                            <option value="all" selected>All</option>
                            <option value="1y">This Year</option>
                            <option value="30d">This Month</option>
                            <option value="7d">Last 7 Days</option>
                            <option value="1d">Today's</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush border-dashed mb-0">
                    <li class="list-group-item px-0">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-xs">
                                <i class="ri-stack-fill" style="font-size: 22px"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">Invoice sheet</h6>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <a id="google_sheet_invoice" href="{{ route("admin.dashboard.excelInvoice") }}?date=all" class="mb-0 btn btn-success">Download</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-xl-4 col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">All Report</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive table-card mb-3">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 30%;">Total</th>
                                <th scope="col" style="width: 5%;" class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lapTest as $item)
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xapitalize">{{ $item->type }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $item->total_tests }}</div>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route("admin.dashboard.labReportEdit", $item->type) }}" class="btn btn-success btn-sm"><i class="ri-pencil-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>

@endsection

@push('js')
    <script>
        var registerChart = null;
        const registeredUsersGraph = (filter) => {
            $.ajax({
                url: "",
                method: "POST",
                headers: {
                    "X-CSRF-Token": "{{ csrf_token() }}"
                },
                data: {
                    "type": "registered",
                    "filter": filter
                },
                success: function(data) {
                    if (registerChart) {
                        registerChart.destroy();
                    }

                    var areaChartOptions = {
                        series: [{
                            name: 'Registered Users',
                            data: data.users_count
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: { show: false },
                            zoom: { enabled: false }
                        },
                        dataLabels: { enabled: false },
                        stroke: { curve: 'smooth' },
                        grid: { strokeDashArray: 2 },
                        xaxis: {
                            type: 'category',
                            categories: data.categories,
                            labels: {
                                style: { colors: '#9ca3af', fontSize: '11px' }
                            }
                        },
                        yaxis: {
                            labels: {
                                style: { colors: '#9ca3af', fontSize: '11px' }
                            }
                        },
                        tooltip: {
                            x: { format: 'dd/MM/yy' }
                        }
                    };

                    registerChart = new ApexCharts(document.querySelector("#all_patients_bar"), areaChartOptions);
                    registerChart.render();
                },
                error: function(xhr, status, error) {
                    console.error("Error loading chart data:", error);
                }
            });
        };
        registeredUsersGraph('1y');

        $("#all_patient_filter .dropdown-item").click(function(){
            let filter = $(this).attr("filter")
            registeredUsersGraph();
        });


        // circle chart  
        var summaryChart = null;
        const balanceChartGraph = (filter) => {
            $.ajax({
                url: "",
                method: "POST",
                headers: {
                    "X-CSRF-Token": "{{ csrf_token() }}"
                },
                data: {
                    "type": "income",
                    "filter": filter
                },
                success: function(data) {
                    let total = Number(data.total_amount == null ? 0 : data.total_amount);
                    let cost = Number(data.total_cost == null ? 0 : data.total_cost);
                    let profit = Number(data.total_profit == null ? 0 : data.total_profit);

                    // Check if summaryChart already exists and destroy it before creating a new one
                    if (typeof summaryChart !== 'undefined' && summaryChart instanceof ApexCharts) {
                        summaryChart.destroy();
                    }

                    // Create a new ApexCharts donut chart
                    summaryChart = new ApexCharts(document.querySelector("#summaryPieChart"), {
                        series: [total, cost, profit],
                        labels: ["Total Amount", "Total Cost", "Total Income"],
                        chart: {
                            type: "donut",
                            height: 219,
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: "76%",
                                },
                            },
                        },
                        colors: ['#3466c1', '#ffc84b', '#29badb'],
                        dataLabels: {
                            enabled: true,
                            formatter: function (val) {
                                return val.toFixed(2) + "%";
                            }
                        },
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val.toFixed(2);
                                }
                            }
                        }
                    });

                    // Render the chart
                    summaryChart.render();


                    // html tags 
                    $(".balance-summary-total-amount").text(total);
                    $(".balance-summary-total-cost").text(cost);
                    $(".balance-summary-total-profit").text(profit);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading chart data:", error);
                }
            });
        };
        balanceChartGraph('all');

        $("#all_patient_filter .dropdown-item").click(function(){
            let filter = $(this).attr("filter")
            balanceChartGraph();
        });

        // export sheet
        function googleSheet(filter){
            $("#google_sheet_invoice").attr("href", `/admin/excel-invoice?date=${filter}`);
        }
    </script>
@endpush