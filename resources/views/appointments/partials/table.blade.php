<style>
    /* =========================
       Appointments Table
    ========================== */

    .appointments-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        color: #374151;
        font-size: 14px;
    }

    .appointments-table thead th {
        background: #eef5ff;
        color: #334155;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.35px;

        padding: 14px 14px;

        border-bottom: 1px solid #dbe7f5;

        white-space: nowrap;
    }

    .appointments-table tbody td {
        padding: 14px;

        color: #334155;
        font-size: 14px;

        border-bottom: 1px solid #edf2f7;

        vertical-align: middle;
        white-space: nowrap;
    }

    .appointments-table tbody tr {
        background: #ffffff;

        transition: background-color 0.15s ease;
    }

    .appointments-table tbody tr:hover {
        background: #f5f9ff;
    }

    .appointments-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       ID
    ========================== */

    .appointment-id {
        color: #334155;
        font-size: 14px;
        font-weight: 600;
    }


    /* =========================
       Patient / Doctor
    ========================== */

    .appointment-person {
        color: #172033;
        font-size: 14px;
        font-weight: 600;
    }


    /* =========================
       Date
    ========================== */

    .appointment-date {
        color: #334155;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Time
    ========================== */

    .appointment-time {
        color: #334155;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Appointment Type
    ========================== */

    .appointment-type {
        color: #334155;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Status Select
    ========================== */

    .appointment-status-select {
        width: 125px;

        border: 1px solid #e5e7eb;
        border-radius: 7px;

        padding: 6px 30px 6px 9px;

        color: #475569;
        background-color: #ffffff;

        font-size: 12.5px;
        font-weight: 500;

        cursor: pointer;

        box-shadow: none !important;

        transition: all 0.2s ease;
    }

    .appointment-status-select:focus {
        border-color: #86b7fe;

        box-shadow:
            0 0 0 2px rgba(13, 110, 253, 0.08) !important;
    }


    /* =========================
       Status Badge
    ========================== */

    .appointment-status-badge {
        display: inline-flex;
        align-items: center;

        padding: 5px 9px;

        border-radius: 6px;

        font-size: 11px;
        font-weight: 600;
    }


    /* =========================
       Appointment Actions
    ========================== */

    .appointment-actions {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 6px;
    }


    /* =========================
       Action Button Base
    ========================== */

    .appointment-action-btn {
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

    .appointment-action-btn:hover {
        transform: translateY(-1px);
    }


    /* =========================
       View Button - Blue
    ========================== */

    .appointment-view-btn {
        background: #eff6ff !important;
        border-color: #dbeafe !important;

        color: #2563eb !important;
    }

    .appointment-view-btn:hover {
        background: #dbeafe !important;

        border-color: #bfdbfe !important;

        color: #1d4ed8 !important;
    }


    /* =========================
       Edit Button - Neutral
    ========================== */

    .appointment-edit-btn {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;

        color: #475569 !important;
    }

    .appointment-edit-btn:hover {
        background: #e2e8f0 !important;

        border-color: #94a3b8 !important;

        color: #334155 !important;
    }


    /* =========================
       Delete Button - Red
    ========================== */

    .appointment-delete-btn {
        background: #fef2f2 !important;
        border-color: #fecaca !important;

        color: #dc2626 !important;
    }

    .appointment-delete-btn:hover {
        background: #fee2e2 !important;

        border-color: #fca5a5 !important;

        color: #b91c1c !important;
    }


    /* =========================
       Empty State
    ========================== */

    .appointments-empty {
        padding: 45px 20px !important;

        color: #94a3b8 !important;

        font-size: 14px !important;
    }


    /* =========================
       Pagination
    ========================== */

    .appointments-pagination {
        padding: 14px 20px;

        border-top: 1px solid #f1f5f9;

        background: #ffffff;
    }

    .appointments-pagination .pagination {
        margin: 0;
    }

    .appointments-pagination .page-link {
        color: #64748b;

        border: 1px solid #e5e7eb;

        font-size: 13px;

        padding: 6px 10px;
    }

    .appointments-pagination .page-item.active .page-link {
        background: #0d6efd;

        border-color: #0d6efd;

        color: #ffffff;
    }

    .appointments-pagination .page-link:hover {
        background: #f1f5f9;

        color: #0d6efd;
    }


    /* =========================
       Responsive
    ========================== */

    @media (max-width: 991.98px) {

        .appointments-table tbody td {
            padding: 12px;
        }

        .appointment-action-btn {
            min-width: 60px;

            padding: 5px 8px;
        }
    }


    @media (max-width: 767.98px) {

        .appointments-table thead th {
            padding: 11px 12px;
        }

        .appointments-table tbody td {
            padding: 12px;
        }

        .appointment-action-btn {
            min-width: auto;

            padding: 6px 8px;
        }

        .appointment-action-btn i {
            margin-right: 0 !important;
        }
    }
</style>


<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table appointments-table align-middle mb-0">


            <thead style="background: #f8fafc;">

                <tr>

                    <th class="px-4 py-3">
                        ID
                    </th>

                    <th class="py-3">
                        Patient
                    </th>

                    <th class="py-3">
                        Doctor
                    </th>

                    <th class="py-3">
                        Date
                    </th>


                    <th class="py-3">
                        Status
                    </th>

                    <th class="py-3 text-center"
                        style="width: 180px;">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($appointments as $appointment)

                    <tr>

                        {{-- ID --}}
                        <td class="px-4">
                            {{ $appointment->id }}
                        </td>


                        {{-- Patient --}}
                        <td>
    <span class="appointment-person">
        {{ $appointment->patient->name }}
    </span>
</td>



                        {{-- Doctor --}}
                        <td>
    <span class="appointment-person">
        {{ $appointment->doctor->name }}
    </span>
</td>






                        {{-- Type --}}
                        <td>
    <span class="appointment-type">
        {{ $appointment->appointment_type }}
    </span>
</td>



                        {{-- Status --}}
                        <td>

                            @can('edit appointments')

                                <form action="{{ route('appointments.status', $appointment->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <select name="status"
                                            class="form-select form-select-sm appointment-status-select"

                                            style="
                                                width: 125px;
                                                border-radius: 6px;
                                                font-size: 13px;
                                                font-weight: 500;
                                            "
                                            onchange="this.form.submit()">

                                        <option value="Pending"
                                            {{ $appointment->status === 'Pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>

                                        <option value="Confirmed"
                                            {{ $appointment->status === 'Confirmed' ? 'selected' : '' }}>
                                            Confirmed
                                        </option>

                                        <option value="Completed"
                                            {{ $appointment->status === 'Completed' ? 'selected' : '' }}>
                                            Completed
                                        </option>

                                        <option value="Cancelled"
                                            {{ $appointment->status === 'Cancelled' ? 'selected' : '' }}>
                                            Cancelled
                                        </option>

                                    </select>

                                </form>

                            @else

                                <span class="badge
                                    @if($appointment->status === 'Pending')
                                        bg-warning text-dark
                                    @elseif($appointment->status === 'Confirmed')
                                        bg-primary
                                    @elseif($appointment->status === 'Completed')
                                        bg-success
                                    @elseif($appointment->status === 'Cancelled')
                                        bg-danger
                                    @endif">

                                    {{ $appointment->status }}

                                </span>

                            @endcan

                        </td>


                        {{-- Actions --}}
<td class="text-center"
    style="width: 270px; min-width: 270px; white-space: nowrap;">

    <div class="appointment-actions">

        {{-- View --}}
        @can('view appointments')

            <button type="button"
                    class="btn appointment-action-btn appointment-view-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#appointmentViewModal{{ $appointment->id }}">

                <i class="bi bi-eye me-1"></i>
                View

            </button>

        @endcan


        {{-- Edit --}}
        @can('edit appointments')

            <a href="{{ route('appointments.edit', $appointment->id) }}"
               class="btn appointment-action-btn appointment-edit-btn">

                <i class="bi bi-pencil-square me-1"></i>
                Edit

            </a>

        @endcan


        {{-- Delete --}}
        @can('delete appointments')

            <form action="{{ route('appointments.destroy', $appointment->id) }}"
                  method="POST"
                  class="m-0 p-0 d-flex align-items-center">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn appointment-action-btn appointment-delete-btn"
                        onclick="return confirm('Are you sure you want to delete this appointment?')">

                    <i class="bi bi-trash me-1"></i>
                    Delete

                </button>

            </form>

        @endcan

    </div>

</td>



                        

                    </tr>


                    {{-- Appointment View Modal --}}
                    <div class="modal fade"
                         id="appointmentViewModal{{ $appointment->id }}"
                         tabindex="-1"
                         aria-labelledby="appointmentViewModalLabel{{ $appointment->id }}"
                         aria-hidden="true">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content border-0 shadow"
                                 style="
                                    border-radius: 10px;
                                    overflow: hidden;
                                 ">


                                {{-- Modal Header --}}
                                <div class="modal-header"
                                     style="
                                        background: #f8fafc;
                                        border-bottom: 1px solid #e5e7eb;
                                        padding: 12px 18px;
                                     ">

                                    <div>

                                        <h5 class="modal-title mb-0"
                                            id="appointmentViewModalLabel{{ $appointment->id }}"
                                            style="
                                                font-size: 18px;
                                                font-weight: 600;
                                                color: #1f2937;
                                            ">

                                            <i class="bi bi-calendar-check me-2"
                                               style="color: #0d6efd;"></i>

                                            Appointment Details

                                        </h5>

                                        <small class="text-muted">
                                            Appointment #{{ $appointment->id }}
                                        </small>

                                    </div>


                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close">
                                    </button>

                                </div>


                                {{-- Modal Body --}}
                                <div class="modal-body"
                                     style="padding: 16px 18px;">


                                    {{-- Patient & Doctor --}}
                                    <div class="row g-2 mb-3">

                                        <div class="col-md-6">

                                            <div style="
                                                background: #f8fafc;
                                                border: 1px solid #e5e7eb;
                                                border-radius: 7px;
                                                padding: 9px 12px;
                                            ">

                                                <small class="text-muted d-block mb-1">
                                                    Patient
                                                </small>

                                                <div style="
                                                    font-size: 15px;
                                                    font-weight: 600;
                                                    color: #1f2937;
                                                ">

                                                    <i class="bi bi-person me-2"
                                                       style="color: #0d6efd;"></i>

                                                    {{ $appointment->patient->name }}

                                                </div>

                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <div style="
                                                background: #f8fafc;
                                                border: 1px solid #e5e7eb;
                                                border-radius: 7px;
                                                padding: 9px 12px;
                                            ">

                                                <small class="text-muted d-block mb-1">
                                                    Doctor
                                                </small>

                                                <div style="
                                                    font-size: 15px;
                                                    font-weight: 600;
                                                    color: #1f2937;
                                                ">

                                                    <i class="bi bi-person-badge me-2"
                                                       style="color: #0d6efd;"></i>

                                                    {{ $appointment->doctor->name }}

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Appointment Information --}}
                                    <div class="row g-2 mb-3">

                                        <div class="col-md-6">

                                            <small class="text-muted d-block mb-1">
                                                Date
                                            </small>

                                            <div style="
                                                font-size: 14px;
                                                font-weight: 500;
                                                color: #374151;
                                            ">

                                                <i class="bi bi-calendar3 me-2"
                                                   style="color: #0d6efd;"></i>

                                                {{ $appointment->appointment_date }}

                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <small class="text-muted d-block mb-1">
                                                Time
                                            </small>

                                            <div style="
                                                font-size: 14px;
                                                font-weight: 500;
                                                color: #374151;
                                            ">

                                                <i class="bi bi-clock me-2"
                                                   style="color: #0d6efd;"></i>

                                                {{ $appointment->appointment_time }}

                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <small class="text-muted d-block mb-1">
                                                Appointment Type
                                            </small>

                                            <div style="
                                                font-size: 14px;
                                                font-weight: 500;
                                                color: #374151;
                                            ">

                                                <i class="bi bi-clipboard-check me-2"
                                                   style="color: #0d6efd;"></i>

                                                {{ $appointment->appointment_type }}

                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <small class="text-muted d-block mb-1">
                                                Status
                                            </small>

                                            <span class="badge
                                                @if($appointment->status === 'Pending')
                                                    bg-warning text-dark
                                                @elseif($appointment->status === 'Confirmed')
                                                    bg-primary
                                                @elseif($appointment->status === 'Completed')
                                                    bg-success
                                                @elseif($appointment->status === 'Cancelled')
                                                    bg-danger
                                                @endif"
                                                style="
                                                    padding: 5px 10px;
                                                    font-size: 11px;
                                                    border-radius: 5px;
                                                ">

                                                {{ $appointment->status }}

                                            </span>

                                        </div>

                                    </div>


                                    {{-- Reason / Symptoms --}}
                                    <div class="mb-2">

                                        <div style="
                                            background: #f8fafc;
                                            border: 1px solid #e5e7eb;
                                            border-radius: 7px;
                                            padding: 10px 12px;
                                        ">

                                            <div style="
                                                font-size: 13px;
                                                font-weight: 600;
                                                color: #374151;
                                                margin-bottom: 4px;
                                            ">

                                                <i class="bi bi-chat-left-text me-2"
                                                   style="color: #0d6efd;"></i>

                                                Reason / Symptoms

                                            </div>

                                            <div style="
                                                color: #6b7280;
                                                font-size: 13px;
                                                line-height: 1.4;
                                            ">

                                                {{ $appointment->reason ?? 'N/A' }}

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Notes --}}
                                    <div>

                                        <div style="
                                            background: #f8fafc;
                                            border: 1px solid #e5e7eb;
                                            border-radius: 7px;
                                            padding: 10px 12px;
                                        ">

                                            <div style="
                                                font-size: 13px;
                                                font-weight: 600;
                                                color: #374151;
                                                margin-bottom: 4px;
                                            ">

                                                <i class="bi bi-journal-text me-2"
                                                   style="color: #0d6efd;"></i>

                                                Notes

                                            </div>

                                            <div style="
                                                color: #6b7280;
                                                font-size: 13px;
                                                line-height: 1.4;
                                            ">

                                                {{ $appointment->notes ?? 'N/A' }}

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                {{-- Modal Footer --}}
                                <div class="modal-footer"
                                     style="
                                        background: #f8fafc;
                                        border-top: 1px solid #e5e7eb;
                                        padding: 9px 18px;
                                     ">

                                    <button type="button"
                                            class="btn btn-secondary btn-sm px-3"
                                            data-bs-dismiss="modal">

                                        Close

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-4 text-muted">

                            No appointments found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


{{-- Pagination --}}
<div class="px-4 py-3 border-top">

    {{ $appointments->links() }}

</div>