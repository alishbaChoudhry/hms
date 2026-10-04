@extends('layouts.app')

@section('title', 'Appointments')

@section('content')


<style>
    /* =========================
       Appointments Page
    ========================== */

    .appointments-page {
        padding-top: 28px;
        margin-bottom: 24px;
    }

    /* =========================
       Appointments Header
    ========================== */

    .appointments-header {
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

    .appointments-header::before {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        right: -60px;
        top: -90px;

        border-radius: 50%;

        background: rgba(13, 110, 253, 0.07);
    }

    .appointments-header::after {
        content: "";

        position: absolute;

        width: 80px;
        height: 80px;

        right: 100px;
        bottom: -45px;

        border-radius: 50%;

        background: rgba(13, 110, 253, 0.04);
    }

    .appointments-header > div:first-child {
        position: relative;
        z-index: 2;
    }

    /* =========================
       Title
    ========================== */

    .appointments-title {
        margin: 0 0 7px;

        font-size: 26px;
        font-weight: 650;

        color: #172033;

        letter-spacing: -0.4px;
        line-height: 1.2;
    }

    .appointments-subtitle {
        margin: 0;

        color: #64748b;

        font-size: 15px;
        line-height: 1.6;
    }

    /* =========================
       Add Appointment Button
    ========================== */

    .add-appointment-btn {
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

    .add-appointment-btn:hover {
        background: #0b5ed7 !important;
        border-color: #0b5ed7 !important;

        color: #ffffff !important;

        transform: translateY(-1px);

        box-shadow: 0 5px 12px rgba(13, 110, 253, 0.22);
    }

    /* =========================
       Appointments Card
    ========================== */

    .appointments-card {
        border: 1px solid #e5e7eb;

        border-radius: 14px;

        background: #ffffff;

        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.06);

        overflow: hidden;
    }

    .appointments-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 17px 20px;
    background: #ffffff;
    border-bottom: 1px solid #e5e7eb;
}


    .appointments-card-title {
        display: flex;
        align-items: center;

        margin: 0;

        font-size: 18px;
        font-weight: 650;

        color: #172033;
    }

    .appointments-card-title i {
        color: #0d6efd;

        font-size: 19px;
    }

    .appointments-total {
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

        .appointments-page {
            padding-top: 20px;
        }

        .appointments-header {
            align-items: flex-start;
            flex-direction: column;

            gap: 15px;
            margin-bottom: 20px;
        }

        .appointments-title {
            font-size: 25px;
        }

        .add-appointment-btn {
            padding: 8px 13px;
        }

        .appointments-card-header {
            padding: 15px;
        }

        .appointments-card-title {
            font-size: 16px;
        }

        .appointments-total {
            font-size: 12px;
        }
    }

    @media (max-width: 575.98px) {

        .appointments-page {
            padding-top: 16px;
        }

        
    }
</style>



{{-- Page Header --}}
<div class="content-header py-0">

    <div class="container-fluid">

        <div class="appointments-page">

            <div class="appointments-header">

                <div>

                    <h1 class="appointments-title">
                        Appointments
                    </h1>

                    <p class="appointments-subtitle">
                        Manage patient appointments and schedules.
                    </p>

                </div>


                @can('create appointments')

                    <a href="{{ route('appointments.create') }}"
                       class="btn add-appointment-btn">

                        <i class="bi bi-calendar-plus"></i>

                        Add Appointment

                    </a>

                @endcan

            </div>

        </div>

    </div>

</div>



{{-- Appointments Table --}}
<div class="content pt-2">
    <div class="container-fluid">

        {{-- Success Message --}}
        @if(session('success'))

            <div id="appointmentSuccessMessage"
                 style="
                    width: 600px;
                    max-width: 100%;
                    padding: 12px 16px;
                    margin-bottom: 20px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    background: #d1e7dd;
                    border: 1px solid #a3cfbb;
                    border-radius: 7px;
                    color: #0f5132;
                    font-size: 14px;
                    font-weight: 500;
                 ">

                <span>
                    {{ session('success') }}
                </span>

                <button type="button"
                        onclick="document.getElementById('appointmentSuccessMessage').remove()"
                        style="
                            border: none;
                            background: transparent;
                            color: #0f5132;
                            font-size: 22px;
                            line-height: 1;
                            cursor: pointer;
                            padding: 0;
                        ">

                    &times;

                </button>

            </div>

        @endif


        <div class="card appointments-card">



           {{-- Card Header --}}
    <div class="appointments-card-header">

        <h3 class="appointments-card-title">
            <i class="bi bi-calendar-check me-2"></i>
            All Appointments
        </h3>

        <span class="appointments-total">
            Total: {{ $appointments->total() }}
        </span>

    </div>



            {{-- Appointments Table --}}
<div id="appointmentsTable">

    @include('appointments.partials.table')

</div>

        </div>

    </div>
</div>


{{-- Auto Hide Success Message --}}
<script>

    setTimeout(function () {

        const message =
            document.getElementById('appointmentSuccessMessage');

        if (message) {
            message.remove();
        }

    }, 3000);
    

</script>
<script>
    document.addEventListener('click', function (event) {

        const link = event.target.closest('#appointmentsTable .pagination a');

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

            document.getElementById('appointmentsTable').innerHTML = html;

        })
        .catch(error => {
            console.error('AJAX Error:', error);
        });

    });
</script>

@endsection