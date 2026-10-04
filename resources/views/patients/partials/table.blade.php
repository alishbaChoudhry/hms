<style>
    /* =========================
       Patients Table
    ========================== */

    .patients-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    /* =========================
       Table Header
    ========================== */

    .patients-table thead th {
        background: #eef5ff;
        color: #334155;

        font-size: 12px;
        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: 0.35px;

        padding: 14px;

        border-bottom: 1px solid #dbe7f5;

        white-space: nowrap;
    }

    /* =========================
       Table Body
    ========================== */

    .patients-table tbody td {
        padding: 14px;

        font-size: 14px;
        font-weight: 500;
        color: #334155;

        border-bottom: 1px solid #edf2f7;

        vertical-align: middle;
        white-space: nowrap;
    }

    .patients-table tbody tr {
        background: #ffffff;
        transition: background-color 0.15s ease;
    }

    .patients-table tbody tr:hover {
        background: #f5f9ff;
    }

    .patients-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       Patient ID
    ========================== */

    .patient-id {
    color: #334155;
    font-size: 14px;
    font-weight: 600;
}


    /* =========================
       Patient Information
    ========================== */

    .patient-name {
        color: #172033;
        font-size: 14px;
        font-weight: 600;
    }

    .patient-father,
    .patient-cnic,
    .patient-contact {
        color: #334155;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Gender
    ========================== */

    .patient-gender {
        display: inline-flex;
        align-items: center;

        padding: 4px 9px;

        border-radius: 6px;

        background: #eff6ff;
        color: #2563eb;

        font-size: 12px;
        font-weight: 600;
    }


    /* =========================
       Age
    ========================== */

    .patient-age {
        color: #475569;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Address
    ========================== */

    .patient-address {
        max-width: 220px;

        color: #64748b;
        font-size: 13px;

        overflow: hidden;
        text-overflow: ellipsis;
    }


    /* =========================
       Action Buttons
    ========================== */

    .patient-actions {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 6px;
    }

    .patient-action-btn {
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

        transition:
            background-color 0.15s ease,
            border-color 0.15s ease,
            color 0.15s ease,
            transform 0.15s ease;
    }

    .patient-action-btn:hover {
        transform: translateY(-1px);
    }


    /* =========================
       View Button
    ========================== */

    .patient-view-btn {
        background: #eff6ff !important;
        border-color: #dbeafe !important;
        color: #2563eb !important;
    }

    .patient-view-btn:hover {
        background: #dbeafe !important;
        border-color: #bfdbfe !important;
        color: #1d4ed8 !important;
    }


    /* =========================
       Edit Button
    ========================== */

    .patient-edit-btn {
        background: #f8fafc !important;
        border-color: #e2e8f0 !important;
        color: #475569 !important;
    }

    .patient-edit-btn:hover {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
        color: #334155 !important;
    }


    /* =========================
       Delete Button
    ========================== */

    .patient-delete-btn {
        background: #fef2f2 !important;
        border-color: #fecaca !important;
        color: #dc2626 !important;
    }

    .patient-delete-btn:hover {
        background: #fee2e2 !important;
        border-color: #fca5a5 !important;
        color: #b91c1c !important;
    }


    /* =========================
       Medical History Button
    ========================== */

    /* =========================
   History
========================== */

.patient-history-btn {
    background: #f5f3ff !important;
    border-color: #ddd6fe !important;
    color: #7c3aed !important;
}

.patient-history-btn:hover {
    background: #ede9fe !important;
    border-color: #c4b5fd !important;
    color: #6d28d9 !important;
}



    /* =========================
       Pagination
    ========================== */

    .patients-pagination {
        padding: 14px 20px;
        border-top: 1px solid #f1f5f9;
    }


    /* =========================
       Mobile
    ========================== */

    @media (max-width: 991.98px) {

        .patients-table tbody td {
            padding: 12px;
        }

        .patient-action-btn {
            min-width: 60px;
            padding: 5px 8px;
        }
    }

</style>

<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table patients-table align-middle mb-0">


            <thead>
    <tr>

        <th class="px-4 py-3">
            ID
        </th>

        <th class="py-3">
            Name
        </th>

        <th class="py-3">
            Father Name
        </th>

        <th class="py-3">
            CNIC
        </th>

        <th class="py-3">
            Contact Number
        </th>

        <th class="py-3 text-center"
            style="width: 250px; min-width: 250px;">
            Actions
        </th>

    </tr>
</thead>

<tbody>

    @forelse($patients as $patient)

        <tr>

            <td class="px-4">
                <span class="patient-id">
                    {{ $patient->id }}
                </span>
            </td>

            <td>
                <span class="patient-name">
                    {{ $patient->name }}
                </span>
            </td>

            <td>
                <span class="patient-father">
                    {{ $patient->father_name }}
                </span>
            </td>

            <td>
                <span class="patient-cnic">
                    {{ $patient->cnic }}
                </span>
            </td>

            <td>
                <span class="patient-contact">
                    {{ $patient->contact_number }}
                </span>
            </td>

            <td class="text-center"
                style="width: 250px; min-width: 250px; white-space: nowrap;">

                <div class="patient-actions">

                    {{-- View --}}
                    @can('view patients')

                        <button type="button"
                                class="btn patient-action-btn patient-view-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#patientViewModal{{ $patient->id }}">

                            <i class="bi bi-eye"></i>
                            View

                        </button>

                    @endcan


                    {{-- Edit --}}
                    @can('edit patients')

                        <a href="{{ route('patients.edit', $patient->id) }}"
                           class="btn patient-action-btn patient-edit-btn">

                            <i class="bi bi-pencil-square"></i>
                            Edit

                        </a>

                    @endcan


                    {{-- Delete --}}
                    @can('delete patients')

                        <form action="{{ route('patients.destroy', $patient->id) }}"
                              method="POST"
                              style="display:inline; margin:0;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn patient-action-btn patient-delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this patient?')">

                                <i class="bi bi-trash"></i>
                                Delete

                            </button>

                        </form>

                    @endcan


                    {{-- Medical History --}}
                    @can('view patients')

                        <a href="{{ route('patients.medical-history', $patient->id) }}"
                           class="btn patient-action-btn patient-history-btn">

                            <i class="bi bi-clock-history"></i>
                            History

                        </a>

                    @endcan

                </div>

            </td>

        </tr>



                    {{-- Patient View Modal --}}
<div class="modal fade"
     id="patientViewModal{{ $patient->id }}"
     tabindex="-1"
     aria-labelledby="patientViewModalLabel{{ $patient->id }}"
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
                        id="patientViewModalLabel{{ $patient->id }}"
                        style="
                            font-size: 18px;
                            font-weight: 600;
                            color: #1f2937;
                        ">

                        <i class="bi bi-person-vcard me-2"
                           style="color: #0d6efd;"></i>

                        Patient Details

                    </h5>

                    <small class="text-muted">
                        Patient #{{ $patient->id }}
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

                {{-- Name & Father Name --}}
                <div class="row g-2 mb-3">

                    <div class="col-md-6">

                        <div style="
                            background: #f8fafc;
                            border: 1px solid #e5e7eb;
                            border-radius: 7px;
                            padding: 9px 12px;
                        ">

                            <small class="text-muted d-block mb-1">
                                Patient Name
                            </small>

                            <div style="
                                font-size: 15px;
                                font-weight: 600;
                                color: #1f2937;
                            ">

                                <i class="bi bi-person me-2"
                                   style="color: #0d6efd;"></i>

                                {{ $patient->name }}

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
                                Father Name
                            </small>

                            <div style="
                                font-size: 15px;
                                font-weight: 600;
                                color: #1f2937;
                            ">

                                {{ $patient->father_name }}

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Gender & Age --}}
                <div class="row g-2 mb-3">

                    <div class="col-md-6">

                        <small class="text-muted d-block mb-1">
                            Gender
                        </small>

                        <div style="
                            font-size: 14px;
                            font-weight: 500;
                            color: #374151;
                        ">

                            <i class="bi bi-gender-ambiguous me-2"
                               style="color: #0d6efd;"></i>

                            {{ $patient->gender }}

                        </div>

                    </div>


                    <div class="col-md-6">

                        <small class="text-muted d-block mb-1">
                            Age
                        </small>

                        <div style="
                            font-size: 14px;
                            font-weight: 500;
                            color: #374151;
                        ">

                            <i class="bi bi-calendar3 me-2"
                               style="color: #0d6efd;"></i>

                            {{ $patient->age }} years

                        </div>

                    </div>

                </div>


                {{-- CNIC & Contact --}}
                <div class="row g-2 mb-3">

                    <div class="col-md-6">

                        <small class="text-muted d-block mb-1">
                            CNIC
                        </small>

                        <div style="
                            font-size: 14px;
                            font-weight: 500;
                            color: #374151;
                        ">

                            <i class="bi bi-card-text me-2"
                               style="color: #0d6efd;"></i>

                            {{ $patient->cnic }}

                        </div>

                    </div>


                    <div class="col-md-6">

                        <small class="text-muted d-block mb-1">
                            Contact Number
                        </small>

                        <div style="
                            font-size: 14px;
                            font-weight: 500;
                            color: #374151;
                        ">

                            <i class="bi bi-telephone me-2"
                               style="color: #0d6efd;"></i>

                            {{ $patient->contact_number }}

                        </div>

                    </div>

                </div>


                {{-- Address --}}
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

                            <i class="bi bi-geo-alt me-2"
                               style="color: #0d6efd;"></i>

                            Address

                        </div>

                        <div style="
                            color: #6b7280;
                            font-size: 13px;
                            line-height: 1.4;
                        ">

                            {{ $patient->address ?? 'N/A' }}

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

                            No patients found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}

    <div class="px-4 py-3 border-top">

        {{ $patients->links() }}

    </div>

</div>