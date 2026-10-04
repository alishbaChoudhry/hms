@extends('layouts.app')

@section('title', 'Dosages')

<style>
    /* =========================
       Dosages Page
    ========================== */

    .dosages-page {
        padding-top: 28px;
        margin-bottom: 24px;
    }


    /* =========================
       Dosages Header
    ========================== */

    .dosages-header {
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


    .dosages-header::before {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        right: -60px;
        top: -90px;

        border-radius: 50%;

        background: rgba(13, 110, 253, 0.07);
    }


    .dosages-header::after {
        content: "";

        position: absolute;

        width: 80px;
        height: 80px;

        right: 100px;
        bottom: -45px;

        border-radius: 50%;

        background: rgba(13, 110, 253, 0.04);
    }


    .dosages-header > div:first-child {
        position: relative;
        z-index: 2;
    }


    /* =========================
       Title
    ========================== */

    .dosages-title {
        margin: 0 0 7px;

        font-size: 26px;
        font-weight: 650;

        color: #172033;

        letter-spacing: -0.4px;

        line-height: 1.2;
    }


    .dosages-subtitle {
        margin: 0;

        color: #64748b;

        font-size: 15px;

        line-height: 1.6;
    }


    /* =========================
       Add Dosage Button
    ========================== */

    .add-dosage-btn {
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


    .add-dosage-btn:hover {
        background: #0b5ed7 !important;
        border-color: #0b5ed7 !important;

        color: #ffffff !important;

        transform: translateY(-1px);

        box-shadow: 0 5px 12px rgba(13, 110, 253, 0.22);
    }


    /* =========================
       Success Message
    ========================== */

    .dosage-success-message {
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


    .dosage-success-close {
        flex-shrink: 0;

        border: none;

        background: transparent;

        color: #166534;

        font-size: 21px;

        line-height: 1;

        cursor: pointer;

        padding: 0 2px;
    }


    .dosage-success-close:hover {
        opacity: 0.55;
    }


    /* =========================
       Dosages Card
    ========================== */

    .dosages-card {
        border: 1px solid #e5e7eb;

        border-radius: 14px;

        background: #ffffff;

        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.06);

        overflow: hidden;
    }


    .dosages-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        padding: 17px 20px;

        background: #ffffff;

        border-bottom: 1px solid #e5e7eb;
    }


    .dosages-card-title {
        display: flex;
        align-items: center;

        margin: 0;

        font-size: 18px;
        font-weight: 650;

        color: #172033;
    }


    .dosages-card-title i {
        color: #0d6efd;

        font-size: 19px;
    }


    .dosages-total {
        color: #64748b;

        font-size: 13px;
        font-weight: 500;

        background: #f8fafc;

        border: 1px solid #e5e7eb;

        padding: 5px 10px;

        border-radius: 7px;
    }


    /* =========================
       Table
    ========================== */

    .dosages-table {
        margin: 0;

        color: #374151;

        font-size: 14px;
    }


    .dosages-table thead th {
    background: #eef5ff !important;
    color: #334155 !important;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.35px;
    padding: 14px 14px;
    border-bottom: 1px solid #dbe7f5;
    white-space: nowrap;
}



    .dosages-table tbody td {
    padding: 14px;
    font-size: 14px;
    color: #334155;
    border-bottom: 1px solid #edf2f7;
    vertical-align: middle;
    white-space: nowrap;
}



    .dosages-table tbody tr {
    background: #ffffff;
    transition: background-color 0.15s ease;
}

.dosages-table tbody tr:hover {
    background: #f5f9ff;
}

.dosages-table tbody tr:last-child td {
    border-bottom: none;
}



    .dosage-id {
        color: #64748b;
        font-weight: 600;
    }


    .dosage-name {
        color: #172033;
        font-weight: 600;
    }


    .dosage-text {
        color: #475569;
        font-weight: 500;
    }


    /* =========================
       Actions
    ========================== */

    .dosage-actions {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 6px;
    }


    .dosage-action-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 5px;

        height: 30px;

        min-width: 62px;

        padding: 4px 9px;

        border-radius: 7px !important;

        font-size: 12px !important;

        font-weight: 500 !important;

        border: 1px solid transparent !important;

        box-shadow: none !important;

        transition: all 0.15s ease;
    }


    .dosage-action-btn:hover {
        transform: translateY(-1px);
    }


    /* Edit */

    .dosage-edit-btn {
        background: #f1f5f9 !important;

        border-color: #cbd5e1 !important;

        color: #475569 !important;
    }


    .dosage-edit-btn:hover {
        background: #e2e8f0 !important;

        border-color: #94a3b8 !important;

        color: #334155 !important;
    }


    /* Delete */

    .dosage-delete-btn {
        background: #fef2f2 !important;

        border-color: #fecaca !important;

        color: #dc2626 !important;
    }


    .dosage-delete-btn:hover {
        background: #fee2e2 !important;

        border-color: #fca5a5 !important;

        color: #b91c1c !important;
    }


    /* =========================
       Empty State
    ========================== */

    .dosages-empty {
        padding: 45px 20px !important;

        color: #94a3b8 !important;

        font-size: 14px !important;
    }


    /* =========================
       Pagination
    ========================== */

    .dosages-pagination {
        padding: 14px 20px;

        border-top: 1px solid #e5e7eb;

        background: #ffffff;
    }


    .dosages-pagination .pagination {
        margin: 0;
    }


    .dosages-pagination .page-link {
        color: #64748b;

        border: 1px solid #e5e7eb;

        font-size: 13px;

        padding: 6px 10px;
    }


    .dosages-pagination .page-item.active .page-link {
        background: #0d6efd;

        border-color: #0d6efd;

        color: #ffffff;
    }


    .dosages-pagination .page-link:hover {
        background: #f1f5f9;

        color: #0d6efd;
    }


    /* =========================
       Responsive
    ========================== */

    @media (max-width: 767.98px) {

        .dosages-page {
            padding-top: 20px;
        }

        .dosages-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 15px;
        }

        .dosages-title {
            font-size: 25px;
        }

        .add-dosage-btn {
            padding: 8px 13px;
        }

        .dosages-card-header {
            padding: 15px;
        }

        .dosages-card-title {
            font-size: 16px;
        }

        .dosages-total {
            font-size: 12px;
        }

        .dosages-table thead th {
            padding: 11px 12px;
        }

        .dosages-table tbody td {
            padding: 12px;
        }

        .dosage-action-btn {
            min-width: auto;
            padding: 6px 8px;
        }
    }


    @media (max-width: 575.98px) {

        .dosages-page {
            padding-top: 16px;
        }

        .dosages-card-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 10px;
        }

        .dosages-total {
            align-self: flex-start;
        }

        .dosage-success-message {
            font-size: 13px;
        }
    }
