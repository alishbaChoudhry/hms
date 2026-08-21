@extends('layouts.app')

@section('title', 'Edit Doctor')

@section('content')

{{-- Page Header --}}
<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">
                    Edit Doctor
                </h1>

                <p class="mb-0 text-muted"
                   style="font-size: 14px;">
                    Update the doctor's profile and information.
                </p>
            </div>

            <div>
                <a href="{{ route('doctors.index') }}"
                   class="btn btn-outline-primary px-3">

                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Doctors

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

                            <i class="bi bi-pencil-square me-2"
                               style="color: #0d6efd;"></i>

                            Update Doctor Information

                        </h3>

                    </div>


                    {{-- Form --}}
                    <form action="{{ route('doctors.update', $doctor->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="card-body px-4 py-4">

                            <div class="row">

                                {{-- Name --}}
                                <div class="col-md-6 mb-4">

                                    <label for="name"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Doctor Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $doctor->name) }}"
                                        placeholder="Enter doctor name"
                                    >

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Email --}}
                                <div class="col-md-6 mb-4">

                                    <label for="email"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $doctor->email) }}"
                                        placeholder="doctor@example.com"
                                    >

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Phone --}}
                                <div class="col-md-6 mb-3">

                                    <label for="phone"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Phone Number
                                    </label>

                                    <input
                                        type="tel"
                                        name="phone"
                                        id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', $doctor->phone) }}"
                                        maxlength="11"
                                        placeholder="03001234567"
                                    >

                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Specialization --}}
                                <div class="col-md-6 mb-3">

                                    <label for="specialization"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">
                                        Specialization
                                    </label>

                                    <input
                                        type="text"
                                        name="specialization"
                                        id="specialization"
                                        class="form-control @error('specialization') is-invalid @enderror"
                                        value="{{ old('specialization', $doctor->specialization) }}"
                                        placeholder="e.g. Cardiologist"
                                    >

                                    @error('specialization')
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

                            <a href="{{ route('doctors.index') }}"
                               class="btn btn-danger px-3">

                                <i class="bi bi-x-circle me-1"></i>
                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-3">

                                <i class="bi bi-check-circle me-1"></i>
                                Update Doctor

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection