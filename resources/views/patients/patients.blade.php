@extends('layouts.app')

@section('title', 'Patients')

<style>
    /* =========================
       Patients Page
    ========================== */

    /* =========================
   Patients Welcome Header
========================== */

.patients-page {
    padding-top: 28px;
    margin-bottom: 24px;
}

.patients-header {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;

    padding: 24px 28px;

    background: linear-gradient(
        135deg,
        #ffffff 0%,
        #f5f9ff 100%
    );

    border: 1px solid #e3eaf3;
    border-radius: 16px;

    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);

    overflow: hidden;
}

.patients-header::before {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    right: -60px;
    top: -90px;

    border-radius: 50%;

    background: rgba(13, 110, 253, 0.07);
}

.patients-header::after {
    content: "";

    position: absolute;

    width: 80px;
    height: 80px;

    right: 100px;
    bottom: -45px;

    border-radius: 50%;

    background: rgba(13, 110, 253, 0.04);
}


/* =========================
   Patients Title
========================== */

.patients-header > div:first-child {
    position: relative;
    z-index: 2;
}

.patients-title {
    margin: 0 0 7px;

    font-size: 26px;
    font-weight: 650;

    color: #172033;

    letter-spacing: -0.4px;
    line-height: 1.2;
}

.patients-subtitle {
    margin: 0;

    color: #64748b;

    font-size: 15px;
    line-height: 1.6;
}


/* =========================
   Add Patient Button
========================== */

.add-patient-btn {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 10px 17px;

    border-radius: 9px;

    background: #2563eb !important;
    border: 1px solid #2563eb !important;

    color: #ffffff !important;

    font-size: 14px;
    font-weight: 500;

    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.16);

    transition: all 0.2s ease;
}

.add-patient-btn:hover {
    background: #1d4ed8 !important;
    border-color: #1d4ed8 !important;

    color: #ffffff !important;

    transform: translateY(-1px);

    box-shadow: 0 6px 14px rgba(37, 99, 235, 0.22);
}


    /* =========================
       Success Message
    ========================== */

    .patient-success-message {
        width: 100%;
        max-width: 700px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;

        padding: 12px 16px;
        margin-bottom: 20px;

        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-left: 4px solid #22c55e;

        border-radius: 10px;

        color: #166534;
        font-size: 14px;
        font-weight: 500;

        box-shadow: 0 3px 10px rgba(34, 197, 94, 0.06);
    }

    .patient-success-close {
        flex-shrink: 0;

        border: none;
        background: transparent;

        color: #166534;
        font-size: 21px;
        line-height: 1;

        cursor: pointer;
        padding: 0 2px;

        transition: opacity 0.2s ease;
    }

    .patient-success-close:hover {
        opacity: 0.55;
    }

    /* =========================
       Patients Card
    ========================== */

    /* =========================
   Patients Card
========================== */

.patients-card {
    border: 1px solid #e5e7eb;

    border-radius: 14px;

    background: #ffffff;

    box-shadow:
        0 4px 12px rgba(15, 23, 42, 0.06);

    overflow: hidden;
}

.patients-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    padding: 17px 20px;

    background: #ffffff;

    border-bottom: 1px solid #e5e7eb;
}

.patients-card-title {
    display: flex;
    align-items: center;

    margin: 0;

    font-size: 18px;
    font-weight: 650;

    color: #172033;
}

.patients-card-title i {
    color: #0d6efd;
    font-size: 19px;
}

.patients-total {
    color: #64748b;

    font-size: 13px;
    font-weight: 500;

    background: #f8fafc;

    border: 1px solid #e5e7eb;

    padding: 5px 10px;

    border-radius: 7px;
}


    /* =========================
       Responsive
    ========================== */

    @media (max-width: 767.98px) {

        .patients-page {
            padding-top: 20px;
        }

        .patients-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        .patients-title {
            font-size: 25px;
        }

    

        .patients-card-header {
            padding: 15px;
        }

        .patients-card-title {
            font-size: 16px;
        }

        .patients-total {
            font-size: 12px;
        }
    }

    @media (max-width: 575.98px) {

        .patients-page {
            padding-top: 16px;
        }

        .patients-card-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        .patients-total {
            align-self: flex-start;
        }

        .patient-success-message {
            font-size: 13px;
        }
    }
</style>


@section('content')

{{-- Page Header --}}

{{-- Page Header --}}
<div class="content-header py-0">
    <div class="container-fluid">

        <div class="patients-page">

            <div class="patients-header">

                <div>
                    <h1 class="patients-title">
                        Patients
                    </h1>

                    <p class="patients-subtitle">
                        Manage patients and their personal information.
                    </p>
                </div>

                @can('create patients')
                    <a href="{{ route('patients.create') }}"
                       class="btn btn-primary add-patient-btn">

                        <i class="bi bi-person-plus"></i>
                        Add Patient

                    </a>
                @endcan

            </div>

        </div>

    </div>
</div>



{{-- Patients Table --}}

<div class="content">
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


        <div class="card patients-card">


            {{-- Card Header --}}

            <div class="patients-card-header">

    <div class="d-flex justify-content-between align-items-center w-100">

        <h3 class="patients-card-title">

            <i class="bi bi-people me-2"></i>

            All Patients

        </h3>

        <span class="patients-total">
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

<script>
    setTimeout(function () {

        const row = document.getElementById('highlightedPatient');

        if (row) {
            row.style.backgroundColor = '';
            row.removeAttribute('id');
        }

    }, 3000);
</script>

@endsection