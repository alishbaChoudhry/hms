@extends('layouts.app')

@section('title', 'Edit Dosage')

@section('content')

<div class="content-header py-4">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1" style="color: #1f2937;">
                    Edit Dosage
                </h2>

                <p class="text-muted mb-0">
                    Update medicine dosage information
                </p>
            </div>

            <a href="{{ route('dosages.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>
                Back
            </a>

        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Dosage Form --}}
        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0 fw-semibold">
                    Dosage Information
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('dosages.update', $dosage->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- Dosage --}}
                        <div class="col-md-4">

                            <label for="dosage" class="form-label fw-semibold">
                                Dosage
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="dosage"
                                   id="dosage"
                                   class="form-control @error('dosage') is-invalid @enderror"
                                   value="{{ old('dosage', $dosage->dosage) }}"
                                   placeholder="e.g. 1 Tablet, 5 ml, 500 mg">

                            @error('dosage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Frequency --}}
                        <div class="col-md-4">

                            <label for="frequency" class="form-label fw-semibold">
                                Frequency
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="frequency"
                                   id="frequency"
                                   class="form-control @error('frequency') is-invalid @enderror"
                                   value="{{ old('frequency', $dosage->frequency) }}"
                                   placeholder="e.g. Once Daily, Twice Daily">

                            @error('frequency')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Duration --}}
                        <div class="col-md-4">

                            <label for="duration" class="form-label fw-semibold">
                                Duration
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="duration"
                                   id="duration"
                                   class="form-control @error('duration') is-invalid @enderror"
                                   value="{{ old('duration', $dosage->duration) }}"
                                   placeholder="e.g. 5 Days, 2 Weeks">

                            @error('duration')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                        <a href="{{ route('dosages.index') }}"
                           class="btn btn-light border">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Update Dosage
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection