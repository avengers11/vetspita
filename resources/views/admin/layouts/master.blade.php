<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
    <head>
        <meta charset="utf-8" />
        <title>Admin | {{ getSettings('title') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{Storage::url(getSettings('favicon'))}}" />
        <link href="{{ url('assets/admin') }}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("assets/admin/css/bootstrap5-select.css") }}">
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

        <!-- Js -->
        <script src="{{ url('assets/admin') }}/js/layout.js"></script>
        <link href="{{ url('assets/admin') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin') }}/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/admin') }}/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('/assets/admin2/') }}/plugins/summernote/summernote-bs4.min.css" />

        <!--datatable css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    </head>

    <body>
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="layout-width">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box horizontal-logo">
                                <a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="{{Storage::url(getSettings('favicon'))}}" alt="" height="22" />
                                    </span>
                                    <span class="logo-lg">
                                        <img src="{{Storage::url(getSettings('favicon'))}}" alt="" height="17" />
                                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="{{Storage::url(getSettings('favicon'))}}" alt="" height="22" />
                                    </span>
                                    <span class="logo-lg">
                                        <img src="{{Storage::url(getSettings('favicon'))}}" alt="" height="17" />
                                    </span>
                                </a>
                            </div>

                            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                                <span class="hamburger-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>

                            <!-- App Search-->
                            <form class="app-search d-none d-md-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="" />
                                    <span class="mdi mdi-magnify search-widget-icon"></span>
                                    <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                    <div data-simplebar style="max-height: 320px;">
                                        <!-- item-->
                                        <div class="dropdown-header">
                                            <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                        </div>

                                        <div class="dropdown-item bg-transparent text-wrap">
                                            <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                            <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                                        </div>
                                        <!-- item-->
                                        <div class="dropdown-header mt-2">
                                            <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                            <span>Analytics Dashboard</span>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                            <span>Help Center</span>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                            <span>My account settings</span>
                                        </a>

                                        <!-- item-->
                                        <div class="dropdown-header mt-2">
                                            <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                        </div>

                                        <div class="notification-list">
                                            <!-- item -->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                                <div class="d-flex">
                                                    <img src="{{ url('assets/admin') }}/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                    <div class="flex-grow-1">
                                                        <h6 class="m-0">Angela Bernier</h6>
                                                        <span class="fs-11 mb-0 text-muted">Manager</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- item -->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                                <div class="d-flex">
                                                    <img src="{{ url('assets/admin') }}/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                    <div class="flex-grow-1">
                                                        <h6 class="m-0">David Grasso</h6>
                                                        <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- item -->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                                <div class="d-flex">
                                                    <img src="{{ url('assets/admin') }}/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic" />
                                                    <div class="flex-grow-1">
                                                        <h6 class="m-0">Mike Bunch</h6>
                                                        <span class="fs-11 mb-0 text-muted">React Developer</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-center pt-3 pb-1">
                                        <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="dropdown d-md-none topbar-head-dropdown header-item">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-search fs-22"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username" />
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="ms-1 header-item d-none d-sm-flex">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                    <i class="bx bx-fullscreen fs-22"></i>
                                </button>
                            </div>

                            <div class="ms-1 header-item d-none d-sm-flex">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                    <i class="bx bx-moon fs-22"></i>
                                </button>
                            </div>

                            <div class="dropdown ms-sm-3 header-item topbar-user">
                                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle header-profile-user" src="{{ Storage::url(auth()->user()->image) }}" alt="Header Avatar" />
                                        <span class="text-start ms-xl-2">
                                            <span class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">{{ auth()->user()->name }}</span>
                                            <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ auth()->user()->role }}</span>
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <h6 class="dropdown-header">Welcome {{ auth()->user()->name }}!</h6>
                                    {{-- <a class="dropdown-item" href=""><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a> --}}
                                    <div class="dropdown-divider"></div>

                                    @if (auth()->user()->hasRole("Doctor"))
                                        <a class="dropdown-item" href="{{ route("admin.dashboard.doctorStatus") }}">
                                            <i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Status : @if(auth()->user()->doctor_status == 1)<span href="" class="badge bg-danger">Busy</span> @else <span href="" class="badge bg-success">Active</span> @endif</span>
                                        </a>
                                    @endif
                                   
                                    <a class="dropdown-item" href="{{ route("admin.logout") }}"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- removeNotificationModal -->
            <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#495057,secondary:#f06548" style="width: 100px; height: 100px;"></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4 class="fw-bold">Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            
            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img style="width: 100px; height: auto;" src="{{Storage::url(getSettings('favicon'))}}" alt="" height="22" />
                        </span>
                        <span class="logo-lg">
                            <img style="width: 100px; height: auto;" src="{{Storage::url(getSettings('favicon'))}}" alt="" height="17" />
                        </span>
                    </a>
                    <!-- Light Logo-->
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img style="width: 100px; height: auto;" src="{{Storage::url(getSettings('favicon'))}}" alt="" height="22" />
                        </span>
                        <span class="logo-lg">
                            <img style="width: 100px; height: auto;" src="{{Storage::url(getSettings('favicon'))}}" alt="" height="17" />
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

                <div id="scrollbar">
                    <div class="container-fluid">
                        <div id="two-column-menu"></div>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                            
                            @canany(['Onwer Dashboard', 'Doctor Dashboard', 'Lab Technician Dashboard', 'Receptionist Dashboard', 'Manager Dashboard'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link @if(Route::is('admin.dashboard.index')) active @endif" href="{{ route('admin.dashboard.index') }}" aria-expanded="false">
                                        <i class="ri-pie-chart-2-fill"></i> <span data-key="t-widgets">Dashboard</span>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['Invoice View', 'Invoice Service View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarInvoice" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoice">
                                        <i class="ri-stack-fill"></i> <span data-key="t-dashboards">Invoice</span>
                                    </a>
                                    <div class="collapse menu-dropdown @if(Route::is('admin.invoice*')) show @endif" id="sidebarInvoice">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Invoice View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.invoice.index') }}" class="nav-link @if(Route::is('admin.invoice.index')) active @endif">  Invoice </a>
                                                </li>
                                            @endcan

                                            @can('Invoice Cost')
                                                <li class="nav-item d-none">
                                                    <a href="{{ route('admin.invoice.transaction.index') }}" class="nav-link @if(Route::is('admin.invoice.transaction.index')) active @endif">  Invoice Transaction </a>
                                                </li>
                                            @endcan

                                            <hr>

                                            @can('Invoice Equipment View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.invoice.equipment.index', ["type" => "product"]) }}" class="nav-link @if(Request::is('admin/invoice/equipment/product*')) active @endif">Product</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ route('admin.invoice.equipment.index', ["type" => "service"]) }}" class="nav-link @if(Request::is('admin/invoice/equipment/service*')) active @endif">Service</a>
                                                </li>

                                                {{-- <li class="nav-item">
                                                    <a href="{{ route('admin.invoice.equipment.index', ["type" => "category"]) }}" class="nav-link @if(Request::is('admin/invoice/equipment/category*')) active @endif">Category</a>
                                                </li> --}}

                                                <li class="nav-item">
                                                    <a href="{{ route('admin.invoice.equipment.index', ["type" => "surgery"]) }}" class="nav-link @if(Request::is('admin/invoice/equipment/surgery*')) active @endif">Surgery</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ route('admin.invoice.equipment.index', ["type" => "vaccine"]) }}" class="nav-link @if(Request::is('admin/invoice/equipment/vaccine*')) active @endif">Vaccine</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ route('admin.invoice.equipment.index', ["type" => "test"]) }}" class="nav-link @if(Request::is('admin/invoice/equipment/test*')) active @endif">Invoice Test</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany

                            @can(['Appointment View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#appointmentSidebar" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="appointmentSidebar">
                                        <i class="ri-app-store-line"></i> <span data-key="t-dashboards">Appointment</span>
                                    </a>
                                    <div class="collapse menu-dropdown @if(Route::is('admin.appointment.*')) show @endif" id="appointmentSidebar">
                                        <ul class="nav nav-sm flex-column">
                                            @can(['Appointment Authorized'])
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.appointment.unauthorized') }}" class="nav-link @if(Route::is('admin.appointment.unauthorized')) active @endif">  Unauthorized </a>
                                                </li>
                                            @endcan
                
                                            <li class="nav-item">
                                                <a href="{{ route('admin.appointment.index') }}" class="nav-link @if(Route::is('admin.appointment.index')) active @endif">  Authorized </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcan

                            {{-- Prescriptions  --}}
                            @canany(['Prescription View', 'Saved Prescription View', 'Medicine View', 'Medicine Category View', 'Medicine Route View', 'Medicine Frequency View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarPrescriptions" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarPrescriptions">
                                        <i class="ri-nurse-fill"></i> <span data-key="t-multi-level">Prescriptions</span>
                                    </a>
                                    <div class="menu-dropdown collapse @if(Route::is('admin.prescription.*') || Route::is('admin.medicine.*')) show @endif collapse menu-dropdown" id="sidebarPrescriptions">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Prescription View')
                                                <li class="nav-item">
                                                    <a href="{{ route("admin.prescription.index", ['type' => "normal"]) }}" class="nav-link">All Prescriptions</a>
                                                </li>
                                            @endcan

                                            @can('Saved Prescription View')
                                                <li class="nav-item">
                                                    <a href="{{ route("admin.prescription.index", ['type' => "saved"]) }}" class="nav-link">Saved Prescriptions</a>
                                                </li>
                                            @endcan

                                            @canany(['Medicine View', 'Medicine Category View', 'Medicine Route View', 'Medicine Frequency View'])
                                                <li class="nav-item">
                                                    <a href="#medicineAll" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="medicineAll" data-key="t-level-1.2"> All Medicine </a>
                                                    <div class="menu-dropdown collapse @if(Route::is('admin.medicine.*')) show @endif" id="medicineAll">
                                                        <ul class="nav nav-sm flex-column">
                                                            @can('Medicine View')
                                                                <li class="nav-item">
                                                                    <a href="{{ route('admin.medicine.index') }}" class="nav-link @if(Route::is('admin.medicine.index')) active @endif" >Medicine</a>
                                                                </li>
                                                            @endcan

                                                            @can('Medicine Category View')
                                                                <li class="nav-item">
                                                                    <a href="{{ route('admin.medicine.category.index') }}" class="nav-link @if(Route::is('admin.medicine.category.*')) active @endif" >Categories</a>
                                                                </li>
                                                            @endcan

                                                            @can('Medicine Route View')
                                                                <li class="nav-item">
                                                                    <a href="{{ route('admin.medicine.route.index') }}" class="nav-link @if(Route::is('admin.medicine.route.*')) active @endif" >Route</a>
                                                                </li>
                                                            @endcan

                                                            @can('Medicine Frequency View')
                                                                <li class="nav-item">
                                                                    <a href="{{ route('admin.medicine.frequency.index') }}" class="nav-link @if(Route::is('admin.medicine.frequency.*')) active @endif" >Frequency</a>
                                                                </li>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcanany

                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            
                            {{-- Test --}}
                            @can('Test View')
                                <li class="nav-item">
                                    <a class="nav-link menu-link @if(Route::is('admin.test.*')) active @endif" href="{{ route('admin.test.index') }}" aria-expanded="false">
                                        <i class="ri-file-list-3-line"></i> <span data-key="t-widgets">Prescription Test</span>
                                    </a>
                                </li>
                            @endcan

                            {{-- Lab Task --}}
                            @can('Lab Task View')
                                <li class="nav-item">
                                    <a class="nav-link menu-link @if(Route::is('admin.lab.task.*')) active @endif" href="{{ route('admin.lab.task.index') }}" aria-expanded="false">
                                        <i class="ri-list-check-3"></i> <span data-key="t-widgets">Lab Task</span>
                                    </a>
                                </li>
                            @endcan

                            {{-- Lab Test --}}
                            @canany(['Lap Diognosis View', 'Lap Diognosis Template View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarLabTest" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLabTest">
                                        <i class="ri-hospital-fill"></i>
                                        <span data-key="t-Test">Lab Diognosis</span>
                                    </a>
                                    <div class="collapse @if(Route::is('admin.lab.test.*')) show @endif menu-dropdown" id="sidebarLabTest">
                                        <ul class="nav nav-sm flex-column">
                                            {{-- <li class="nav-item">
                                                <a href="{{ route('admin.lab-diognosis.biochemical.index') }}" class="nav-link @if(Route::is('admin.lab-diognosis.biochemical.*')) active @endif">Biochemical</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin.lab-diognosis.cbc.index') }}" class="nav-link @if(Route::is('admin.lab-diognosis.cbc.*')) active @endif">CBC</a>
                                            </li> --}}

                                            @can('Lap Diognosis View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.lab.test.all.index') }}" class="nav-link @if(Route::is('admin.lab.test.all.index')) active @endif">All Test Reports</a>
                                                </li>
                                            @endcan

                                            @can('Lap Diognosis Template View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.lab.test.template.index') }}" class="nav-link @if(Route::is('admin.lab.test.template.*')) active @endif">Create Report Template</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany

                            {{-- Client Registration --}}
                            @canany(['Client Registration', 'Patient View', 'Patient Species View', 'Parents View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarPatient" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarPatient">
                                        <i class="ri-nurse-fill"></i> <span data-key="t-multi-level">Client Registration</span>
                                    </a>
                                    <div class="menu-dropdown collapse @if(Route::is('admin.pet.*') || Route::is('admin.patient.*')) show @endif" id="sidebarPatient">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Client Registration')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.pet.registration') }}" class="nav-link @if(Route::is('admin.pet.registration')) active @endif" >Registration</a>
                                                </li>
                                            @endcan
                                            
                                            @canany(['Patient View', 'Patient Species View'])
                                                <li class="nav-item">
                                                    <a href="#sidebarPatientAll" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPatientAll" data-key="t-level-1.2"> Animals </a>
                                                    <div class="menu-dropdown collapse @if(Route::is('admin.pet.index')) show @endif" id="sidebarPatientAll">
                                                        <ul class="nav nav-sm flex-column">
                                                            @can('Patient View')
                                                                <li class="nav-item">
                                                                    <a href="{{ route('admin.pet.index') }}" class="nav-link" >All Animals</a>
                                                                </li>
                                                            @endcan

                                                            @can('Patient Species View')
                                                                <li class="nav-item">
                                                                    <a href="{{ route('admin.pet.species.index') }}" class="nav-link" >Animal Species</a>
                                                                </li>
                                                            @endcan
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcanany

                                            @can('Parents View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.patient.index') }}" class="nav-link" >All Clients</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            

                            {{-- UserRole  --}}
                            @canany(['User Role View', 'User View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarUserRole" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarUserRole">
                                        <i class="ri-group-fill"></i> <span data-key="t-multi-level">User Role</span>
                                    </a>
                                    <div class="menu-dropdown collapse @if(Route::is('admin.role*') || Route::is('admin.user*')) show @endif collapse menu-dropdown" id="sidebarUserRole">
                                        <ul class="nav nav-sm flex-column">
                                            @can('User Role View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.role.index') }}" class="nav-link @if(Route::is('admin.role.*')) active @endif">Role</a>
                                                </li>
                                            @endcan

                                            @can('User View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.user.index') }}" class="nav-link @if(Route::is('admin.user.*')) active @endif">User</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany

                            <li>
                                <hr>
                            </li>
                            <!-- Website  -->
                            @canany(['Product View', 'Package View', 'Plan View', 'Product Category View', 'Review View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                        <i class="ri-product-hunt-fill"></i> <span data-key="t-Products">Products</span>
                                    </a>
                                    <div class="collapse menu-dropdown @if(Route::is('admin.product.list*') || Route::is('admin.product.package*') || Route::is('admin.product.plan*') || Route::is('admin.product.category*') || Route::is('admin.product.review*')) show @endif" id="sidebarProducts">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Product View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.product.list.index') }}" class="nav-link @if(Route::is('admin.product.list.index')) active @endif">Products Lists</a>
                                                </li>
                                            @endcan

                                            @can('Package View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.product.package.index') }}" class="nav-link @if(Route::is('admin.product.package.index')) active @endif"> Packages</a>
                                                </li>
                                            @endcan

                                            @can('Plan View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.product.plan.index') }}" class="nav-link  @if(Route::is('admin.product.plan.index')) active @endif"> Plans</a>
                                                </li>
                                            @endcan

                                            @can('Product Category View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.product.category.index') }}" class="nav-link @if(Route::is('admin.product.category.index')) active @endif"> Categories</a>
                                                </li>
                                            @endcan

                                            @can('Review View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.product.review.index') }}" class="nav-link @if(Route::is('admin.product.review.index')) active @endif"> Review</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            
                            @can('Order View')
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                        <i class="ri-store-fill"></i> <span data-key="t-Orders">Orders</span>
                                    </a>
                                    <div class="collapse menu-dropdown @if(Route::is('admin.product.order*')) show @endif" id="sidebarOrders">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.product.order.pending') }}" class="nav-link @if(Route::is('admin.product.order.pending')) active @endif">Pending Orders</a>
                                                <a href="{{ route('admin.product.order.success') }}" class="nav-link @if(Route::is('admin.product.order.success')) active @endif">Success Orders</a>
                                                <a href="{{ route('admin.product.order.rejected') }}" class="nav-link @if(Route::is('admin.product.order.rejected')) active @endif">Rejected Orders</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcan
                            
                            @canany(['Service View', 'Service Category View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarServices" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarServices">
                                        <i class="ri-shopping-cart-fill"></i> <span data-key="t-dashboards">Service</span>
                                    </a>
                                    <div class="collapse menu-dropdown @if(Route::is('admin.service*')) show @endif" id="sidebarServices">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Service View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.service.index') }}" class="nav-link @if(Route::is('admin.service.*')) active @endif">  Service </a>
                                                </li>
                                            @endcan
                                            @can('Service Category View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.serviceCategory.index') }}" class="nav-link @if(Route::is('admin.serviceCategory.*')) active @endif">  Service Category </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany


                            @canany(['Blog View', 'Blog Category View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarBlogs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBlogs">
                                        <svg  style="height: 28px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19.8224 9.72867H18.729C18.1402 9.72867 17.6355 9.22399 17.6355 8.63521C17.6355 5.52306 15.1121 2.99969 12 2.99969H8.63551C5.52336 2.99969 3 5.52306 3 8.63521V15.3642C3 18.4763 5.52336 20.9997 8.63551 20.9997H15.3645C18.4766 20.9997 21 18.4763 21 15.3642V10.9062C21 10.2333 20.4953 9.72867 19.8224 9.72867ZM8.5514 7.54175H12.5888C13.1776 7.54175 13.6822 8.04642 13.6822 8.63521C13.6822 9.22399 13.1776 9.72867 12.5888 9.72867H8.5514C7.96262 9.72867 7.45794 9.22399 7.45794 8.63521C7.45794 8.04642 7.96262 7.54175 8.5514 7.54175ZM15.4486 16.4576H8.63551C8.04673 16.4576 7.54206 15.953 7.54206 15.3642C7.54206 14.7754 8.04673 14.2707 8.63551 14.2707H15.4486C16.0374 14.2707 16.5421 14.7754 16.5421 15.3642C16.5421 15.953 16.0374 16.4576 15.4486 16.4576Z"></path></svg>
                                        <span data-key="t-Blogs">Blogs</span>
                                    </a>
                                    <div class="collapse menu-dropdown @if(Route::is('admin.post*')) show @endif" id="sidebarBlogs">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Blog View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.post.index') }}" class="nav-link @if(Route::is('admin.post.index')) active @endif">Blog Posts</a>
                                                </li>
                                            @endcan

                                            @can('Blog Category View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.post.category.index') }}" class="nav-link @if(Route::is('admin.post.category.index')) active @endif">Blog Category </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            
                            @can('Consultant View')
                                <li class="nav-item">
                                    <a class="nav-link menu-link @if(Route::is('admin.consultant.*')) active @endif" href="{{ route('admin.consultant.index') }}" aria-expanded="false">
                                        <i class="ri-pie-chart-2-fill"></i> <span data-key="t-widgets">Consultants</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Gallery View')
                                <li class="nav-item">
                                    <a class="nav-link menu-link @if(Route::is('admin.gallery.*')) active @endif" href="{{ route('admin.gallery.index') }}" aria-expanded="false">
                                        <i class="ri-pie-chart-2-fill"></i> <span data-key="t-widgets">Gallery</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Slider View')
                                <li class="nav-item">
                                    <a class="nav-link menu-link @if(Route::is('admin.slider.*')) active @endif" href="{{ route('admin.slider.index') }}" aria-expanded="false">
                                        <i class="ri-equalizer-fill"></i> <span data-key="t-widgets">Slider</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Career View')
                                <li class="nav-item">
                                    <a class="nav-link menu-link @if(Route::is('admin.career.*')) active @endif" href="{{ route('admin.career.index') }}" aria-expanded="false">
                                        <i class="ri-file-list-3-line"></i> <span data-key="t-widgets">Career</span>
                                    </a>
                                </li>
                            @endcan

                            {{-- general settings   --}}
                            @canany(['General View', 'Branch View'])
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#sidebarSettings" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarSettings">
                                        <i class="ri-tools-fill"></i> <span data-key="t-multi-level">Settings</span>
                                    </a>
                                    <div class="menu-dropdown collapse @if(Route::is('admin.general*') || Route::is('admin.branch*')) show @endif collapse menu-dropdown" id="sidebarSettings">
                                        <ul class="nav nav-sm flex-column">
                                            @can('Branch View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.general.index') }}" class="nav-link @if(Route::is('admin.general.*')) active @endif">General</a>
                                                </li>
                                            @endcan
                                            
                                            @can('General View')
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.branch.index') }}" class="nav-link @if(Route::is('admin.branch.*')) active @endif">Branch</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endcanany

                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>

                <div class="sidebar-background"></div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('master')

                        @if (session()->has('status'))
                            @if (session()->get('status'))
                                <!-- Success Alert -->
                                <div class="alert toastr alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                    <i class="ri-notification-off-line label-icon"></i><strong> {{ session()->get('msg') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
                                </div>
                            @else
                                <!-- Danger Alert -->
                                <div class="alert toastr alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                    <i class="ri-error-warning-line label-icon"></i><strong> {{ session()->get('msg') }} </strong>
                                    <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
                                </div>
                            @endif
                        @endif


                        
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class="mdi mdi-spin mdi-cog-outline fs-22"></i>
            </div>
        </div>

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
                <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="p-4">
                        <h6 class="mb-0 fw-bold text-uppercase">Layout</h6>
                        <p class="text-muted">Choose your layout</p>

                        <div class="row gy-3">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input" />
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Vertical</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input" />
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                        <span class="d-flex h-100 flex-column gap-1">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                                <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                            </span>
                                            <span class="bg-light d-block p-1"></span>
                                            <span class="bg-light d-block p-1 mt-auto"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn" class="form-check-input" />
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Two Column</h5>
                            </div>
                            <!-- end col -->

                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout04" name="data-layout" type="radio" value="semibox" class="form-check-input" />
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout04">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0 p-1">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column pt-1 pe-2">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Semi Box</h5>
                            </div>
                            <!-- end col -->
                        </div>

                        <h6 class="mt-4 mb-0 fw-bold text-uppercase">Color Scheme</h6>
                        <p class="text-muted">Choose Light or Dark Scheme.</p>

                        <div class="colorscheme-cardradio">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-mode-light" value="light" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check card-radio dark">
                                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-mode-dark" value="dark" />
                                        <label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-white bg-opacity-10 d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-white bg-opacity-10 d-block p-1"></span>
                                                        <span class="bg-white bg-opacity-10 d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-visibility">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Sidebar Visibility</h6>
                            <p class="text-muted">Choose show or Hidden sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-visibility" id="sidebar-visibility-show" value="show" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-visibility-show">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0 p-1">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column pt-1 pe-2">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Show</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-visibility" id="sidebar-visibility-hidden" value="hidden" />
                                        <label class="form-check-label p-0 avatar-md w-100 px-2" for="sidebar-visibility-hidden">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column pt-1 px-2">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Hidden</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Layout Width</h6>
                            <p class="text-muted">Choose Fluid or Boxed layout.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-fluid" value="fluid" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Fluid</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-boxed" value="boxed" />
                                        <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
                                            <span class="d-flex gap-1 h-100 border-start border-end">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Layout Position</h6>
                            <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>

                            <div class="btn-group radio" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed" />
                                <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable" />
                                <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                        <h6 class="mt-4 mb-0 fw-bold text-uppercase">Topbar Color</h6>
                        <p class="text-muted">Choose Light or Dark Topbar Color.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light" value="light" />
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark" value="dark" />
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-primary d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Sidebar Size</h6>
                            <p class="text-muted">Choose a size of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-default" value="lg" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-compact" value="md" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small" value="sm" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small-hover" value="sm-hover" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small-hover">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-view">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Sidebar View</h6>
                            <p class="text-muted">Choose Default or Detached Sidebar view.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-default" value="default" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-detached" value="detached" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                    <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                                </span>
                                                <span class="d-flex gap-1 h-100 p-1 px-2">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                            <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Detached</h5>
                                </div>
                            </div>
                        </div>
                        <div id="sidebar-color">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Sidebar Color</h6>
                            <p class="text-muted">Choose a color of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-light" value="light" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-dark" value="dark" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                                <div class="col-4">
                                    <button
                                        class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseBgGradient"
                                        aria-expanded="false"
                                        aria-controls="collapseBgGradient"
                                    >
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </button>
                                    <h5 class="fs-13 text-center mt-2">Gradient</h5>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="collapse" id="collapseBgGradient">
                                <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient" value="gradient" />
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-2" value="gradient-2" />
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-2">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-3" value="gradient-3" />
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-3">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-4" value="gradient-4" />
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-4">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-img">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Sidebar Images</h6>
                            <p class="text-muted">Choose a image of Sidebar.</p>

                            <div class="d-flex gap-2 flex-wrap img-switch">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-none" value="none" />
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                                        <span class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                            <i class="ri-close-fill fs-20"></i>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-01" value="img-1" />
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                                        <img src="{{ url('assets/admin') }}/images/sidebar/img-1.jpg" alt="" class="avatar-md w-auto object-fit-cover" />
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-02" value="img-2" />
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                                        <img src="{{ url('assets/admin') }}/images/sidebar/img-2.jpg" alt="" class="avatar-md w-auto object-fit-cover" />
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-03" value="img-3" />
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                                        <img src="{{ url('assets/admin') }}/images/sidebar/img-3.jpg" alt="" class="avatar-md w-auto object-fit-cover" />
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-04" value="img-4" />
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                                        <img src="{{ url('assets/admin') }}/images/sidebar/img-4.jpg" alt="" class="avatar-md w-auto object-fit-cover" />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="preloader-menu">
                            <h6 class="mt-4 mb-0 fw-bold text-uppercase">Preloader</h6>
                            <p class="text-muted">Choose a preloader.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-custom" value="enable" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-custom">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <!-- <div id="preloader"> -->
                                            <div id="status" class="d-flex align-items-center justify-content-center">
                                                <div class="spinner-border text-primary avatar-xxs m-auto" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                            <!-- </div> -->
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Enable</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-none" value="disable" />
                                        <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-none">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Disable</h5>
                                </div>
                            </div>
                        </div>
                        <!-- end preloader-menu -->
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ url('assets/admin') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('assets/admin') }}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ url('assets/admin') }}/libs/node-waves/waves.min.js"></script>
        <script src="{{ url('assets/admin') }}/libs/feather-icons/feather.min.js"></script>
        <script src="{{ url('assets/admin') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="{{ url('assets/admin') }}/js/plugins.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
        {{-- <script src="{{ url('assets/admin') }}/js/pages/select2.init.js"></script> --}}
        <script src="{{ asset("assets/admin/js/bootstrap-select.js") }}"></script>
        <script src="{{ url('assets/admin') }}/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
        <script src="{{ url('assets/admin') }}//js/pages/form-editor.init.js"></script>

        <!-- apexcharts -->
        <script src="{{ url('assets/admin') }}/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="{{ url('assets/admin') }}/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="{{ url('assets/admin') }}/libs/jsvectormap/maps/world-merc.js"></script>

        <!-- Dashboard init -->
        <script src="{{ url('assets/admin') }}/js/pages/dashboard-analytics.init.js"></script>

        <!-- App js -->
        <script src="{{ url('assets/admin') }}/js/app.js"></script>

        <!--datatable js-->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="{{ url('assets/admin') }}/js/pages/datatables.init.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

        <script>
            $(".alert.toastr button.btn-close").click(function(){
                $(".alert.toastr").addClass("d-none");
            });
        </script>
        @stack('js')
    </body>
</html>
