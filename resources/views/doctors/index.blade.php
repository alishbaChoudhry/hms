@extends('layouts.app')

@section('title', 'Doctors')

<style>
    .doctor-success-message {
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

    .doctor-success-close {
        border: none;
        background: transparent;
        color: #0f5132;

        font-size: 22px;
        line-height: 1;

        cursor: pointer;
        padding: 0;
    }

    .doctor-success-close:hover {
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
                Doctors
            </h1>

            <p class="mb-0 text-muted"
               style="font-size: 14px;">
                Manage doctors and their professional information.
            </p>
        </div>

        <div>
            <a href="{{ route('doctors.create') }}"
               class="btn btn-primary px-3">

                <i class="bi bi-person-plus me-1"></i>
                Add Doctor

            </a>
        </div>

    </div>

</div>


</div>

{{-- Doctors Table --}}

<div class="content pt-2">
    <div class="container-fluid">


    @if(session('success'))
    <div class="doctor-success-message" id="doctorSuccessMessage">
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


    <div class="card shadow-sm border-0"
         style="border-radius: 10px; overflow: hidden;">

        <div class="card-header bg-white py-3 px-4"
             style="border-bottom: 1px solid #e5e7eb;">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="card-title mb-0"
                    style="font-size: 18px; font-weight: 500; color: #1f2937;">

                    <i class="bi bi-person-badge me-2"
                       style="color: #0d6efd;"></i>

                    All Doctors

                </h3>

                <span class="text-muted"
                      style="font-size: 14px;">
                    Total: {{ $doctors->total() }}
                </span>

            </div>

        </div>

{{-- Doctors Table --}}
<div id="doctorsTable">

    @include('doctors.partials.table')

</div>
        </div>

    </div>

</div>

</div>


<script>
    setTimeout(function () {
        const message = document.getElementById('doctorSuccessMessage');

        if (message) {
            message.remove();
        }
    }, 3000);
</script>

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
