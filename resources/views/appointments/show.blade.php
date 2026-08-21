@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')

{{-- Page Header --}}
<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">
                    Appointment Details
                </h1>

                <p class="mb-0 text-muted" style="font-size: 14px;">
                    View appointment information.
                </p>
            </div>

            <div>
                <a href="{{ route('appointments.index') }}"
   class="btn"
   style="
       background: #ffffff;
       color: #0d6efd;
       border: 1px solid #0d6efd;
       border-radius: 8px;
       padding: 10px 18px;
       font-size: 16px;
       font-weight: 500;
   ">

    <i class="bi bi-arrow-left me-1"></i>
    Back to Appointments

</a>
            </div>

        </div>

    </div>
</div>


{{-- Appointment Details --}}
<div class="content pt-2">
    <div class="container-fluid">

        <div class="card shadow-sm border-0"
             style="border-radius: 10px; overflow: hidden;">

            {{-- Card Header --}}
            <div class="card-header bg-white py-3 px-4"
                 style="border-bottom: 1px solid #e5e7eb;">

                <h3 class="card-title mb-0"
                    style="font-size: 18px; font-weight: 500;">

                    <i class="bi bi-calendar-check me-2"
                       style="color: #0d6efd;"></i>

                    Appointment #{{ $appointment->id }}

                </h3>

            </div>


            {{-- Card Body --}}
            <div class="card-body p-4">

                <div class="row">

                    {{-- Patient --}}
                    <div class="col-md-6 mb-4">

                        <label class="fw-semibold text-muted">
                            Patient
                        </label>

                        <div class="mt-1">
                            {{ $appointment->patient->name }}
                        </div>

                    </div>


                    {{-- Doctor --}}
                    <div class="col-md-6 mb-4">

                        <label class="fw-semibold text-muted">
                            Doctor
                        </label>

                        <div class="mt-1">
                            {{ $appointment->doctor->name }}
                        </div>

                    </div>


                    {{-- Date --}}
                    <div class="col-md-6 mb-4">

                        <label class="fw-semibold text-muted">
                            Appointment Date
                        </label>

                        <div class="mt-1">
                            {{ $appointment->appointment_date }}
                        </div>

                    </div>


                    {{-- Time --}}
                    <div class="col-md-6 mb-4">

                        <label class="fw-semibold text-muted">
                            Appointment Time
                        </label>

                        <div class="mt-1">
                            {{ $appointment->appointment_time }}
                        </div>

                    </div>


                    {{-- Appointment Type --}}
                    <div class="col-md-6 mb-4">

                        <label class="fw-semibold text-muted">
                            Appointment Type
                        </label>

                        <div class="mt-1">
                            {{ $appointment->appointment_type }}
                        </div>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6 mb-4">

                        <label class="fw-semibold text-muted">
                            Status
                        </label>

                        <div class="mt-1">

                            @if($appointment->status === 'Pending')

                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>

                            @elseif($appointment->status === 'Confirmed')

                                <span class="badge bg-primary">
                                    Confirmed
                                </span>

                            @elseif($appointment->status === 'Completed')

                                <span class="badge bg-success">
                                    Completed
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Cancelled
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Reason / Symptoms --}}
                    <div class="col-md-12 mb-4">

                        <label class="fw-semibold text-muted">
                            Reason / Symptoms
                        </label>

                        <div class="mt-1">
                            {{ $appointment->reason ?? 'N/A' }}
                        </div>

                    </div>


                    {{-- Notes --}}
                    <div class="col-md-12 mb-4">

                        <label class="fw-semibold text-muted">
                            Notes
                        </label>

                        <div class="mt-1">
                            {{ $appointment->notes ?? 'N/A' }}
                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>
</div>

@endsection