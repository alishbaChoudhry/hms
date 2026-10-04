@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    /* =========================
   Dashboard Top Navigation
========================== */

.dashboard-content {
        padding-top: 32px;
    }
.dashboard-topbar {
    padding: 4px 0 14px;
}

.dashboard-breadcrumb {
    margin: 0;
    padding: 0;
    background: transparent;
    font-size: 13px;
}

.dashboard-breadcrumb a {
    color: #64748b;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}

.dashboard-breadcrumb a:hover {
    color: #0d6efd;
}

.dashboard-breadcrumb .active {
    color: #94a3b8;
}


    /* =========================
       Welcome Section
    ========================== */

    .dashboard-welcome {
    position: relative;
    background: linear-gradient(135deg, #ffffff 0%, #f5f9ff 100%);
    border: 1px solid #e3eaf3;
    border-radius: 16px;
    padding: 26px 30px;
    margin-bottom: 24px;
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
    overflow: hidden;
}

.dashboard-welcome::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    right: -60px;
    top: -90px;
    border-radius: 50%;
    background: rgba(13, 110, 253, 0.07);
}

.dashboard-welcome::after {
    content: "";
    position: absolute;
    width: 80px;
    height: 80px;
    right: 90px;
    bottom: -45px;
    border-radius: 50%;
    background: rgba(13, 110, 253, 0.04);
}

.dashboard-welcome h2 {
    position: relative;
    z-index: 2;
    margin: 0 0 8px;
    font-size: 26px;
    font-weight: 650;
    color: #172033;
    letter-spacing: -0.4px;
}

.dashboard-welcome p {
    position: relative;
    z-index: 2;
    margin: 0;
    color: #64748b;
    font-size: 15px;
    line-height: 1.6;
}



    /* =========================
       Statistics Cards
    ========================== */

    .dashboard-stat-col {
        margin-bottom: 24px;
    }

    .dashboard-box {
        position: relative;
        min-height: 190px;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
        transition: all 0.25s ease;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .dashboard-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 9px 22px rgba(0, 0, 0, 0.11);
    }

    .dashboard-box .inner {
        padding: 22px 24px 12px;
        padding-right: 105px;
    }

    .dashboard-box .inner h3 {
        font-size: 34px;
        font-weight: 700;
        margin: 0 0 6px;
        color: #172033;
        line-height: 1.2;
    }

    .dashboard-box .inner p {
        font-size: 16px;
        margin: 0;
        color: #253047;
        line-height: 1.45;
    }

    .dashboard-box .small-box-icon {
        position: absolute;
        top: 28px;
        right: 24px;
        font-size: 58px;
        opacity: 0.82;
        line-height: 1;
    }

    .dashboard-box .small-box-footer {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        background: transparent;
        padding: 11px 20px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: background 0.2s ease;
    }

    .dashboard-box .small-box-footer:hover {
        background: rgba(255, 255, 255, 0.25);
    }


    /* =========================
       Bottom Cards
    ========================== */

    .dashboard-bottom-col {
        margin-bottom: 24px;
    }

    .dashboard-card {
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        background: #fff;
    }

    .dashboard-card .card-header {
        background: #ffffff;
        padding: 17px 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .dashboard-card .card-title {
        font-size: 18px;
        font-weight: 650;
        color: #172033;
    }

    .dashboard-card .card-body {
        padding: 20px;
    }


    /* =========================
       Hospital Overview
    ========================== */

    .overview-item {
        height: 100%;
        padding: 14px 10px;
    }

    .overview-item i {
        font-size: 40px;
    }

    .overview-item h5 {
        margin-top: 10px;
        margin-bottom: 8px;
        font-weight: 600;
        color: #1f2937;
    }

    .overview-item p {
        color: #6b7280;
        margin-bottom: 0;
        line-height: 1.5;
        font-size: 14px;
    }


    /* =========================
       Quick Actions
    ========================== */

    .quick-btn {
        border-radius: 9px;
        padding: 11px 14px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .quick-btn:hover {
        transform: translateY(-1px);
    }


    /* =========================
       Responsive
    ========================== */

    @media (max-width: 991.98px) {

        
    }


    @media (max-width: 767.98px) {

        .dashboard-page-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 18px;
        }

        .dashboard-page-title {
            font-size: 28px;
        }

        .dashboard-breadcrumb {
            float: none !important;
        }

        .dashboard-welcome {
            padding: 18px;
            margin-bottom: 20px;
        }

        .dashboard-welcome h2 {
            font-size: 21px;
        }

        .dashboard-welcome p {
            font-size: 14px;
        }

        .dashboard-box .inner {
            padding-right: 90px;
        }

        .dashboard-box .small-box-icon {
            right: 18px;
            font-size: 50px;
        }
    }


    @media (max-width: 575.98px) {

        .dashboard-page-title {
            font-size: 25px;
        }

        .dashboard-box {
            min-height: 175px;
        }

        .dashboard-box .inner h3 {
            font-size: 30px;
        }

        .dashboard-box .inner p {
            font-size: 15px;
        }

        .dashboard-card .card-header {
            padding: 15px;
        }

        .dashboard-card .card-body {
            padding: 15px;
        }
    }
</style>



<div class="content dashboard-content">

    <div class="container-fluid">

        {{-- Welcome --}}

        
        <div class="dashboard-welcome">

            <h2>
                Welcome to Hospital Management System
            </h2>

            <p>
                Manage patients, doc
                tors, appointments, checkups
                from one place.
            </p>

        </div>


        
{{-- Statistics --}}
<div class="row">

    {{-- Patients --}}
    <div class="{{ auth()->user()->hasRole('Admin') ? 'col-lg-3' : 'col-lg-4' }} col-md-6 col-12 dashboard-stat-col">

        <div class="small-box dashboard-box"
             style="background: #e8f1ff;">

            <div class="inner">

                <h3>
                    {{ $patientsCount ?? 0 }}
                </h3>

                <p>
                    Total Patients
                </p>

            </div>

            <i class="bi bi-people-fill small-box-icon"
               style="color: #2878d4;"></i>

            <a href="{{ route('patients') }}"
               class="small-box-footer"
               style="color: #2878d4;">

                View Patients
                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    {{-- Doctors --}}
    @if(auth()->user()->hasRole('Admin'))

        <div class="col-lg-3 col-md-6 col-12 dashboard-stat-col">

            <div class="small-box dashboard-box"
                 style="background: #e8f7ef;">

                <div class="inner">

                    <h3>
                        {{ $doctorsCount ?? 0 }}
                    </h3>

                    <p>
                        Total Doctors
                    </p>

                </div>

                <i class="bi bi-person-badge-fill small-box-icon"
                   style="color: #198754;"></i>

                <a href="{{ route('doctors.index') }}"
                   class="small-box-footer"
                   style="color: #198754;">

                    View Doctors
                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    @endif


    {{-- Appointments --}}
    <div class="{{ auth()->user()->hasRole('Admin') ? 'col-lg-3' : 'col-lg-4' }} col-md-6 col-12 dashboard-stat-col">

        <div class="small-box dashboard-box"
             style="background: #fff6d9;">

            <div class="inner">

                <h3>
                    {{ $appointmentsCount ?? 0 }}
                </h3>

                <p>
                    Total Appointments
                </p>

            </div>

            <i class="bi bi-calendar-check-fill small-box-icon"
               style="color: #d89b00;"></i>

            <a href="{{ route('appointments.index') }}"
               class="small-box-footer"
               style="color: #d89b00;">

                View Appointments
                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    {{-- Checkups --}}
    <div class="{{ auth()->user()->hasRole('Admin') ? 'col-lg-3' : 'col-lg-4' }} col-md-6 col-12 dashboard-stat-col">

        <div class="small-box dashboard-box"
             style="background: #fdebed;">

            <div class="inner">

                <h3>
                    {{ $checkupsCount ?? 0 }}
                </h3>

                <p>
                    Total Checkups
                </p>

            </div>

            <i class="bi bi-clipboard2-pulse-fill small-box-icon"
               style="color: #d63b4a;"></i>

            <a href="{{ route('checkups.index') }}"
               class="small-box-footer"
               style="color: #d63b4a;">

                View Checkups
                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>

</div>



        {{-- Bottom Section --}}
        <div class="row">


            {{-- Hospital Overview --}}
            <div class="col-lg-8 dashboard-bottom-col">


                <div class="card dashboard-card h-100">

                    <div class="card-header">

                        <h3 class="card-title mb-0">

                            <i class="bi bi-hospital me-2"></i>

                            Hospital Overview

                        </h3>

                    </div>


                    <div class="card-body">

                        <div class="row text-center">


                            <div class="col-md-4">

                                <div class="overview-item">

                                    <i class="bi bi-heart-pulse text-danger"></i>

                                    <h5>
                                        Quality Healthcare
                                    </h5>

                                    <p>
                                        Providing better healthcare services.
                                    </p>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="overview-item">

                                    <i class="bi bi-person-check text-success"></i>

                                    <h5>
                                        Professional Doctors
                                    </h5>

                                    <p>
                                        Manage doctors and their information.
                                    </p>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="overview-item">

                                    <i class="bi bi-clipboard2-pulse text-primary"></i>

                                    <h5>
                                        Patient Care
                                    </h5>

                                    <p>
                                        Keep patient records organized.
                                    </p>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>


            {{-- Quick Actions --}}
            <div class="col-lg-4 dashboard-bottom-col">


                <div class="card dashboard-card h-100">

                    <div class="card-header">

                        <h3 class="card-title mb-0">

                            <i class="bi bi-lightning-charge me-2"></i>

                            Quick Actions

                        </h3>

                    </div>


                    <div class="card-body">


                        <a href="{{ route('patients') }}"
                           class="btn btn-primary w-100 mb-3 quick-btn">

                            <i class="bi bi-person-plus me-2"></i>

                            Manage Patients

                        </a>


                        <a href="{{ route('doctors.index') }}"
                           class="btn btn-success w-100 mb-3 quick-btn">

                            <i class="bi bi-person-badge me-2"></i>

                            Manage Doctors

                        </a>


                        <a href="{{ route('appointments.create') }}"
                         class="btn btn-warning w-100 quick-btn">

                         <i class="bi bi-calendar-plus me-2"></i>

                         Add Appointment

                        </a>


                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

@endsection