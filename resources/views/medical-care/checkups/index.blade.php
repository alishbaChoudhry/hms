@extends('layouts.app')

@section('title', 'Checkups')

@section('content')

<div class="content-header py-0">

    <div class="container-fluid">

        {{-- =========================
             Page Header
        ========================= --}}
        <div class="checkups-page">

            <div class="checkups-header">

                <div>
                    <h1 class="checkups-title">
                        Checkups
                    </h1>

                    <p class="checkups-subtitle">
                        Manage patient checkups.
                    </p>
                </div>

                @can('create checkups')
                    <a href="{{ route('checkups.create') }}"
                       class="btn add-checkup-btn">
                        <i class="bi bi-plus-circle"></i>
                        Add Checkup
                    </a>
                @endcan

            </div>

        </div>


        {{-- =========================
             Success Message
        ========================= --}}
        @if(session('success'))

            <div class="checkup-success-message"
                 id="checkupSuccessMessage">

                <span>
                    {{ session('success') }}
                </span>

                <button type="button"
                        class="checkup-success-close"
                        onclick="document.getElementById('checkupSuccessMessage').remove()">
                    &times;
                </button>

            </div>

        @endif


        {{-- =========================
             Checkups Card
        ========================= --}}
        <div class="card checkups-card">

            {{-- Card Header --}}
            <div class="checkups-card-header">

                <h3 class="checkups-card-title">
                    <i class="bi bi-clipboard2-pulse me-2"></i>
                    All Checkups
                </h3>

                <span class="checkups-total">
                    Total: {{ $checkups->total() }}
                </span>

            </div>


            {{-- =========================
                 Table
            ========================= --}}
            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover checkups-table align-middle mb-0">

                        <thead>

                            <tr>

                                <th>
                                    Patient
                                </th>

                                <th>
                                    Doctor
                                </th>

                                <th>
                                    Follow-up Date
                                </th>

                                <th>
                                    Diagnosis
                                </th>

                                <th class="text-center checkup-actions-column">
                                 Actions
                                 </th>


                            </tr>

                        </thead>


                        <tbody>

                            @forelse($checkups as $checkup)

                                <tr>

                                    {{-- Patient --}}
                                    <td>
                                        {{ $checkup->patient->name }}
                                    </td>


                                    {{-- Doctor --}}
                                    <td>
                                        {{ $checkup->doctor->name }}
                                    </td>


                                    {{-- Follow-up --}}
                                    <td>

                                        @if($checkup->follow_up_date)

                                            {{ \Carbon\Carbon::parse($checkup->follow_up_date)->format('d M Y') }}

                                        @else

                                            <span class="text-muted">
                                                Not set
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Diagnosis --}}
                                    <td>

                                        @if($checkup->diagnosis)

                                            {{ \Illuminate\Support\Str::limit($checkup->diagnosis, 40) }}

                                        @else

                                            <span class="text-muted">
                                                Not provided
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Actions --}}
                                    <td class="text-center checkup-actions-column">

    <div class="checkup-actions">

        {{-- View --}}

       @can('view checkups')

    <button type="button"
            class="btn checkup-action-btn checkup-view-btn"
            data-bs-toggle="modal"
            data-bs-target="#checkupModal{{ $checkup->id }}">

        <i class="bi bi-eye me-1"></i>
        View

    </button>

@endcan


        {{-- Edit --}}

        @can('edit checkups')

            <a href="{{ route('checkups.edit', $checkup->id) }}"
               class="btn checkup-action-btn checkup-edit-btn">

                <i class="bi bi-pencil-square me-1"></i>
                Edit

            </a>

        @endcan


        {{-- Delete --}}

        @can('delete checkups')

            <form action="{{ route('checkups.destroy', $checkup->id) }}"
                  method="POST"
                  class="m-0 p-0 d-flex align-items-center">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn checkup-action-btn checkup-delete-btn"
                        onclick="return confirm('Are you sure you want to delete this checkup?')">

                    <i class="bi bi-trash me-1"></i>
                    Delete

                </button>

            </form>

        @endcan

    </div>

