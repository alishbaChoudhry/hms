@extends('layouts.app')

@section('title', 'Medical Care')

<style>
    /* =========================
       Medical Care Page
    ========================== */

    .medical-care-page {
        padding-top: 28px;
        margin-bottom: 24px;
    }

    /* =========================
       Medical Care Header
    ========================== */

    .medical-care-header {
        position: relative;

        display: flex;
        align-items: center;
        justify-content: space-between;

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

    .medical-care-header::before {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        right: -60px;
        top: -90px;

        border-radius: 50%;

        background: rgba(13, 110, 253, 0.07);
    }

    .medical-care-header::after {
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
       Title
    ========================== */

    .medical-care-header > div {
        position: relative;
        z-index: 2;
    }

    .medical-care-title {
        margin: 0 0 7px;

        font-size: 26px;
        font-weight: 650;

        color: #172033;

        letter-spacing: -0.4px;
        line-height: 1.2;
    }

    .medical-care-subtitle {
        margin: 0;

        color: #64748b;

        font-size: 15px;
        line-height: 1.6;
    }

    /* =========================
       Responsive
    ========================== */

    @media (max-width: 767.98px) {

        .medical-care-page {
            padding-top: 20px;
        }

        .medical-care-header {
            align-items: flex-start;
            flex-direction: column;

            gap: 15px;
            margin-bottom: 20px;
        }

        .medical-care-title {
            font-size: 25px;
        }
    }

    @media (max-width: 575.98px) {

        .medical-care-page {
            padding-top: 16px;
        }
    }
</style>


@section('content')

{{-- Page Header --}}

<div class="content-header py-0">

    <div class="container-fluid">

        <div class="medical-care-page">

            <div class="medical-care-header">

                <div>

                    <h1 class="medical-care-title">
                        Medical Care
                    </h1>

                    <p class="medical-care-subtitle">
                        Manage symptoms, medical tests, medicines, dosages and patient checkups.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- Medical Care Cards --}}

<div class="content">

    <div class="container-fluid">

        <div class="row g-3">


            {{-- Symptoms --}}
            <div class="col-md-6 col-xl">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #e8f1ff;">

                    <div class="card-body text-center p-3">

                        <div class="mb-2">

                            <i class="bi bi-activity"
                               style="
                                   font-size: 38px;
                                   color: #2878d4;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold mb-2">
                            Symptoms
                        </h5>

                        <p class="text-muted small mb-3">
                            Manage patient symptoms.
                        </p>

                        <a href="{{ route('symptoms.index') }}"
                           class="btn btn-primary btn-sm">

                            Manage Symptoms

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Medical Tests --}}
            <div class="col-md-6 col-xl">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #e8f7ef;">

                    <div class="card-body text-center p-3">

                        <div class="mb-2">

                            <i class="bi bi-clipboard2-pulse"
                               style="
                                   font-size: 38px;
                                   color: #198754;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold mb-2">
                            Medical Tests
                        </h5>

                        <p class="text-muted small mb-3">
                            Manage available medical tests.
                        </p>

                        <a href="{{ route('medical-tests.index') }}"
                           class="btn btn-success btn-sm">

                            Manage Tests

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Medicines --}}
            <div class="col-md-6 col-xl">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #fff6d9;">

                    <div class="card-body text-center p-3">

                        <div class="mb-2">

                            <i class="bi bi-capsule"
                               style="
                                   font-size: 38px;
                                   color: #d89b00;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold mb-2">
                            Medicines
                        </h5>

                        <p class="text-muted small mb-3">
                            Manage available medicines.
                        </p>

                        <a href="{{ route('medicines.index') }}"
                           class="btn btn-warning btn-sm">

                            Manage Medicines

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Dosages --}}
            <div class="col-md-6 col-xl">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #f1eaff;">

                    <div class="card-body text-center p-3">

                        <div class="mb-2">

                            <i class="bi bi-prescription2"
                               style="
                                   font-size: 38px;
                                   color: #6f42c1;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold mb-2">
                            Dosages
                        </h5>

                        <p class="text-muted small mb-3">
                            Manage medicine dosages.
                        </p>

                        <a href="{{ route('dosages.index') }}"
                           class="btn btn-sm"
                           style="
                               background: #6f42c1;
                               color: white;
                           ">

                            Manage Dosages

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Checkups --}}
            <div class="col-md-6 col-xl">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #fdebed;">

                    <div class="card-body text-center p-3">

                        <div class="mb-2">

                            <i class="bi bi-heart-pulse"
                               style="
                                   font-size: 38px;
                                   color: #d63b4a;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold mb-2">
                            Checkups
                        </h5>

                        <p class="text-muted small mb-3">
                            Manage patient medical checkups.
                        </p>

                        <a href="{{ route('checkups.index') }}"
                           class="btn btn-danger btn-sm">

                            Manage Checkups

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

@endsection
