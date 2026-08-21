@extends('layouts.app')

@section('title', 'Patients')

<style>
    .patient-success-message {
        width: 600px;
        max-width: 100%;

        padding: 12px 16px;
        margin-bottom: 20px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;

        background: #d1e7dd;
        border: 1px solid #a3cfbb;
        border-radius: 7px;

        color: #0f5132;
        font-size: 14px;
        font-weight: 500;
    }

    .patient-success-close {
        border: none;
        background: transparent;
        color: #0f5132;

        font-size: 22px;
        line-height: 1;

        cursor: pointer;
        padding: 0;
    }

    .patient-success-close:hover {
        opacity: 0.6;
    }
</style>

@section('content')

{{-- Page Header --}}

<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">
                    Patients
                </h1>

                <p class="mb-0 text-muted"
                   style="font-size: 14px;">
                    Manage patients and their personal information.
                </p>
            </div>

            <div>
                <a href="{{ route('patients.create') }}"
                   class="btn btn-primary px-3">

                    <i class="bi bi-person-plus me-1"></i>
                    Add Patient

                </a>
            </div>

        </div>

    </div>
</div>


{{-- Patients Table --}}

<div class="content pt-2">
    <div class="container-fluid">

        {{-- Success Message --}}

        @if(session('success'))
            <div class="patient-success-message"
                 id="patientSuccessMessage">

                <span>
                    {{ session('success') }}
                </span>

                <button type="button"
                        class="patient-success-close"
                        onclick="document.getElementById('patientSuccessMessage').remove()">

                    &times;

                </button>

            </div>
        @endif


        <div class="card shadow-sm border-0"
             style="border-radius: 10px; overflow: hidden;">

            {{-- Card Header --}}

            <div class="card-header bg-white py-3 px-4"
                 style="border-bottom: 1px solid #e5e7eb;">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title mb-0"
                        style="font-size: 18px; font-weight: 500; color: #1f2937;">

                        <i class="bi bi-people me-2"
                           style="color: #0d6efd;"></i>

                        All Patients

                    </h3>

                    <span class="text-muted"
                          style="font-size: 14px;">

                        Total: {{ $patients->total() }}

                    </span>

                </div>

            </div>

            {{-- Patients Table --}}

    <div id="patientsTable">

        @include('patients.partials.table')

    </div>

    </div>
</div>


{{-- Auto Hide Success Message --}}

<script>
    setTimeout(function () {

        const message = document.getElementById('patientSuccessMessage');

        if (message) {
            message.remove();
        }

    }, 3000);
</script>

<script>
    document.addEventListener('click', function (event) {

        const link = event.target.closest('#patientsTable .pagination a');

        if (!link) {
            return;
        }

        event.preventDefault();

        fetch(link.href, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {

            document.getElementById('patientsTable').innerHTML = html;

        })
        .catch(error => {
            console.error('AJAX Error:', error);
        });

    });
</script>

@endsection