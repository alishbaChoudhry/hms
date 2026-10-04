@extends('layouts.app')

@section('title', 'Add Checkup')

@push('styles')

<link
    href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
    rel="stylesheet"
/>

<style>
    /* =========================
       Select2
    ========================= */

    .select2-container {
        width: 100% !important;
        z-index: 9999;
    }

    .select2-dropdown {
        z-index: 9999;
    }

    .select2-container--default .select2-selection--single {
        height: 31px;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }

    .select2-container--default
    .select2-selection--single
    .select2-selection__rendered {
        line-height: 29px;
        font-size: 0.875rem;
    }

    .select2-container--default
    .select2-selection--single
    .select2-selection__arrow {
        height: 29px;
    }


    /* =========================
       Symptoms
    ========================= */

    .symptoms-box {
        max-height: 150px;
        overflow-y: auto;

        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;

        padding: 8px;

        border: 1px solid #dee2e6;
        border-radius: 7px;

        background: #fafbfc;
    }

    .symptom-item {
        padding: 7px 8px;

        background: #fff;

        border: 1px solid #e5e7eb;
        border-radius: 6px;
    }

    .symptom-check {
        margin: 0;

        min-height: 22px;

        display: flex;
        align-items: center;

        gap: 5px;
    }

    .symptom-check .form-check-input {
        margin: 0;
        cursor: pointer;
    }

    .symptom-check .form-check-label {
        cursor: pointer;
        color: #374151;
    }

    /* Detail box hidden */
    .symptom-detail {
        display: none;
        margin-top: 6px;
    }

    .symptom-detail input {
        height: 28px;
        padding: 3px 7px;
        font-size: 12px;
    }

    /* Scrollbar */
    .symptoms-box::-webkit-scrollbar {
        width: 5px;
    }

    .symptoms-box::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }


    /* =========================
       Medicine Rows
    ========================= */

    .medicine-row {
        background: #fafbfc;
    }

    .medicine-row .form-control,
    .medicine-row .form-select {
        font-size: 0.875rem;
    }


    /* =========================
       Responsive
    ========================= */

    @media (max-width: 991.98px) {

        .symptoms-box {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media (max-width: 575.98px) {

        .symptoms-box {
            grid-template-columns: 1fr;
        }

    }
</style>

@endpush

@section('content')

<div class="content-header py-3">

<div class="container-fluid">

    {{-- =========================
         Page Header
    ========================= --}}

    <div class="mb-3">

        <h2 class="fw-bold mb-1">
            Add Patient Checkup
        </h2>

        <p class="text-muted small mb-0">
            Create a new patient medical checkup.
        </p>

    </div>


    {{-- =========================
         Validation Errors
    ========================= --}}

    @if($errors->any())

        <div class="alert alert-danger py-2 mb-3">

            <ul class="mb-0 small">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =========================
         Main Checkup Form
    ========================= --}}

    <form
        action="{{ route('checkups.store') }}"
        method="POST"
        id="checkupForm">

        @csrf


        <div class="card border-0 shadow-sm">


            {{-- =========================
                 Card Header
            ========================= --}}

            <div class="card-header bg-white border-bottom py-2 px-3">

                <div class="d-flex justify-content-between align-items-center">

                    <h6 class="fw-bold mb-0">

                        <i class="bi bi-clipboard2-pulse text-primary me-1"></i>

                        Patient Checkup

                    </h6>

                    <span class="text-muted small">
                        Medical Record
                    </span>

                </div>

            </div>


            {{-- =========================
                 Card Body
            ========================= --}}

            <div class="card-body p-3">


                {{-- =========================
                     Patient Information
                ========================= --}}

                <div class="border rounded p-3 mb-3">

                    <h6 class="fw-bold mb-3">

                        <i class="bi bi-person-vcard text-primary me-1"></i>

                        Patient Information

                    </h6>


                    <div class="row g-2">


                        {{-- Patient --}}

                        <div class="col-md-6">

                            <label class="form-label small fw-semibold mb-1">
                                Patient
                            </label>

                            <select
                                name="patient_id"
                                id="patient_id"
                                class="form-select form-select-sm select2 @error('patient_id') is-invalid @enderror"
                                required>

                                <option value="">
                                    Select Patient
                                </option>

                                @foreach($patients as $patient)

                                    <option
                                        value="{{ $patient->id }}"
                                        {{ old('patient_id') == $patient->id ? 'selected' : '' }}>

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

                        <div class="col-md-6">

                            <label class="form-label small fw-semibold mb-1">
                                Doctor
                            </label>

                            <select
                                name="doctor_id"
                                id="doctor_id"
                                class="form-select form-select-sm select2 @error('doctor_id') is-invalid @enderror"
                                required>

                                <option value="">
                                    Select Doctor
                                </option>

                                @foreach($doctors as $doctor)

                                    <option
                                        value="{{ $doctor->id }}"
                                        {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>

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


                        {{-- Follow-up Date --}}

                        <div class="col-md-6">

                            <label class="form-label small fw-semibold mb-1">
                                Follow-up Date
                            </label>

                            <input
                                type="date"
                                name="follow_up_date"
                                class="form-control form-control-sm @error('follow_up_date') is-invalid @enderror"
                                value="{{ old('follow_up_date') }}">

                            @error('follow_up_date')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Diagnosis --}}

                        <div class="col-md-6">

                            <label class="form-label small fw-semibold mb-1">
                                Diagnosis
                            </label>

                            <input
                                type="text"
                                name="diagnosis"
                                class="form-control form-control-sm @error('diagnosis') is-invalid @enderror"
                                value="{{ old('diagnosis') }}"
                                placeholder="Diagnosis">

                            @error('diagnosis')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =========================
                     Symptoms
                ========================= --}}

                <div class="border rounded p-3 mb-3">

                    <div class="d-flex justify-content-between align-items-center mb-2">

                        <h6 class="fw-bold mb-0">

                            <i class="bi bi-thermometer-half text-primary me-1"></i>

                            Symptoms

                        </h6>

                        <span class="text-muted small">
                            Select applicable symptoms
                        </span>

                    </div>


                    <div class="symptoms-box">

                        @foreach($symptoms as $symptom)

                            <div class="symptom-item">

                                <div class="form-check symptom-check">

                                    <input
                                        type="checkbox"
                                        class="form-check-input symptom-checkbox"
                                        name="symptoms[]"
                                        value="{{ $symptom->id }}"
                                        id="symptom{{ $symptom->id }}"
                                        {{ in_array($symptom->id, old('symptoms', [])) ? 'checked' : '' }}>

                                    <label
                                        class="form-check-label small"
                                        for="symptom{{ $symptom->id }}">

                                        {{ $symptom->name }}

                                    </label>

                                </div>


                                <div class="symptom-detail">

                                    <input
                                        type="text"
                                        name="symptom_values[{{ $symptom->id }}]"
                                        class="form-control form-control-sm"
                                        placeholder="Enter value"
                                        value="{{ old('symptom_values.' . $symptom->id) }}">

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                


                               {{-- =========================
     Medicines
========================= --}}
<div class="border rounded p-3 mb-3">

    <div class="d-flex justify-content-between align-items-center mb-2">

        <h6 class="fw-bold mb-0">
            <i class="bi bi-capsule text-primary me-1"></i>
            Medicines
        </h6>

        <button
            type="button"
            id="addMedicine"
            class="btn btn-outline-primary btn-sm">

            <i class="bi bi-plus-circle me-1"></i>
            Add Medicine

        </button>

    </div>


    <div id="medicineContainer">

        {{-- First Medicine --}}
        <div class="medicine-row border rounded p-2 mb-2">

            <div class="row g-2">

                {{-- Existing Medicine --}}
                <div class="col-md-6">

                    <label class="form-label small fw-semibold mb-1">
                        Medicine
                    </label>

                    <select
                        name="medicines[0][id]"
                        class="form-select form-select-sm medicine-select">

                        <option value="">
                            Select Medicine
                        </option>

                        @foreach($medicines as $medicine)

                            <option value="{{ $medicine->id }}">
                                {{ $medicine->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Manual Medicine --}}
                <div class="col-md-6">

                    <label class="form-label small fw-semibold mb-1">
                        Or Enter Medicine Manually
                    </label>

                    <input
                        type="text"
                        name="medicines[0][custom_name]"
                        class="form-control form-control-sm"
                        placeholder="Enter medicine name">

                </div>


                {{-- Dosage --}}
                <div class="col-md-3">

                    <label class="form-label small fw-semibold mb-1">
                        Dosage
                    </label>

                    <input
                        type="text"
                        name="medicines[0][dosage]"
                        class="form-control form-control-sm"
                        placeholder="500 mg">

                </div>


                {{-- Frequency --}}
                <div class="col-md-3">

                    <label class="form-label small fw-semibold mb-1">
                        Frequency
                    </label>

                    <input
                        type="text"
                        name="medicines[0][frequency]"
                        class="form-control form-control-sm"
                        placeholder="2 times">

                </div>


                {{-- Duration --}}
                <div class="col-md-3">

                    <label class="form-label small fw-semibold mb-1">
                        Duration
                    </label>

                    <input
                        type="text"
                        name="medicines[0][duration]"
                        class="form-control form-control-sm"
                        placeholder="5 days">

                </div>


                {{-- Remove --}}
                <div class="col-md-3 d-flex align-items-end justify-content-end">

                    <button
                        type="button"
                        class="btn btn-outline-danger btn-sm remove-medicine">

                        <i class="bi bi-trash"></i>
                        Remove

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


                {{-- =========================
                     Doctor's Notes
                ========================= --}}

                <div class="border rounded p-3 mb-3">

                    <h6 class="fw-bold mb-2">

                        <i class="bi bi-journal-text text-primary me-1"></i>

                        Doctor's Notes

                    </h6>

                    <textarea
                        name="notes"
                        class="form-control form-control-sm @error('notes') is-invalid @enderror"
                        rows="4"
                        placeholder="Enter doctor's notes">{{ old('notes') }}</textarea>

                    @error('notes')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =========================
                     Buttons
                ========================= --}}

                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="{{ route('checkups.index') }}"
                        class="btn btn-danger btn-sm px-3">

                        <i class="bi bi-x-circle me-1"></i>

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary btn-sm px-3">

                        <i class="bi bi-check-circle me-1"></i>

                        Save Checkup

                    </button>

                </div>


            </div>

        </div>

    </form>

</div>


</div>

```html
@push('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

/* =========================
   Select2
========================= */

$(document).ready(function () {

    $('#patient_id').select2({
        placeholder: 'Search or select patient',
        allowClear: true,
        width: '100%'
    });

    $('#doctor_id').select2({
        placeholder: 'Search or select doctor',
        allowClear: true,
        width: '100%'
    });

});


/* =========================
   Add Medicine
========================= */

let medicineIndex = 1;

document.getElementById('addMedicine').addEventListener('click', function () {

    const container = document.getElementById('medicineContainer');

    const row = document.createElement('div');

    row.className = 'medicine-row border rounded p-2 mb-2';

    row.innerHTML = `
        <div class="row g-2">

            {{-- Medicine --}}

            <div class="col-md-6">

                <label class="form-label small fw-semibold mb-1">
                    Medicine
                </label>

                <select
                    name="medicines[${medicineIndex}][id]"
                    class="form-select form-select-sm medicine-select">

                    <option value="">
                        Select Medicine
                    </option>

                    @foreach($medicines as $medicine)

                        <option value="{{ $medicine->id }}">
                            {{ $medicine->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Manual Medicine --}}

            <div class="col-md-6">

                <label class="form-label small fw-semibold mb-1">
                    Or Enter Medicine Manually
                </label>

                <input
                    type="text"
                    name="medicines[${medicineIndex}][custom_name]"
                    class="form-control form-control-sm"
                    placeholder="Enter medicine name">

            </div>


            {{-- Dosage --}}

            <div class="col-md-3">

                <label class="form-label small fw-semibold mb-1">
                    Dosage
                </label>

                <input
                    type="text"
                    name="medicines[${medicineIndex}][dosage]"
                    class="form-control form-control-sm"
                    placeholder="500 mg">

            </div>


            {{-- Frequency --}}

            <div class="col-md-3">

                <label class="form-label small fw-semibold mb-1">
                    Frequency
                </label>

                <input
                    type="text"
                    name="medicines[${medicineIndex}][frequency]"
                    class="form-control form-control-sm"
                    placeholder="2 times">

            </div>


            {{-- Duration --}}

            <div class="col-md-3">

                <label class="form-label small fw-semibold mb-1">
                    Duration
                </label>

                <input
                    type="text"
                    name="medicines[${medicineIndex}][duration]"
                    class="form-control form-control-sm"
                    placeholder="5 days">

            </div>


            {{-- Remove --}}

            <div class="col-md-3 d-flex align-items-end justify-content-end">

                <button
                    type="button"
                    class="btn btn-outline-danger btn-sm remove-medicine">

                    <i class="bi bi-trash"></i>
                    Remove

                </button>

            </div>

        </div>
    `;

    container.appendChild(row);

    medicineIndex++;

});


/* =========================
   Remove Medicine
========================= */

document.addEventListener('click', function (event) {

    const removeButton = event.target.closest('.remove-medicine');

    if (!removeButton) {
        return;
    }

    const row = removeButton.closest('.medicine-row');

    if (row) {
        row.remove();
    }

});


/* =========================
   Symptoms Detail Box
========================= */

document.addEventListener('change', function (event) {

    if (event.target.classList.contains('symptom-checkbox')) {

        const symptomItem =
            event.target.closest('.symptom-item');

        const detailBox =
            symptomItem.querySelector('.symptom-detail');

        if (event.target.checked) {

            detailBox.style.display = 'block';

        } else {

            detailBox.style.display = 'none';

            const input =
                detailBox.querySelector('input');

            if (input) {
                input.value = '';
            }

        }

    }

});


/* =========================
   Show Values Again After
   Validation Error
========================= */

document.addEventListener('DOMContentLoaded', function () {

    document
        .querySelectorAll('.symptom-checkbox:checked')
        .forEach(function (checkbox) {

            const symptomItem =
                checkbox.closest('.symptom-item');

            const detailBox =
                symptomItem.querySelector('.symptom-detail');

            if (detailBox) {
                detailBox.style.display = 'block';
            }

        });

});

</script>


@endpush

@endsection
