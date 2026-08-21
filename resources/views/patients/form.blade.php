@extends('layouts.app')

@section('title', isset($patient) ? 'Edit Patient' : 'Add Patient')

@section('content')

{{-- Page Header --}}
<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">

                    {{ isset($patient) ? 'Edit Patient' : 'Add Patient' }}

                </h1>

                <p class="mb-0 text-muted"
                   style="font-size: 14px;">

                    {{ isset($patient)
                        ? "Update the patient's profile and information."
                        : "Add a new patient's profile and information." }}

                </p>
            </div>

            <div>
                <a href="{{ route('patients') }}"
                   class="btn btn-outline-primary px-3">

                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Patients

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

                            <i class="bi bi-person-plus me-2"
                               style="color: #0d6efd;"></i>

                            {{ isset($patient)
                                ? 'Update Patient Information'
                                : 'Patient Information' }}

                        </h3>

                    </div>


                    {{-- Form --}}
                    <form
                        action="{{ isset($patient)
                            ? route('patients.update', $patient->id)
                            : route('patients.store') }}"
                        method="POST">

                        @csrf

                        @if(isset($patient))
                            @method('PUT')
                        @endif


                        <div class="card-body px-4 py-4">

                            <div class="row">

                                {{-- Name --}}
                                <div class="col-md-6 mb-4">

                                    <label for="name"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Patient Name

                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $patient->name ?? '') }}"
                                        placeholder="Enter patient name"
                                    >

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Father Name --}}
                                <div class="col-md-6 mb-4">

                                    <label for="father_name"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Father Name

                                    </label>

                                    <input
                                        type="text"
                                        name="father_name"
                                        id="father_name"
                                        class="form-control @error('father_name') is-invalid @enderror"
                                        value="{{ old('father_name', $patient->father_name ?? '') }}"
                                        placeholder="Enter father name"
                                    >

                                    @error('father_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Gender --}}
                                <div class="col-md-6 mb-4">

                                    <label for="gender"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Gender

                                    </label>

                                    <select
                                        name="gender"
                                        id="gender"
                                        class="form-select @error('gender') is-invalid @enderror">

                                        <option value="">Select Gender</option>

                                        <option value="Male"
                                            {{ old('gender', $patient->gender ?? '') == 'Male' ? 'selected' : '' }}>
                                            Male
                                        </option>

                                        <option value="Female"
                                            {{ old('gender', $patient->gender ?? '') == 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>

                                        <option value="Other"
                                            {{ old('gender', $patient->gender ?? '') == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>

                                    </select>

                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- CNIC --}}
                                <div class="col-md-6 mb-4">

                                    <label for="cnic"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        CNIC

                                    </label>

                                    <input
                                        type="text"
                                        name="cnic"
                                        id="cnic"
                                        class="form-control @error('cnic') is-invalid @enderror"
                                        value="{{ old('cnic', $patient->cnic ?? '') }}"
                                        placeholder="42101-1234567-1"
                                    >

                                    @error('cnic')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Age --}}
                                <div class="col-md-6 mb-4">

                                    <label for="age"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Age

                                    </label>

                                    <input
                                        type="number"
                                        name="age"
                                        id="age"
                                        class="form-control @error('age') is-invalid @enderror"
                                        value="{{ old('age', $patient->age ?? '') }}"
                                        min="1"
                                        max="120"
                                        placeholder="Enter age"
                                    >

                                    @error('age')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Contact Number --}}
                                <div class="col-md-6 mb-4">

                                    <label for="contact_number"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Contact Number

                                    </label>

                                    <input
                                        type="tel"
                                        name="contact_number"
                                        id="contact_number"
                                        class="form-control @error('contact_number') is-invalid @enderror"
                                        value="{{ old('contact_number', $patient->contact_number ?? '') }}"
                                        maxlength="20"
                                        placeholder="03001234567"
                                    >

                                    @error('contact_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Address --}}
                                <div class="col-12 mb-3">

                                    <label for="address"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Address

                                    </label>

                                    <textarea
                                        name="address"
                                        id="address"
                                        rows="3"
                                        class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Enter patient address">{{ old('address', $patient->address ?? '') }}</textarea>

                                    @error('address')
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

                            <a href="{{ route('patients') }}"
                               class="btn btn-danger px-3">

                                <i class="bi bi-x-circle me-1"></i>
                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-3">

                                <i class="bi bi-check-circle me-1"></i>

                                {{ isset($patient) ? 'Update Patient' : 'Save Patient' }}

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection