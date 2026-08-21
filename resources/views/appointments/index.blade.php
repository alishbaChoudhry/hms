@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

{{-- Page Header --}}
<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">
                    Appointments
                </h1>

                <p class="mb-0 text-muted"
                   style="font-size: 14px;">
                    Manage patient appointments and schedules.
                </p>
            </div>

            <div>
                <a href="{{ route('appointments.create') }}"
                   class="btn btn-primary px-3">

                    <i class="bi bi-calendar-plus me-1"></i>
                    Add Appointment

                </a>
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


        <div class="card shadow-sm border-0"
             style="border-radius: 10px; overflow: hidden;">

            {{-- Card Header --}}
            <div class="card-header bg-white py-3 px-4"
                 style="border-bottom: 1px solid #e5e7eb;">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title mb-0"
                        style="font-size: 18px; font-weight: 500; color: #1f2937;">

                        <i class="bi bi-calendar-check me-2"
                           style="color: #0d6efd;"></i>

                        All Appointments

                    </h3>

                    <span class="text-muted"
                          style="font-size: 14px;">

                        Total: {{ $appointments->total() }}

                    </span>

                </div>

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