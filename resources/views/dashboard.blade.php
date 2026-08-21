@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard-welcome {
        background: linear-gradient(135deg, #ffffff, #f4f8fb);
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .dashboard-welcome h2 {
        margin: 0 0 8px;
        font-size: 28px;
        font-weight: 600;
        color: #1f2937;
    }

    .dashboard-welcome p {
        margin: 0;
        color: #6b7280;
        font-size: 16px;
    }

    .dashboard-box {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        transition: 0.2s;
    }

    .dashboard-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.12);
    }

    .dashboard-box .inner {
        padding: 20px;
    }

    .dashboard-box .inner h3 {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .dashboard-box .inner p {
        font-size: 16px;
        margin-bottom: 0;
    }

    .dashboard-box .small-box-icon {
        font-size: 60px;
        opacity: 0.25;
    }
    .dashboard-box .small-box-footer {
    background: transparent;
    padding: 10px 15px;
    text-decoration: none;
}

.dashboard-box .small-box-footer:hover {
    background: rgba(255, 255, 255, 0.08);
}

    .dashboard-card {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .dashboard-card .card-header {
        background: #ffffff;
        padding: 16px 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .dashboard-card .card-title {
        font-size: 18px;
        font-weight: 600;
        color: #1f2937;
    }

    .overview-item {
        padding: 20px 10px;
    }

    .overview-item i {
        font-size: 42px;
    }

    .overview-item h5 {
        margin-top: 12px;
        font-weight: 600;
        color: #1f2937;
    }

    .overview-item p {
        color: #6b7280;
        margin-bottom: 0;
    }

    .quick-btn {
        border-radius: 8px;
        padding: 11px;
        font-size: 15px;
        font-weight: 500;
    }
</style>


{{-- Page Header --}}
<div class="content-header">
    <div class="container-fluid">

        <div class="row mb-3">

            <div class="col-sm-6">
                <h1 class="m-0 fw-semibold">
                    Dashboard
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Dashboard
                    </li>

                </ol>
            </div>

        </div>

    </div>
</div>


<div class="content">

    <div class="container-fluid">


        {{-- Welcome --}}
        <div class="dashboard-welcome">

            <h2>
                Welcome to Hospital Management System
            </h2>

            <p>
                Manage patients, doctors, appointments, departments
                and medicines from one place.
            </p>

        </div>


        {{-- Statistics --}}
        <div class="row">


            {{-- Patients --}}
            <div class="col-lg-3 col-md-6 col-12 mb-4">

                <div class="small-box text-bg-primary dashboard-box">

                    <div class="inner">

                        <h3>
                            {{ $patientsCount ?? 0 }}
                        </h3>

                        <p>
                            Total Patients
                        </p>

                    </div>

                    <i class="bi bi-people-fill small-box-icon"></i>

                    <a href="{{ route('patients') }}"
                       class="small-box-footer">

                        View Patients
                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>


            {{-- Doctors --}}
            <div class="col-lg-3 col-md-6 col-12 mb-4">

                <div class="small-box text-bg-success dashboard-box">

                    <div class="inner">

                        <h3>
                            {{ $doctorsCount ?? 0 }}
                        </h3>

                        <p>
                            Total Doctors
                        </p>

                    </div>

                    <i class="bi bi-person-badge-fill small-box-icon"></i>

                    <a href="{{ route('doctors.index') }}"
                       class="small-box-footer">

                        View Doctors
                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>


            {{-- Appointments --}}
            <div class="col-lg-3 col-md-6 col-12 mb-4">

                <div class="small-box text-bg-warning dashboard-box">

                    <div class="inner">

                        <h3>
                       {{ $appointmentsCount ?? 0 }}
                        </h3>

                        <p>
                            Appointments
                        </p>

                    </div>

                    <i class="bi bi-calendar-check-fill small-box-icon"></i>

                    <a href="{{ route('appointments.index') }}"
                     class="small-box-footer">

                      View Appointments
                      <i class="bi bi-arrow-right"></i>

                      </a>

                </div>

            </div>


            {{-- Departments --}}
            <div class="col-lg-3 col-md-6 col-12 mb-4">

                <div class="small-box text-bg-danger dashboard-box">

                    <div class="inner">

                        <h3>
                            0
                        </h3>

                        <p>
                            Departments
                        </p>

                    </div>

                    <i class="bi bi-building-fill small-box-icon"></i>

                    <a href="#"
                       class="small-box-footer">

                        View Departments
                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>


        {{-- Bottom Section --}}
        <div class="row">


            {{-- Hospital Overview --}}
            <div class="col-lg-8 mb-4">

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
            <div class="col-lg-4 mb-4">

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