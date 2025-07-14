@extends('admin.layouts.master')
@push('css')
  <link rel="stylesheet" href="{{ url('assets/admin') }}/plugins/summernote/summernote-bs4.min.css">
  <style>
    .note-editable.card-block {
        height: 200px;
    }
  </style>
@endpush

@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Appointment</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                    <li class="breadcrumb-item active">Form</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{keywords()->Edit_Appointment ?? __('Edit Appointment')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.appointment.edit', $appointment)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Select_patient ?? __('Select a patient')}} </label>
                        <select class="selectpicker" name="pet_id" id="select_client" data-live-search="true" required>
                            <option value="">Select a client</option>
                            @foreach ($patients as $item)
                                <option value="{{$item->id}}" @if($appointment->patient_id == $item->id) selected @endif data-subtext="{{ $item->unique_id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Select_doctor ?? __('Select a doctor')}} </label>
                        <select class="selectpicker" name="doctor_id" id="select_client" data-live-search="true" required>
                            <option value="">Select a doctor</option>
                            @foreach ($doctors as $item)
                                <option value="{{$item->id}}" @if($appointment->doctor_id == $item->id) selected @endif data-subtext="{{ $item->phone }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Purpose ?? __('Purpose')}} </label>
                        <textarea name="purpose" class="form-control" cols="30" rows="10">{{ $appointment->purpose }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">{{keywords()->Date_Time ?? __('Date Time')}} </label>
                        <input type="datetime-local" class="form-control" name="date_time" value="{{ $appointment->date_time }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
