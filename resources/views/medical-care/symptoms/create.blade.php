@extends('layouts.app')

@section('title', 'Add Symptom')

@section('content')

{{-- Page Header --}}
<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            {{-- Page Title --}}
            <div>
                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">
                    Add a New Symptom
                </h1>

                <p class="mb-0 text-muted"
                   style="font-size: 14px;">
                    Add a new patient symptom to the system.
                </p>
            </div>

            {{-- Back Button --}}
            <div>
                <a href="{{ route('symptoms.index') }}"
                   class="btn btn-outline-primary px-3">

                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Symptoms

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

                {{-- Symptom Card --}}
                <div class="card shadow-sm border-0"
                     style="border-radius: 10px; overflow: hidden;">

                    {{-- Card Header --}}
                    <div class="card-header bg-white py-3 px-4"
                         style="border-bottom: 1px solid #e5e7eb;">

                        <h3 class="card-title mb-0"
                            style="font-size: 18px; font-weight: 500; color: #1f2937;">

                            <i class="bi bi-activity me-2"
                               style="color: #0d6efd;"></i>

                            Symptom Information

                        </h3>

                    </div>


                    {{-- Form --}}
                    <form action="{{ route('symptoms.store') }}"
                          method="POST">

                        @csrf

                        <div class="card-body px-4 py-4">

                            <div class="row">

                                {{-- Symptom Name --}}
                                <div class="col-md-12 mb-3">

                                    <label for="name"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Symptom Name

                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}"
                                        placeholder="e.g. Fever"
                                    >

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                {{-- Symptom Description --}}
                                <div class="col-md-12 mb-3">

                                    <label for="description"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Description

                                    </label>

                                    <textarea
                                        name="description"
                                        id="description"
                                        rows="4"
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter a brief description of this symptom..."
                                    >{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


    {{-- Field Type --}}
<div class="col-md-12 mb-3">
    <label for="type"
           class="form-label"
           style="font-weight: 500; color: #374151;">
        Field Type
    </label>

    <select
        name="type"
        id="type"
        class="form-select @error('type') is-invalid @enderror">

        <option value="">
            Select Field Type
        </option>

        <option value="Text"
            {{ old('type') == 'Text' ? 'selected' : '' }}>
            Text
        </option>

        <option value="Number"
            {{ old('type') == 'Number' ? 'selected' : '' }}>
            Number
        </option>

        <option value="Boolean"
            {{ old('type') == 'Boolean' ? 'selected' : '' }}>
            Boolean (Yes/No)
        </option>

    </select>

    @error('type')
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

                            <a href="{{ route('symptoms.index') }}"
                               class="btn btn-danger px-3">

                                <i class="bi bi-x-circle me-1"></i>
                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-3">

                                <i class="bi bi-check-circle me-1"></i>
                                Save Symptom

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection