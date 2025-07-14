@extends('admin.layouts.master')

@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Doctor Dashboard</h4>

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
                                <p class="fw-semibold text-muted mb-0">Total Patient</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $totalPatientCount }}">{{ $totalPatientCount }}</span></h2>
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
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-semibold text-muted mb-0">Today's Patient</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $todayPatientsCount }}">{{ $todayPatientsCount }}</span></h2>
                                <p class="mb-0 text-muted">Today's Patient</p>
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
                                <p class="fw-semibold text-muted mb-0">Total Appoinment</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $totalAppointmentCount }}">{{ $totalAppointmentCount }}</span></h2>
                                <p class="mb-0 text-muted">Total Appoinment</p>
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
                <h4 class="card-title mb-0 flex-grow-1">My Today's Appoinment</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive table-card mb-3">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">Patient</th>
                                <th scope="col" style="width: 25%;" class="text-end">Date Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($todaysAppointment as $item)
                                <tr>
                                    <td>
                                        <a class="text-body fw-medium"><small>{{ $item->pet->unique_id }}</small></a>
                                        <br>
                                        <a class="text-body fw-medium">{{ $item->pet->name }}</a>
                                    </td>
                                    <td>
                                        <div class="text-nowrap text-end">{{ \Carbon\Carbon::parse($item->date_time)->format('d M, y \a\t g:i A') }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end -->

                <div class="mt-2 text-center">
                    <a href="" class="text-muted text-decoration-underline">Show All</a>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">My Next Appoinment Details</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                @if (!empty($nextAppointment))
                    <div class="w-100">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-1">{{ $nextAppointment->pet->name }}</h5>
                                <p class="text-muted mb-0">ID: {{ $nextAppointment->pet->unique_id }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <p class="fs-12 text-muted mb-1">Species</p>
                                <h4 class="fs-14 ff-secondary fw-semibold mb-0">{{ $nextAppointment->pet->species }}</h4>
                            </div>

                            <div>
                                <p class="fs-12 text-muted mb-1">Weight</p>
                                <h4 class="fs-14 ff-secondary fw-semibold mb-0">{{ $nextAppointment->pet->weight }} KG</h4>
                            </div>

                            <div>
                                <p class="fs-12 text-muted mb-1">Age</p>
                                <h4 class="fs-14 ff-secondary fw-semibold mb-0">{{ $nextAppointment->pet->age }}</h4>
                            </div>
                        </div>

                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <p class="fs-12 text-muted mb-1">Gender</p>
                                <h4 class="fs-14 ff-secondary fw-semibold mb-0">{{ $nextAppointment->pet->sex }}</h4>
                            </div>

                            <div>
                                <p class="fs-12 text-muted mb-1">Breed</p>
                                <h4 class="fs-14 ff-secondary fw-semibold mb-0">{{ $nextAppointment->pet->breed }}</h4>
                            </div>
                        </div>

                        <div class="row mt-4 pt-2">
                            <div class="col">
                                <a href="{{route('admin.appointment.status', ["appointment" => $nextAppointment->id, "status" => "accept"])}}" class="btn btn-success w-100">Accept</a>
                            </div>
                            <div class="col">
                                <a href="{{route('admin.appointment.status', ["appointment" => $nextAppointment->id, "status" => "unauthorize"])}}" class="btn btn-danger w-100">Reject</a>
                            </div>
                        </div>
                    </div>
                @else
                    <h5 class="text-center">No Appoinment Found!</h5>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection