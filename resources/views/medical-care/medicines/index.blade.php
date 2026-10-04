@extends('layouts.app')

@section('title', 'Medicines')

<style>
    /* =========================
       Medicines Page
    ========================== */

    .medicines-page {
        padding-top: 28px;
        margin-bottom: 24px;
    }

    /* =========================
       Medicines Header
    ========================== */

    .medicines-header {
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

    .medicines-header::before {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        right: -60px;
        top: -90px;

        border-radius: 50%;

        background: rgba(13, 110, 253, 0.07);
    }

    .medicines-header::after {
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
       Header Content
    ========================== */

    .medicines-header > div:first-child {
        position: relative;
        z-index: 2;
    }

    .medicines-title {
        margin: 0 0 7px;

        font-size: 26px;
        font-weight: 650;

        color: #172033;

        letter-spacing: -0.4px;
        line-height: 1.2;
    }

    .medicines-subtitle {
        margin: 0;

        color: #64748b;

        font-size: 15px;
        line-height: 1.6;
    }

    /* =========================
       Add Medicine Button
    ========================== */

    .add-medicine-btn {
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

    .add-medicine-btn:hover {
        background: #0b5ed7 !important;
        border-color: #0b5ed7 !important;

        color: #ffffff !important;

        transform: translateY(-1px);

        box-shadow: 0 5px 12px rgba(13, 110, 253, 0.22);
    }

    /* =========================
       Success Message
    ========================== */

    .medicine-success-message {
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

    .medicine-success-close {
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

    .medicine-success-close:hover {
        opacity: 0.55;
    }

    /* =========================
       Medicines Card
    ========================== */

    .medicines-card {
        border: 1px solid #e5e7eb;

        border-radius: 14px;

        background: #ffffff;

        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.06);

        overflow: hidden;
    }

    .medicines-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        padding: 17px 20px;

        background: #ffffff;

        border-bottom: 1px solid #e5e7eb;
    }

    .medicines-card-title {
        display: flex;
        align-items: center;

        margin: 0;

        font-size: 18px;
        font-weight: 650;

        color: #172033;
    }

    .medicines-card-title i {
        color: #0d6efd;

        font-size: 19px;
    }

    .medicines-total {
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

        .medicines-page {
            padding-top: 20px;
        }

        .medicines-header {
            align-items: flex-start;
            flex-direction: column;

            gap: 15px;
            margin-bottom: 20px;
        }

        .medicines-title {
            font-size: 25px;
        }

        .add-medicine-btn {
            padding: 8px 13px;
        }

        .medicines-card-header {
            padding: 15px;
        }

        .medicines-card-title {
            font-size: 16px;
        }

        .medicines-total {
            font-size: 12px;
        }
    }

    @media (max-width: 575.98px) {

        .medicines-page {
            padding-top: 16px;
        }

        .medicines-card-header {
            align-items: flex-start;
            flex-direction: column;

            gap: 10px;
        }

        .medicines-total {
            align-self: flex-start;
        }

        .medicine-success-message {
            font-size: 13px;
        }
    }
</style>


@section('content')

{{-- =========================
     Page Header
========================= --}}

<div class="content-header py-0">

    <div class="container-fluid">

        <div class="medicines-page">

            <div class="medicines-header">

                <div>

                    <h1 class="medicines-title">
                        Medicines
                    </h1>

                    <p class="medicines-subtitle">
                        Manage available medicines.
                    </p>

                </div>


                <a href="{{ route('medicines.create') }}"
                   class="btn add-medicine-btn">

                    <i class="bi bi-plus-circle"></i>

                    Add Medicine

                </a>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     Medicines Content
========================= --}}

<div class="content">

    <div class="container-fluid">


        {{-- Success Message --}}

        @if(session('success'))

            <div class="medicine-success-message"
                 id="medicineSuccessMessage">

                <span>
                    {{ session('success') }}
                </span>

                <button type="button"
                        class="medicine-success-close"
                        onclick="document.getElementById('medicineSuccessMessage').remove()">

                    &times;

                </button>

            </div>

        @endif


        {{-- Medicines Card --}}

        <div class="card medicines-card">


            {{-- Card Header --}}

            <div class="medicines-card-header">

                <h3 class="medicines-card-title">

                    <i class="bi bi-capsule me-2"></i>

                    Medicines List

                </h3>


                <span class="medicines-total">

                    Total: {{ $medicines->total() }}

                </span>

            </div>


            {{-- Medicines Table --}}

            <div id="medicinesTable">

                @include('medical-care.medicines.partials.table')

            </div>


        </div>

    </div>

</div>


{{-- =========================
     Auto Hide Success Message
========================= --}}

<script>

    setTimeout(function () {

        const message =
            document.getElementById('medicineSuccessMessage');

        if (message) {
            message.remove();
        }

    }, 3000);

</script>


{{-- =========================
     AJAX Pagination
========================= --}}

<script>

    document.addEventListener('click', function (event) {

        const link =
            event.target.closest('#medicinesTable .pagination a');

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

            document.getElementById('medicinesTable').innerHTML = html;

        })

        .catch(error => {

            console.error('AJAX Error:', error);

        });

    });

</script>

@endsection
