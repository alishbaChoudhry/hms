<style>
    /* =========================
       Symptoms Table
    ========================== */

    .symptoms-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .symptoms-table thead th {
        background: #eef5ff !important;
        color: #334155 !important;

        font-size: 12px;
        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: 0.35px;

        padding: 14px 16px;

        border-bottom: 1px solid #dbe7f5;

        white-space: nowrap;
    }

    .symptoms-table tbody td {
        padding: 14px 16px;

        font-size: 14px;
        color: #334155 !important;

        border-bottom: 1px solid #edf2f7;

        vertical-align: middle;

        white-space: nowrap;
    }

    .symptoms-table tbody tr {
        background: #ffffff;

        transition: background-color 0.15s ease;
    }

    .symptoms-table tbody tr:hover {
        background: #f5f9ff;
    }

    .symptoms-table tbody tr:last-child td {
        border-bottom: 1px solid #edf2f7;
    }


    /* =========================
       Text
    ========================== */

    .symptom-dark-text {
        color: #334155 !important;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Actions
    ========================== */

    .symptom-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .symptom-action-btn {
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

    .symptom-action-btn:hover {
        transform: translateY(-1px);
    }


    /* =========================
       Edit Button
    ========================== */

    .symptom-edit-btn {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
        color: #475569 !important;
    }

    .symptom-edit-btn:hover {
        background: #e2e8f0 !important;
        border-color: #94a3b8 !important;
        color: #334155 !important;
    }


    /* =========================
       Delete Button
    ========================== */

    .symptom-delete-btn {
        background: #fef2f2 !important;
        border-color: #fecaca !important;
        color: #dc2626 !important;
    }

    .symptom-delete-btn:hover {
        background: #fee2e2 !important;
        border-color: #fca5a5 !important;
        color: #b91c1c !important;
    }


    /* =========================
       Actions Column
    ========================== */

    .symptoms-actions-column {
        width: 270px;
        min-width: 270px;
        white-space: nowrap;
    }


    /* =========================
       Pagination
    ========================== */

    .symptoms-pagination {
        padding: 14px 20px;
        background: #ffffff;
        border-top: 1px solid #e5e7eb;
    }

    .symptoms-pagination .pagination {
        margin-bottom: 0;
    }

    .symptoms-pagination .page-link {
        color: #64748b;
        border-color: #e5e7eb;
        font-size: 13px;
    }

    .symptoms-pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: #ffffff;
    }

    .symptoms-pagination .page-link:hover {
        background-color: #f1f5f9;
        color: #0d6efd;
    }


    /* =========================
       Empty State
    ========================== */

    .symptoms-empty {
        padding: 45px 20px;
        color: #94a3b8 !important;
        font-size: 14px;
    }


    /* =========================
       Responsive
    ========================== */

    @media (max-width: 767.98px) {

        .symptoms-table thead th {
            padding: 12px;
        }

        .symptoms-table tbody td {
            padding: 12px;
        }

        .symptom-action-btn {
            min-width: auto;
            padding: 6px 8px;
        }

        .symptoms-actions-column {
            width: 220px;
            min-width: 220px;
        }

        .symptoms-pagination {
            padding: 12px 15px;
        }
    }
</style>


{{-- =========================
     Symptoms Card Body
========================= --}}

<div class="card-body p-0">

    {{-- Table --}}
    <div class="table-responsive">

        <table class="table symptoms-table align-middle mb-0">

            {{-- =========================
                 Table Header
            ========================== --}}

            <thead>

                <tr>

                    <th class="px-4 py-3">
                        ID
                    </th>

                    <th class="py-3">
                        Symptom
                    </th>

                    <th class="py-3">
                        Description
                    </th>

                    <th class="py-3 text-center symptoms-actions-column">
                        Actions
                    </th>

                </tr>

            </thead>


            {{-- =========================
                 Table Body
            ========================== --}}

            <tbody>

                @forelse($symptoms as $symptom)

                    <tr>

                        {{-- ID --}}
                        <td class="px-4">

                            <span class="symptom-dark-text">
                                {{ $symptom->id }}
                            </span>

                        </td>


                        {{-- Symptom --}}
                        <td>

                            <span class="symptom-dark-text">
                                {{ $symptom->name }}
                            </span>

                        </td>


                        {{-- Description --}}
                        <td>

                            <span class="symptom-dark-text">

                                {{ $symptom->description ?? '—' }}

                            </span>

                        </td>


                        {{-- Actions --}}
                        <td class="text-center symptoms-actions-column">

                            <div class="symptom-actions">

                                {{-- =========================
                                     Edit
                                ========================== --}}

                                <a href="{{ route('symptoms.edit', $symptom->id) }}"
                                   class="btn symptom-action-btn symptom-edit-btn">

                                    <i class="bi bi-pencil-square me-1"></i>

                                    Edit

                                </a>


                                {{-- =========================
                                     Delete
                                ========================== --}}

                                <form action="{{ route('symptoms.destroy', $symptom->id) }}"
                                      method="POST"
                                      class="m-0 p-0 d-flex align-items-center">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn symptom-action-btn symptom-delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this symptom?')">

                                        <i class="bi bi-trash me-1"></i>

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    {{-- Empty State --}}

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            <div class="symptoms-empty">

                                <i class="bi bi-emoji-frown fs-3 d-block mb-2"></i>

                                No symptoms found.

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =========================
         Pagination
    ========================== --}}

    @if($symptoms->hasPages())

        <div class="symptoms-pagination">

            {{ $symptoms->links() }}

        </div>

    @endif

</div>
