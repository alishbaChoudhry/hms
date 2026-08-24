@extends('layouts.app')

@section('title', 'Medical Care')

@section('content')

<div class="content-header py-4">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="mb-4">

            <h2 class="fw-bold mb-1">
                Medical Care
            </h2>

            <p class="text-muted mb-0">
                Manage symptoms, medical tests, medicines and patient checkups.
            </p>

        </div>


        {{-- Medical Care Cards --}}
        <div class="row g-4">


            {{-- Symptoms --}}
            <div class="col-md-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #e8f1ff;">

                    <div class="card-body text-center p-4">

                        <div class="mb-3">

                            <i class="bi bi-activity"
                               style="
                                   font-size: 45px;
                                   color: #2878d4;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold">
                            Symptoms
                        </h5>

                        <p class="text-muted">
                            Manage patient symptoms.
                        </p>

                        <a href="{{ route('symptoms.index') }}"
                         class="btn btn-primary">

                           Manage Symptoms

                         <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Medical Tests --}}
            <div class="col-md-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #e8f7ef;">

                    <div class="card-body text-center p-4">

                        <div class="mb-3">

                            <i class="bi bi-clipboard2-pulse"
                               style="
                                   font-size: 45px;
                                   color: #198754;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold">
                            Medical Tests
                        </h5>

                        <p class="text-muted">
                            Manage available medical tests.
                        </p>

                        <a href="#"
                           class="btn btn-success">

                            Manage Tests

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Medicines --}}
            <div class="col-md-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #fff6d9;">

                    <div class="card-body text-center p-4">

                        <div class="mb-3">

                            <i class="bi bi-capsule"
                               style="
                                   font-size: 45px;
                                   color: #d89b00;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold">
                            Medicines
                        </h5>

                        <p class="text-muted">
                            Manage available medicines.
                        </p>

                        <a href="#"
                           class="btn btn-warning">

                            Manage Medicines

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Checkups --}}
            <div class="col-md-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100"
                     style="background: #fdebed;">

                    <div class="card-body text-center p-4">

                        <div class="mb-3">

                            <i class="bi bi-heart-pulse"
                               style="
                                   font-size: 45px;
                                   color: #d63b4a;
                               ">
                            </i>

                        </div>

                        <h5 class="fw-bold">
                            Checkups
                        </h5>

                        <p class="text-muted">
                            Manage patient medical checkups.
                        </p>

                        <a href="#"
                           class="btn btn-danger">

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