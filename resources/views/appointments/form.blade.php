@extends('layouts.app')

@section('title', isset($appointment) ? 'Edit Appointment' : 'Create Appointment')

@section('content')

{{-- Page Header --}}
<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">

                    {{ isset($appointment) ? 'Edit Appointment' : 'Create Appointment' }}

                </h1>

                <p class="mb-0 text-muted"
                   style="font-size: 14px;">

                    {{ isset($appointment)
                        ? 'Update appointment information.'
                        : 'Create a new patient appointment.' }}

                </p>
            </div>

            <div>
                <a href="{{ route('appointments.index') }}"
                   class="btn btn-outline-primary px-3">

                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Appointments

                </a>
            </div>

        </div>

    </div>
</div>


{{-- Form Section --}}
<div class="content pt-2">
    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8 col-xl-7">

                <div class="card shadow-sm border-0"
                     style="border-radius: 10px; overflow: hidden;">

                    {{-- Card Header --}}
                    <div class="card-header bg-white py-3 px-4"
                         style="border-bottom: 1px solid #e5e7eb;">

                        <h3 class="card-title mb-0"
                            style="font-size: 18px; font-weight: 500; color: #1f2937;">

                            <i class="bi bi-calendar-plus me-2"
                               style="color: #0d6efd;"></i>

                            {{ isset($appointment)
                                ? 'Update Appointment Information'
                                : 'Appointment Information' }}

                        </h3>

                    </div>


                    {{-- Form --}}
                    <form
                        action="{{ isset($appointment)
                            ? route('appointments.update', $appointment->id)
                            : route('appointments.store') }}"
                        method="POST">

                        @csrf

                        @if(isset($appointment))
                            @method('PUT')
                        @endif


                        <div class="card-body px-4 py-4">

                            <div class="row">

                                {{-- Patient --}}
                                <div class="col-md-6 mb-4">

                                    <label for="patient_id"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Patient
                                    </label>

                                    <select
                                        name="patient_id"
                                        id="patient_id"
                                        class="form-select @error('patient_id') is-invalid @enderror">

                                        <option value="">
                                            Select Patient
                                        </option>

                                        @foreach($patients as $patient)

                                            <option value="{{ $patient->id }}"
                                                {{ old(
                                                    'patient_id',
                                                    isset($appointment)
                                                        ? $appointment->patient_id
                                                        : ''
                                                ) == $patient->id ? 'selected' : '' }}>

                                                {{ $patient->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('patient_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Doctor --}}
                                <div class="col-md-6 mb-4">

                                    <label for="doctor_id"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Doctor
                                    </label>

                                    <select
                                        name="doctor_id"
                                        id="doctor_id"
                                        class="form-select @error('doctor_id') is-invalid @enderror">

                                        <option value="">
                                            Select Doctor
                                        </option>

                                        @foreach($doctors as $doctor)

                                            <option value="{{ $doctor->id }}"
                                                {{ old(
                                                    'doctor_id',
                                                    isset($appointment)
                                                        ? $appointment->doctor_id
                                                        : ''
                                                ) == $doctor->id ? 'selected' : '' }}>

                                                {{ $doctor->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('doctor_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Appointment Date --}}
                                <div class="col-md-6 mb-4">

                                    <label for="appointment_date"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Appointment Date
                                    </label>

                                    <input
                                        type="date"
                                        name="appointment_date"
                                        id="appointment_date"
                                        class="form-control @error('appointment_date') is-invalid @enderror"
                                        value="{{ old(
                                            'appointment_date',
                                            isset($appointment)
                                                ? $appointment->appointment_date
                                                : ''
                                        ) }}"
                                        min="{{ date('Y-m-d') }}">

                                    @error('appointment_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Appointment Time --}}
                                <div class="col-md-6 mb-4">

                                    <label for="appointment_time"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Appointment Time
                                    </label>

                                    <input
                                        type="time"
                                        name="appointment_time"
                                        id="appointment_time"
                                        class="form-control @error('appointment_time') is-invalid @enderror"
                                        value="{{ old(
                                            'appointment_time',
                                            isset($appointment)
                                                ? $appointment->appointment_time
                                                : ''
                                        ) }}">

                                    @error('appointment_time')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Appointment Type --}}
                                <div class="col-md-6 mb-4">

                                    <label for="appointment_type"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Appointment Type
                                    </label>

                                    <select
                                        name="appointment_type"
                                        id="appointment_type"
                                        class="form-select @error('appointment_type') is-invalid @enderror">

                                        <option value="">
                                            Select Type
                                        </option>

                                        <option value="Consultation"
                                            {{ old(
                                                'appointment_type',
                                                isset($appointment)
                                                    ? $appointment->appointment_type
                                                    : ''
                                            ) == 'Consultation' ? 'selected' : '' }}>
                                            Consultation
                                        </option>

                                        <option value="Follow-up"
                                            {{ old(
                                                'appointment_type',
                                                isset($appointment)
                                                    ? $appointment->appointment_type
                                                    : ''
                                            ) == 'Follow-up' ? 'selected' : '' }}>
                                            Follow-up
                                        </option>

                                    </select>

                                    @error('appointment_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Status --}}
                                <div class="col-md-6 mb-4">

                                    <label for="status"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Status
                                    </label>

                                    <select
                                        name="status"
                                        id="status"
                                        class="form-select @error('status') is-invalid @enderror">

                                        <option value="Pending"
                                            {{ old(
                                                'status',
                                                isset($appointment)
                                                    ? $appointment->status
                                                    : 'Pending'
                                            ) == 'Pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>

                                        <option value="Confirmed"
                                            {{ old(
                                                'status',
                                                isset($appointment)
                                                    ? $appointment->status
                                                    : ''
                                            ) == 'Confirmed' ? 'selected' : '' }}>
                                            Confirmed
                                        </option>

                                        <option value="Completed"
                                            {{ old(
                                                'status',
                                                isset($appointment)
                                                    ? $appointment->status
                                                    : ''
                                            ) == 'Completed' ? 'selected' : '' }}>
                                            Completed
                                        </option>

                                        <option value="Cancelled"
                                            {{ old(
                                                'status',
                                                isset($appointment)
                                                    ? $appointment->status
                                                    : ''
                                            ) == 'Cancelled' ? 'selected' : '' }}>
                                            Cancelled
                                        </option>

                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Reason / Symptoms --}}
                                <div class="col-12 mb-4">

                                    <label for="reason"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Reason / Symptoms
                                    </label>

                                    <textarea
                                        name="reason"
                                        id="reason"
                                        rows="3"
                                        class="form-control @error('reason') is-invalid @enderror"
                                        placeholder="Enter reason or symptoms">{{ old(
                                            'reason',
                                            isset($appointment)
                                                ? $appointment->reason
                                                : ''
                                        ) }}</textarea>

                                    @error('reason')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Notes --}}
                                <div class="col-12 mb-3">

                                    <label for="notes"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Notes
                                    </label>

                                    <textarea
                                        name="notes"
                                        id="notes"
                                        rows="3"
                                        class="form-control @error('notes') is-invalid @enderror"
                                        placeholder="Enter additional notes">{{ old(
                                            'notes',
                                            isset($appointment)
                                                ? $appointment->notes
                                                : ''
                                        ) }}</textarea>

                                    @error('notes')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- Buttons --}}
                        <div class="card-footer bg-white d-flex justify-content-end gap-2 px-4 py-3"
                             style="border-top: 1px solid #e5e7eb;">

                            <a href="{{ route('appointments.index') }}"
                               class="btn btn-danger px-3">

                                <i class="bi bi-x-circle me-1"></i>
                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-3">

                                <i class="bi bi-check-circle me-1"></i>

                                {{ isset($appointment)
                                    ? 'Update Appointment'
                                    : 'Save Appointment' }}

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection