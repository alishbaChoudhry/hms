<style>
    /* =========================
       Doctors Table
    ========================== */

    .doctors-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .doctors-table thead th {
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

    .doctors-table tbody td {
        padding: 14px;
        font-size: 14px;
        color: #334155;
        border-bottom: 1px solid #edf2f7;
        vertical-align: middle;
        white-space: nowrap;
    }

    .doctors-table tbody tr {
        background: #ffffff;
        transition: background-color 0.15s ease;
    }

    .doctors-table tbody tr:hover {
        background: #f5f9ff;
    }

    .doctors-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       ID
    ========================== */

    .doctor-id {
        color: #334155;
        font-size: 14px;
        font-weight: 600;
    }


    /* =========================
       Doctor Name
    ========================== */

    .doctor-name {
        color: #172033;
        font-size: 14px;
        font-weight: 600;
    }


    /* =========================
       Email / Phone
    ========================== */

    .doctor-email,
    .doctor-phone {
        color: #334155;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Specialization
    ========================== */

.doctor-specialization {
    color: #334155;
    font-size: 14px;
    font-weight: 500;
}



    /* =========================
       Action Buttons
    ========================== */

    .doctor-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .doctor-action-btn {
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

    .doctor-action-btn:hover {
        transform: translateY(-1px);
    }


    /* =========================
       View - Blue
    ========================== */

    .doctor-view-btn {
        background: #eff6ff !important;
        border-color: #dbeafe !important;
        color: #2563eb !important;
    }

    .doctor-view-btn:hover {
        background: #dbeafe !important;
        color: #1d4ed8 !important;
    }


    /* =========================
       Edit - Neutral
    ========================== */

    .doctor-edit-btn {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
        color: #475569 !important;
    }

    .doctor-edit-btn:hover {
        background: #e2e8f0 !important;
        border-color: #94a3b8 !important;
        color: #334155 !important;
    }


    /* =========================
       Delete - Red
    ========================== */

    .doctor-delete-btn {
        background: #fef2f2 !important;
        border-color: #fecaca !important;
        color: #dc2626 !important;
    }

    .doctor-delete-btn:hover {
        background: #fee2e2 !important;
        border-color: #fca5a5 !important;
        color: #b91c1c !important;
    }


    /* =========================
       Pagination
    ========================== */

    .doctors-pagination {
        padding: 14px 20px;
        border-top: 1px solid #f1f5f9;
    }


    /* =========================
       Mobile
    ========================== */

    @media (max-width: 991.98px) {

        .doctors-table tbody td {
            padding: 12px;
        }

        .doctor-action-btn {
            min-width: 60px;
            padding: 5px 8px;
        }

    }
</style>


<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table doctors-table align-middle mb-0">


            <thead>

                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="py-3">Name</th>
                    <th class="py-3">Email</th>
                    <th class="py-3">Phone</th>
                    <th class="py-3">Specialization</th>

                    <th class="py-3 text-center"
                        style="width: 270px; min-width: 270px;">
                        Actions
                    </th>
                </tr>

            </thead>


            <tbody>

                @forelse($doctors as $doctor)

                    <tr>

                        {{-- ID --}}
                        <td class="px-4">
    <span class="doctor-id">
        {{ $doctor->id }}
    </span>
</td>



                        {{-- Name --}}
                        <td>
    <span class="doctor-name">
        {{ $doctor->name }}
    </span>
</td>



                        {{-- Email --}}
                        <td>
    <span class="doctor-email">
        {{ $doctor->email }}
    </span>
</td>



                        {{-- Phone --}}
                        <td>
    <span class="doctor-phone">
        {{ $doctor->phone }}
    </span>
</td>



                        {{-- Specialization --}}
                        <td>
    <span class="doctor-specialization">
        {{ $doctor->specialization }}
    </span>
</td>




                        {{-- Actions --}}
                        <td class="text-center"
                            style="width: 270px; min-width: 270px; white-space: nowrap;">

                            <div class="doctor-actions">


                                {{-- View --}}

                                @can('view doctors')

    <button type="button"
            class="btn doctor-action-btn doctor-view-btn"
            data-bs-toggle="modal"
            data-bs-target="#doctorViewModal{{ $doctor->id }}">

        <i class="bi bi-eye me-1"></i>
        View

    </button>

@endcan


                                {{-- Edit --}}

                                @can('edit doctors')

    <a href="{{ route('doctors.edit', $doctor->id) }}"
       class="btn doctor-action-btn doctor-edit-btn">

        <i class="bi bi-pencil-square me-1"></i>
        Edit

    </a>

@endcan


                                {{-- Delete --}}

                                @can('delete doctors')

    <form action="{{ route('doctors.destroy', $doctor->id) }}"
          method="POST"
          class="m-0 p-0 d-flex align-items-center">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn doctor-action-btn doctor-delete-btn"
                onclick="return confirm('Are you sure you want to delete this doctor?')">

            <i class="bi bi-trash me-1"></i>
            Delete

        </button>

    </form>

@endcan

                            </div>

                        </td>

                    </tr>


                    {{-- Doctor View Modal --}}

                    <div class="modal fade"
                         id="doctorViewModal{{ $doctor->id }}"
                         tabindex="-1"
                         aria-labelledby="doctorViewModalLabel{{ $doctor->id }}"
                         aria-hidden="true">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content border-0 shadow"
                                 style="border-radius: 10px; overflow: hidden;">


                                {{-- Modal Header --}}

                                <div class="modal-header"
                                     style="
                                        background: #f8fafc;
                                        border-bottom: 1px solid #e5e7eb;
                                        padding: 12px 18px;
                                     ">

                                    <div>

                                        <h5 class="modal-title mb-0"
                                            id="doctorViewModalLabel{{ $doctor->id }}"
                                            style="
                                                font-size: 18px;
                                                font-weight: 600;
                                                color: #1f2937;
                                            ">

                                            <i class="bi bi-person-badge me-2"
                                               style="color: #0d6efd;"></i>

                                            Doctor Details

                                        </h5>

                                        <small class="text-muted">
                                            Doctor #{{ $doctor->id }}
                                        </small>

                                    </div>


                                    {{-- Close X --}}

                                    <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close">
                                    </button>

                                </div>


                                {{-- Modal Body --}}

                                <div class="modal-body"
                                     style="padding: 16px 18px;">

                                    <div class="row g-2">


                                        {{-- Name --}}

                                        <div class="col-md-6">

                                            <div style="
                                                background: #f8fafc;
                                                border: 1px solid #e5e7eb;
                                                border-radius: 7px;
                                                padding: 9px 12px;
                                            ">

                                                <small class="text-muted d-block mb-1">
                                                    Doctor Name
                                                </small>

                                                <div style="
                                                    font-size: 15px;
                                                    font-weight: 600;
                                                    color: #1f2937;
                                                ">

                                                    <i class="bi bi-person me-2"
                                                       style="color: #0d6efd;"></i>

                                                    {{ $doctor->name }}

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Email --}}

                                        <div class="col-md-6">

                                            <div style="
                                                background: #f8fafc;
                                                border: 1px solid #e5e7eb;
                                                border-radius: 7px;
                                                padding: 9px 12px;
                                            ">

                                                <small class="text-muted d-block mb-1">
                                                    Email
                                                </small>

                                                <div style="
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    color: #374151;
                                                ">

                                                    <i class="bi bi-envelope me-2"
                                                       style="color: #0d6efd;"></i>

                                                    {{ $doctor->email }}

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Phone --}}

                                        <div class="col-md-6">

                                            <div style="
                                                background: #f8fafc;
                                                border: 1px solid #e5e7eb;
                                                border-radius: 7px;
                                                padding: 9px 12px;
                                            ">

                                                <small class="text-muted d-block mb-1">
                                                    Phone
                                                </small>

                                                <div style="
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    color: #374151;
                                                ">

                                                    <i class="bi bi-telephone me-2"
                                                       style="color: #0d6efd;"></i>

                                                    {{ $doctor->phone }}

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Specialization --}}

                                        <div class="col-md-6">

                                            <div style="
                                                background: #f8fafc;
                                                border: 1px solid #e5e7eb;
                                                border-radius: 7px;
                                                padding: 9px 12px;
                                            ">

                                                <small class="text-muted d-block mb-1">
                                                    Specialization
                                                </small>

                                                <div style="
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    color: #374151;
                                                ">

                                                    <i class="bi bi-heart-pulse me-2"
                                                       style="color: #0d6efd;"></i>

                                                    {{ $doctor->specialization }}

                                                </div>

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

                            No doctors found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}

    <div class="px-4 py-3 border-top">

        {{ $doctors->links() }}

    </div>

</div>