</style>

<style>
    .dosage-dark-text {
        color: #1f2937 !important;
        font-weight: 500;
    }
</style>


@section('content')

{{-- =========================
     Page Header
========================= --}}

<div class="content-header py-0">

    <div class="container-fluid">

        <div class="dosages-page">

            <div class="dosages-header">

                <div>

                    <h1 class="dosages-title">
                        Dosages
                    </h1>

                    <p class="dosages-subtitle">
                        Manage medicine dosage, frequency and duration.
                    </p>

                </div>


                <a href="{{ route('dosages.create') }}"
                   class="btn add-dosage-btn">

                    <i class="bi bi-plus-circle"></i>

                    Add Dosage

                </a>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     Dosages Content
========================= --}}

<div class="content">

    <div class="container-fluid">


        {{-- Success Message --}}

        @if(session('success'))

            <div class="dosage-success-message"
                 id="dosageSuccessMessage">

                <span>
                    {{ session('success') }}
                </span>

                <button type="button"
                        class="dosage-success-close"
                        onclick="document.getElementById('dosageSuccessMessage').remove()">

                    &times;

                </button>

            </div>

        @endif


        {{-- Dosages Card --}}

        <div class="card dosages-card">


            {{-- Card Header --}}

            <div class="dosages-card-header">

                <h3 class="dosages-card-title">

                    <i class="bi bi-prescription2 me-2"></i>

                    All Dosages

                </h3>


                <span class="dosages-total">

                    Total: {{ $dosages->total() }}

                </span>

            </div>


            {{-- Table --}}

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table dosages-table align-middle mb-0">

                        <thead>

                            <tr>

                                <th class="ps-4">
                                    ID
                                </th>

                                <th>
                                    Dosage
                                </th>

                                <th>
                                    Frequency
                                </th>

                                <th>
                                    Duration
                                </th>

                                <th class="text-center"
                                    style="width: 220px;">

                                    Actions

                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($dosages as $dosage)

                                <tr>

                                    <td class="ps-4">
    <span class="dosage-dark-text">
        {{ $dosage->id }}
    </span>
</td>

<td>
    <span class="dosage-dark-text">
        {{ $dosage->dosage }}
    </span>
</td>

<td>
    <span class="dosage-dark-text">
        {{ $dosage->frequency }}
    </span>
</td>

<td>
    <span class="dosage-dark-text">
        {{ $dosage->duration }}
    </span>
</td>



                                    {{-- Actions --}}
                                    <td class="text-center">

                                        <div class="dosage-actions">

                                            {{-- Edit --}}

                                            <a href="{{ route('dosages.edit', $dosage->id) }}"
                                               class="btn dosage-action-btn dosage-edit-btn">

                                                <i class="bi bi-pencil-square"></i>

                                                Edit

                                            </a>


                                            {{-- Delete --}}

                                            <form action="{{ route('dosages.destroy', $dosage->id) }}"
                                                  method="POST"
                                                  class="m-0 p-0">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn dosage-action-btn dosage-delete-btn"
                                                        onclick="return confirm('Are you sure you want to delete this dosage?');">

                                                    <i class="bi bi-trash"></i>

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center">

                                        <div class="dosages-empty">

                                            <i class="bi bi-prescription2 fs-3 d-block mb-2"></i>

                                            No dosages found.

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- Pagination --}}

            @if($dosages->hasPages())

                <div class="dosages-pagination">

                    <div class="d-flex justify-content-end">

                        {{ $dosages->links() }}

                    </div>

                </div>

            @endif


        </div>

    </div>

</div>


{{-- =========================
     Success Message Auto Hide
========================= --}}

<script>

    setTimeout(function () {

        const message =
            document.getElementById('dosageSuccessMessage');

        if (message) {
            message.remove();
        }

    }, 3000);

</script>

@endsection