</td>


                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center py-5 text-muted">

                                        No checkups found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>




            {{-- =========================
                 Pagination
            ========================= --}}
            @if($checkups->hasPages())

                <div class="card-footer bg-white border-0 py-3">

                    {{ $checkups->links() }}

                </div>

            @endif

        </div>


        {{-- =========================
             MODALS
             IMPORTANT:
             Modal is OUTSIDE table
        ========================= --}}
        @foreach($checkups as $checkup)

            <div class="modal fade"
                 id="checkupModal{{ $checkup->id }}"
                 tabindex="-1"
                 aria-hidden="true">

                <div class="modal-dialog modal-md modal-dialog-centered">

                    <div class="modal-content border-0 shadow">

                        {{-- Modal Header --}}
                        <div class="modal-header py-2 px-3">

                            <div>

                                <h6 class="modal-title fw-bold mb-0">

                                    <i class="bi bi-clipboard2-pulse text-primary me-1"></i>

                                    Checkup Details

                                </h6>

                                <small class="text-muted">
                                    Patient Medical Record
                                </small>

                            </div>

                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close">
                            </button>

                        </div>


                        {{-- Modal Body --}}
                        <div class="modal-body p-3">


                            {{-- Patient Information --}}
                            <div class="border rounded p-2 mb-2">

                                <div class="row g-2">

                                    <div class="col-6">

                                        <small class="text-muted d-block">
                                            Patient
                                        </small>

                                        <span class="fw-semibold small">
                                            {{ $checkup->patient->name }}
                                        </span>

                                    </div>


                                    <div class="col-6">

                                        <small class="text-muted d-block">
                                            Doctor
                                        </small>

                                        <span class="fw-semibold small">
                                            {{ $checkup->doctor->name }}
                                        </span>

                                    </div>


                                    <div class="col-6">

                                        <small class="text-muted d-block">
                                            Follow-up
                                        </small>

                                        <span class="fw-semibold small">

                                            @if($checkup->follow_up_date)

                                                {{ \Carbon\Carbon::parse($checkup->follow_up_date)->format('d M Y') }}

                                            @else

                                                <span class="text-muted">
                                                    Not set
                                                </span>

                                            @endif

                                        </span>

                                    </div>


                                    <div class="col-6">

                                        <small class="text-muted d-block">
                                            Diagnosis
                                        </small>

                                        <span class="fw-semibold small">
                                            {{ $checkup->diagnosis ?: 'Not provided' }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            {{-- Symptoms --}}
                            <div class="border rounded p-2 mb-2">

                                <h6 class="fw-bold small mb-1">

                                    <i class="bi bi-thermometer-half text-primary me-1"></i>

                                    Symptoms

                                </h6>


                                @forelse($checkup->symptoms as $symptom)

                                    <span class="badge bg-primary me-1 mb-1">
                                        {{ $symptom->name }}
                                    </span>

                                @empty

                                    <span class="text-muted small">
                                        No symptoms added.
                                    </span>

                                @endforelse

                            </div>


                            {{-- Medicines --}}
<div class="border rounded p-2 mb-2">

    <h6 class="fw-bold small mb-1">

        <i class="bi bi-capsule text-primary me-1"></i>

        Medicines

    </h6>


    {{-- Existing Medicines --}}
    @foreach($checkup->medicines as $medicine)

        <div class="py-1 border-bottom">

            <div class="fw-semibold small">
                {{ $medicine->name }}
            </div>

            <div class="text-muted"
                 style="font-size: 12px;">

                <span class="me-2">
                    <strong>Dosage:</strong>
                    {{ $medicine->pivot->dosage ?: 'N/A' }}
                </span>

                <span class="me-2">
                    <strong>Frequency:</strong>
                    {{ $medicine->pivot->frequency ?: 'N/A' }}
                </span>

                <span>
                    <strong>Duration:</strong>
                    {{ $medicine->pivot->duration ?: 'N/A' }}
                </span>

            </div>

        </div>

    @endforeach


    {{-- Manual Medicines --}}
    @foreach($manualMedicines->get($checkup->id, collect()) as $manualMedicine)

        <div class="py-1 border-bottom">

            <div class="fw-semibold small">
                {{ $manualMedicine->custom_medicine_name }}
            </div>

            <div class="text-muted"
                 style="font-size: 12px;">

                <span class="me-2">
                    <strong>Dosage:</strong>
                    {{ $manualMedicine->dosage ?: 'N/A' }}
                </span>

                <span class="me-2">
                    <strong>Frequency:</strong>
                    {{ $manualMedicine->frequency ?: 'N/A' }}
                </span>

                <span>
                    <strong>Duration:</strong>
                    {{ $manualMedicine->duration ?: 'N/A' }}
                </span>

            </div>

        </div>

    @endforeach


    {{-- No Medicines --}}
    @if(
        $checkup->medicines->isEmpty() &&
        ($manualMedicines->get($checkup->id)?->isEmpty() ?? true)
    )

        <span class="text-muted small">
            No medicines added.
        </span>

    @endif

</div>


                            {{-- Doctor Notes --}}
                            <div class="border rounded p-2">

                                <h6 class="fw-bold small mb-1">

                                    <i class="bi bi-journal-text text-primary me-1"></i>

                                    Doctor's Notes

                                </h6>


                                @if($checkup->notes)

                                    <p class="mb-0 text-muted small">
                                        {{ $checkup->notes }}
                                    </p>

                                @else

                                    <span class="text-muted small">
                                        No notes provided.
                                    </span>

                                @endif

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

{{-- ================================================= --}}
{{-- SUCCESS MESSAGE STYLE --}}
{{-- ================================================= --}}

<style>

.checkup-success-message {

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
}


.checkup-success-close {

    border: none;
    background: transparent;

    color: #0f5132;

    font-size: 22px;
    line-height: 1;

    cursor: pointer;

    padding: 0;
}


.checkup-success-close:hover {

    opacity: 0.6;

}

</style>

{{-- =========================
     CSS
========================= --}}
<style>

.checkups-page {
    width: 100%;
    padding-top: 28px;
    margin-bottom: 24px;
}

.checkups-header {
    position: relative;
    width: 100%;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 24px;
    padding: 28px 32px;

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

.checkups-header::before {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    right: -60px;
    top: -90px;

    border-radius: 50%;

    background: rgba(13, 110, 253, 0.07);
}

.checkups-header::after {
    content: "";

    position: absolute;

    width: 80px;
    height: 80px;

    right: 100px;
    bottom: -45px;

    border-radius: 50%;

    background: rgba(13, 110, 253, 0.04);
}

.checkups-header > div:first-child {
    position: relative;
    z-index: 2;
}

.checkups-title {
    margin: 0 0 7px;

    font-size: 27px;
    font-weight: 650;

    color: #172033;

    letter-spacing: -0.4px;
    line-height: 1.2;
}

.checkups-subtitle {
    margin: 0;

    color: #64748b;

    font-size: 15px;
    line-height: 1.6;
}

.add-checkup-btn {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    padding: 9px 16px;

    border-radius: 8px;

    background: #0d6efd !important;
    border: 1px solid #0d6efd !important;

    color: #fff !important;

    font-size: 13px;
    font-weight: 500;

    box-shadow: 0 3px 8px rgba(13, 110, 253, .16);

    transition: .2s ease;
}

.add-checkup-btn:hover {
    background: #0b5ed7 !important;
    border-color: #0b5ed7 !important;

    transform: translateY(-1px);
}


/* Card */

.checkups-card {
    width: 100%;

    border: 1px solid #e5e7eb;
    border-radius: 14px;

    background: #fff;

    box-shadow: 0 4px 12px rgba(15, 23, 42, .06);

    overflow: hidden;

    margin-bottom: 24px;
}


/* Card Header */

.checkups-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    min-height: 65px;

    padding: 17px 22px;

    background: #fff;

    border-bottom: 1px solid #e5e7eb;
}

.checkups-card-title {
    display: flex;
    align-items: center;

    margin: 0;

    font-size: 18px;
    font-weight: 650;

    color: #172033;
}

.checkups-card-title i {
    color: #0d6efd;
    font-size: 19px;
}

.checkups-total {
    color: #64748b;

    font-size: 13px;
    font-weight: 500;

    background: #f8fafc;

    border: 1px solid #e5e7eb;

    padding: 5px 10px;

    border-radius: 7px;
}


/* Table */

.checkups-table {
    width: 100%;
    margin: 0;

    color: #1f2937;

    font-size: 14px;

    table-layout: auto;
}

.checkups-table thead th {
    background: #eef5ff !important;
    color: #334155 !important;

    font-size: 12px;
    font-weight: 650;

    text-transform: uppercase;
    letter-spacing: .3px;

    padding: 14px 16px;

    border-bottom: 1px solid #dbe7f5;

    white-space: nowrap;
}


.checkups-table tbody td {
    padding: 15px 16px;

    color: #1f2937 !important;

    font-size: 13.5px;
    font-weight: 500;

    border-bottom: 1px solid #f1f5f9;

    vertical-align: middle;
}

.checkups-table tbody tr:hover {
    background: #f8fbff;
}

.checkups-table tbody tr:last-child td {
    border-bottom: 1px solid #edf2f7;
}


.checkups-table .text-muted {
    color: #64748b !important;
}


/* =========================
   Checkups Actions
========================= */

.checkup-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.checkup-action-btn {
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

.checkup-action-btn:hover {
    transform: translateY(-1px);
}


/* =========================
   View - Blue
========================= */

.checkup-view-btn {
    background: #eff6ff !important;
    border-color: #dbeafe !important;
    color: #2563eb !important;
}

.checkup-view-btn:hover {
    background: #dbeafe !important;
    color: #1d4ed8 !important;
}


/* =========================
   Edit - Neutral
========================= */

.checkup-edit-btn {
    background: #f1f5f9 !important;
    border-color: #cbd5e1 !important;
    color: #475569 !important;
}

.checkup-edit-btn:hover {
    background: #e2e8f0 !important;
    border-color: #94a3b8 !important;
    color: #334155 !important;
}


/* =========================
   Delete - Red
========================= */

.checkup-delete-btn {
    background: #fef2f2 !important;
    border-color: #fecaca !important;
    color: #dc2626 !important;
}

.checkup-delete-btn:hover {
    background: #fee2e2 !important;
    border-color: #fca5a5 !important;
    color: #b91c1c !important;
}


/* =========================
   Actions Column
========================= */

.checkup-actions-column {
    width: 270px;
    min-width: 270px;
    white-space: nowrap;
}



/* Success */

.checkup-success-message {
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
}

.checkup-success-close {
    border: none;
    background: transparent;

    color: #0f5132;

    font-size: 22px;
    line-height: 1;

    cursor: pointer;

    padding: 0;
}


/* Responsive */

@media (max-width: 767.98px) {

    .checkups-page {
        padding-top: 20px;
    }

    .checkups-header {
        align-items: flex-start;
        flex-direction: column;

        gap: 15px;

        padding: 22px 20px;
    }

    .checkups-title {
        font-size: 25px;
    }

    .checkups-card-header {
        padding: 15px 17px;
    }

    .checkup-actions {
        justify-content: flex-start;
    }

}

@media (max-width: 575.98px) {

    .checkups-page {
        padding-top: 16px;
    }

    .checkups-header {
        padding: 20px 16px;
    }

    .checkups-title {
        font-size: 23px;
    }

    .checkups-subtitle {
        font-size: 14px;
    }

}

</style>


{{-- Success Auto Hide --}}
<script>

setTimeout(function () {

    const message = document.getElementById(
        'checkupSuccessMessage'
    );

    if (message) {
        message.remove();
    }

}, 3000);

</script>

@endsection

