@extends('layouts.app')

@section('title', 'Checkup Details')

@section('content')

<div class="content-header py-3">

    <div class="container-fluid">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>
                <h2 class="fw-bold mb-1">
                    Checkup Details
                </h2>

                <p class="text-muted small mb-0">
                    Patient medical checkup record.
                </p>
            </div>

            <a href="{{ route('checkups.index') }}"
               class="btn btn-secondary btn-sm px-3">

                <i class="bi bi-arrow-left me-1"></i>
                Back

            </a>

        </div>


        {{-- Main Card --}}
        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-bottom py-2 px-3">

                <h6 class="fw-bold mb-0">
                    <i class="bi bi-clipboard2-pulse text-primary me-1"></i>
                    Patient Checkup
                </h6>

            </div>


            <div class="card-body p-3">

                {{-- Patient Information --}}
                <div class="border rounded p-3 mb-3">

                    <h6 class="fw-bold mb-2">
                        <i class="bi bi-person-vcard text-primary me-1"></i>
                        Patient Information
                    </h6>

                    <div class="row g-2">

                        <div class="col-md-6">
                            <span class="text-muted small">Patient</span>
                            <div class="fw-semibold small">
                                {{ $checkup->patient->name }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <span class="text-muted small">Doctor</span>
                            <div class="fw-semibold small">
                                {{ $checkup->doctor->name }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <span class="text-muted small">Follow-up Date</span>
                            <div class="fw-semibold small">

                                @if($checkup->follow_up_date)
                                    {{ \Carbon\Carbon::parse($checkup->follow_up_date)->format('d M Y') }}
                                @else
                                    <span class="text-muted">Not set</span>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-6">
                            <span class="text-muted small">Diagnosis</span>
                            <div class="fw-semibold small">
                                {{ $checkup->diagnosis ?: 'Not provided' }}
                            </div>
                        </div>

                    </div>

                </div>


                {{-- Symptoms --}}
                <div class="border rounded p-3 mb-3">

                    <h6 class="fw-bold mb-2">
                        <i class="bi bi-thermometer-half text-primary me-1"></i>
                        Symptoms
                    </h6>

                    @forelse($checkup->symptoms as $symptom)

                        <span class="badge bg-primary me-1 mb-1">
                            {{ $symptom->name }}
                        </span>

                    @empty

                        <span class="text-muted small">
                            No symptoms added.
                        </span>

                    @endforelse

                </div>


                
{{-- Medicines --}}
<div class="border rounded p-3 mb-3">

    <h6 class="fw-bold mb-2">
        <i class="bi bi-capsule text-primary me-1"></i>
        Medicines
    </h6>


    {{-- Existing Medicines --}}
    @forelse($checkup->medicines as $medicine)

        <div class="d-flex justify-content-between align-items-center
                    border-bottom py-2">

            <div class="fw-semibold small">
                {{ $medicine->name }}
            </div>

            <div class="text-muted small">

                {{ $medicine->pivot->dosage ?: '—' }}
                &nbsp; | &nbsp;
                {{ $medicine->pivot->frequency ?: '—' }}
                &nbsp; | &nbsp;
                {{ $medicine->pivot->duration ?: '—' }}

            </div>

        </div>

    @empty

    @endforelse


    {{-- Manual Medicines --}}
    @foreach($manualMedicines as $manualMedicine)

        <div class="d-flex justify-content-between align-items-center
                    border-bottom py-2">

            <div class="fw-semibold small">
                {{ $manualMedicine->custom_medicine_name }}
            </div>

            <div class="text-muted small">

                {{ $manualMedicine->dosage ?: '—' }}
                &nbsp; | &nbsp;
                {{ $manualMedicine->frequency ?: '—' }}
                &nbsp; | &nbsp;
                {{ $manualMedicine->duration ?: '—' }}

            </div>

        </div>

    @endforeach


    {{-- No Medicines --}}
    @if($checkup->medicines->isEmpty() && $manualMedicines->isEmpty())

        <span class="text-muted small">
            No medicines added.
        </span>

    @endif

</div>


                {{-- Notes --}}
                <div class="border rounded p-3">

                    <h6 class="fw-bold mb-2">
                        <i class="bi bi-journal-text text-primary me-1"></i>
                        Doctor's Notes
                    </h6>

                    @if($checkup->notes)

                        <div class="small text-muted">
                            {{ $checkup->notes }}
                        </div>

                    @else

                        <span class="text-muted small">
                            No notes provided.
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection