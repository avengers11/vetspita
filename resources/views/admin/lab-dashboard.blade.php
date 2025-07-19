@extends('admin.layouts.master')

@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Lab Technician Dashboard</h4>

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
                                <p class="fw-semibold text-muted mb-0">Total Reports</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $totalReportCount }}">{{ $totalReportCount }}</span></h2>
                                <p class="mb-0 text-muted">Total Reports</p>
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
                                <p class="fw-semibold text-muted mb-0">Today's Reports</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $todaysReportCount }}">{{ $todaysReportCount }}</span></h2>
                                <p class="mb-0 text-muted">Today's Reports</p>
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
                                <p class="fw-semibold text-muted mb-0">Pending Task</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $pendningTaskCount }}">{{ $pendningTaskCount }}</span></h2>
                                <p class="mb-0 text-muted">Pending Task</p>
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

<div class="row dashboard">
    <div class="col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">All Task</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive table-card mb-3">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">Patient ID</th>
                                <th scope="col">Test</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($allTasks as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a class="text-body fw-medium">
                                                <div class="d-flex flex-column">
                                                    {{ $item->patient_id }}
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap text-start">{{ $item->test->name ?? "" }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end -->

                <div class="mt-2 text-center">
                    <a href="{{ route("admin.lab.task.index") }}" class="text-muted text-decoration-underline">Show All</a>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Pendning Task</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive table-card mb-3">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">Patient ID</th>
                                <th scope="col">Test</th>
                                <th scope="col" style="width: 25%;" class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($allTasks as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a class="text-body fw-medium">
                                                <div class="d-flex flex-column">
                                                    {{ $item->patient_id }}
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap text-start">{{ $item->test->name ?? "" }}</div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap text-end">
                                            <a href="{{route('admin.lab.task.status', ["task" => $item, "status" => "success"])}}" class="btn btn-success btn-sm"><i class="ri-add-line label-icon align-middle rounded-pill"></i></a>
                                            <a href="{{route('admin.lab.task.status', ["task" => $item, "status" => "rejected"])}}" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end -->

                <div class="mt-2 text-center">
                    <a href="{{ route("admin.lab.task.index") }}" class="text-muted text-decoration-underline">Show All</a>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>

@endsection