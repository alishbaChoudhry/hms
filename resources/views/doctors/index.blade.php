@extends('layouts.app')

@section('title', 'Doctors')

<style>
    /* =========================
       Doctors Page
    ========================== */

    .doctors-page {
        padding-top: 28px;
        margin-bottom: 24px;
    }

    /* =========================
       Doctors Welcome Header
    ========================== */

    .doctors-header {
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

    .doctors-header::before {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        right: -60px;
        top: -90px;

        border-radius: 50%;

        background: rgba(13, 110, 253, 0.07);
    }

    .doctors-header::after {
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
       Doctors Title
    ========================== */

    .doctors-header > div:first-child {
        position: relative;
        z-index: 2;
    }

    .doctors-title {
        margin: 0 0 7px;

        font-size: 26px;
        font-weight: 650;

        color: #172033;

        letter-spacing: -0.4px;
        line-height: 1.2;
    }

    .doctors-subtitle {
        margin: 0;

        color: #64748b;

        font-size: 15px;
        line-height: 1.6;
    }

    /* =========================
       Add Doctor Button
    ========================== */

    .add-doctor-btn {
        position: relative;
        z-index: 2;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        padding: 8px 14px;

        border-radius: 8px;

        background: #0d6efd !important;
        border: 1px solid #0d6efd !important;

        color: #ffffff !important;

        font-size: 13px;
        font-weight: 500;

        box-shadow: 0 3px 8px rgba(13, 110, 253, 0.16);

        transition: all 0.2s ease;
    }

    .add-doctor-btn:hover {
        background: #0b5ed7 !important;
        border-color: #0b5ed7 !important;

        color: #ffffff !important;

        transform: translateY(-1px);

        box-shadow: 0 5px 12px rgba(13, 110, 253, 0.22);
    }

    /* =========================
       Success Message
    ========================== */

    .doctor-success-message {
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

    .doctor-success-close {
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

    .doctor-success-close:hover {
        opacity: 0.55;
    }

    /* =========================
       Doctors Card
    ========================== */

    .doctors-card {
        border: 1px solid #e5e7eb;

        border-radius: 14px;

        background: #ffffff;

        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.06);

        overflow: hidden;
    }

    .doctors-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        padding: 17px 20px;

        background: #ffffff;

        border-bottom: 1px solid #e5e7eb;
    }

    .doctors-card-title {
        display: flex;
        align-items: center;

        margin: 0;

        font-size: 18px;
        font-weight: 650;

        color: #172033;
    }

    .doctors-card-title i {
        color: #0d6efd;

        font-size: 19px;
    }

    .doctors-total {
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

        .doctors-page {
            padding-top: 20px;
        }

        .doctors-header {
            align-items: flex-start;
            flex-direction: column;

            gap: 15px;
            margin-bottom: 20px;
        }

        .doctors-title {
            font-size: 25px;
        }

        .add-doctor-btn {
            padding: 8px 13px;
        }

        .doctors-card-header {
            padding: 15px;
        }

        .doctors-card-title {
            font-size: 16px;
        }

        .doctors-total {
            font-size: 12px;
        }
    }

    @media (max-width: 575.98px) {

        .doctors-page {
            padding-top: 16px;
        }

        .doctors-card-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        .doctors-total {
            align-self: flex-start;
        }

        .doctor-success-message {
            font-size: 13px;
        }
    }
</style>


@section('content')

{{-- Page Header --}}

<div class="content-header py-0">

    <div class="container-fluid">

        <div class="doctors-page">

            <div class="doctors-header">

                <div>

                    <h1 class="doctors-title">
                        Doctors
                    </h1>

                    <p class="doctors-subtitle">
                        Manage doctors and their professional information.
                    </p>

                </div>


                @can('create doctors')

    <a href="{{ route('doctors.create') }}"
       class="btn add-doctor-btn">

        <i class="bi bi-person-plus"></i>

        Add Doctor

    </a>

@endcan

            </div>

        </div>

    </div>

</div>


{{-- Doctors Table --}}

<div class="content">

    <div class="container-fluid">


        {{-- Success Message --}}

        @if(session('success'))

            <div class="doctor-success-message"
                 id="doctorSuccessMessage">

                <span>
                    {{ session('success') }}
                </span>

                <button type="button"
                        class="doctor-success-close"
                        onclick="document.getElementById('doctorSuccessMessage').remove()">

                    &times;

                </button>

            </div>

        @endif


        {{-- Doctors Card --}}

        <div class="card doctors-card">


            {{-- Card Header --}}

            <div class="doctors-card-header">

                <h3 class="doctors-card-title">

                    <i class="bi bi-person-badge me-2"></i>

                    All Doctors

                </h3>


                <span class="doctors-total">

                    Total: {{ $doctors->total() }}

                </span>

            </div>


            {{-- Doctors Table --}}

            <div id="doctorsTable">

                @include('doctors.partials.table')

            </div>


        </div>

    </div>

</div>


{{-- Auto Hide Success Message --}}

<script>

    setTimeout(function () {

        const message = document.getElementById('doctorSuccessMessage');

        if (message) {
            message.remove();
        }

    }, 3000);

</script>


{{-- AJAX Pagination --}}

<script>

    document.addEventListener('click', function (event) {

        const link = event.target.closest('#doctorsTable .pagination a');

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

            document.getElementById('doctorsTable').innerHTML = html;

        })

        .catch(error => {

            console.error('AJAX Error:', error);

        });

    });

</script>

@endsection
