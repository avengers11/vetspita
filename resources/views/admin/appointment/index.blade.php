@extends('admin.layouts.master')
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Appointment</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Showing</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">All Appointment</h5>
                @can('Appointment Add')
                    <a href="{{ route('admin.appointment.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Appointment</a>
                @endcan
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Parent_Name ?? __('Parent Name')}}</th>
                            <th>{{keywords()->Number ?? __('Number')}} </th>
                            <th>{{keywords()->Email ?? __('Email')}} </th>
                            <th>{{keywords()->Address ?? __('Address')}} </th>
                            <th>{{keywords()->Patient_Name ?? __('Patient Name')}} </th>
                            <th>{{keywords()->Species ?? __('Species')}} </th>
                            <th>{{keywords()->Breed ?? __('Breed')}} </th>
                            <th>{{keywords()->Gender ?? __('Gender')}} </th>
                            <th>{{keywords()->Age ?? __('Age')}} </th>
                            <th>{{keywords()->Purpose ?? __('Purpose')}} </th>
                            <th>{{keywords()->Doctor ?? __('Doctor')}} </th>
                            <th>{{keywords()->Date_Time ?? __('Date Time')}} </th>

                            @canany(['Appointment Edit', 'Appointment Delete', 'Appointment Status'])
                                <th class="text-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            @php
                                $birthDate = \Carbon\Carbon::parse($data->pet->age);
                                $now = \Carbon\Carbon::now();
                            
                                $years = $birthDate->diffInYears($now);
                                $months = $birthDate->copy()->addYears($years)->diffInMonths($now);
                            
                                $ageParts = [];
                            
                                if ($years > 0) {
                                    $ageParts[] = $years . ' year' . ($years > 1 ? 's' : '');
                                }
                            
                                if ($months > 0) {
                                    $ageParts[] = $months . ' month' . ($months > 1 ? 's' : '');
                                }
                            @endphp
                            

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->pet->user->name}}</td>
                                <td>{{$data->pet->user->number}}</td>
                                <td>{{$data->pet->user->email}}</td>
                                <td>{{$data->pet->user->address}}</td>
                                
                                <td>{{$data->pet->name}}</td>
                                <td>{{$data->pet->species}}</td>
                                <td>{{$data->pet->breed}}</td>
                                <td>{{$data->pet->sex}}</td>
                                <td>{{ implode(' ', $ageParts) }}</td>
                                <td>{{$data->purpose}}</td>
                                <td><strong class="text-danger">{{$data->doctor->name}}</strong></td>
                                <td>{{ \Carbon\Carbon::parse($data->date_time)->format('d M, y \a\t g:i A') }}</td>
                                @canany(['Appointment Edit', 'Appointment Delete', 'Appointment Status'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Appointment Status')
                                                @if ($data->status == "unauthorize")
                                                    <a href="{{route('admin.appointment.status', ["appointment" => $data, "status" => "authorize"])}}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-radio-button-fill label-icon align-middle rounded-pill"></i>Authorize</a>
                                                @elseif($data->status == "accept")
                                                    <a href="" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-radio-button-fill label-icon align-middle rounded-pill"></i>Complete</a>
                                                @else
                                                    <a href="{{route('admin.appointment.status', ["appointment" => $data, "status" => "accept"])}}" class="btn btn-primary btn-label rounded-pill btn-sm" onclick="return confirm('Are you sure? Once you proceed, you won’t be able to go back.');"><i class="ri-radio-button-fill label-icon align-middle rounded-pill"></i>Accept</a>

                                                    <a href="{{route('admin.appointment.status', ["appointment" => $data, "status" => "unauthorize"])}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-radio-button-fill label-icon align-middle rounded-pill"></i>Reject</a>
                                                @endif
                                            @endcan

                                            @can('Appointment Edit')
                                                <a href="{{route('admin.appointment.edit', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-edit-box-fill label-icon align-middle rounded-pill"></i> Edit</a>
                                            @endcan
                                            @can('Appointment Delete')
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.appointment.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
                                            @endcan
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection