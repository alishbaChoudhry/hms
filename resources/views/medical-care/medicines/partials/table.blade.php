<style>
    /* =========================
       Medicines Table
    ========================== */

    .medicines-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .medicines-table thead th {
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

    .medicines-table tbody td {
        padding: 14px 16px;

        font-size: 14px;
        color: #334155 !important;

        border-bottom: 1px solid #edf2f7;

        vertical-align: middle;

        white-space: nowrap;
    }

    .medicines-table tbody tr {
        background: #ffffff;

        transition: background-color 0.15s ease;
    }

    .medicines-table tbody tr:hover {
        background: #f5f9ff;
    }

    /* Last row ke neeche bhi line */
    .medicines-table tbody tr:last-child td {
        border-bottom: 1px solid #edf2f7;
    }


    /* =========================
       Text
    ========================== */

    .medicine-dark-text {
        color: #334155 !important;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Actions
    ========================== */

    .medicine-actions {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 6px;
    }


    .medicine-action-btn {
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


    .medicine-action-btn:hover {
        transform: translateY(-1px);
    }


    /* =========================
       Edit - Neutral Grey
    ========================== */

    .medicine-edit-btn {
        background: #f1f5f9 !important;

        border-color: #cbd5e1 !important;

        color: #475569 !important;
    }


    .medicine-edit-btn:hover {
        background: #e2e8f0 !important;

        border-color: #94a3b8 !important;

        color: #334155 !important;
    }


    /* =========================
       Delete - Red
    ========================== */

    .medicine-delete-btn {
        background: #fef2f2 !important;

        border-color: #fecaca !important;

        color: #dc2626 !important;
    }


    .medicine-delete-btn:hover {
        background: #fee2e2 !important;

        border-color: #fca5a5 !important;

        color: #b91c1c !important;
    }


    /* =========================
       Actions Column
    ========================== */

    .medicines-actions-column {
        width: 270px;

        min-width: 270px;

        white-space: nowrap;
    }


    /* =========================
       Pagination
    ========================== */

    .medicines-pagination {
        padding: 14px 20px;

        background: #ffffff;

        border-top: 1px solid #e5e7eb;
    }


    .medicines-pagination .pagination {
        margin-bottom: 0;
    }


    .medicines-pagination .page-link {
        color: #64748b;

        border-color: #e5e7eb;

        font-size: 13px;
    }


    .medicines-pagination .page-item.active .page-link {
        background-color: #0d6efd;

        border-color: #0d6efd;

        color: #ffffff;
    }


    .medicines-pagination .page-link:hover {
        background-color: #f1f5f9;

        color: #0d6efd;
    }


    /* =========================
       Empty State
    ========================== */

    .medicines-empty {
        padding: 45px 20px;

        color: #94a3b8 !important;

        font-size: 14px;
    }


    /* =========================
       Responsive
    ========================== */

    @media (max-width: 767.98px) {

        .medicines-table thead th {
            padding: 12px;
        }

        .medicines-table tbody td {
            padding: 12px;
        }

        .medicine-action-btn {
            min-width: auto;

            padding: 6px 8px;
        }

        .medicines-actions-column {
            width: 220px;

            min-width: 220px;
        }

        .medicines-pagination {
            padding: 12px 15px;
        }
    }
</style>


{{-- =========================
     Medicines Table
========================= --}}

<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table medicines-table align-middle mb-0">

            {{-- =========================
                 Table Header
            ========================== --}}

            <thead>

                <tr>

                    <th class="px-4 py-3">
                        ID
                    </th>

                    <th class="py-3">
                        Medicine
                    </th>

                    <th class="py-3">
                        Created At
                    </th>

                    <th class="py-3 text-center medicines-actions-column">
                        Actions
                    </th>

                </tr>

            </thead>


            {{-- =========================
                 Table Body
            ========================== --}}

            <tbody>

                @forelse($medicines as $medicine)

                    <tr>

                        {{-- ID --}}

                        <td class="px-4">

                            <span class="medicine-dark-text">
                                {{ $medicine->id }}
                            </span>

                        </td>


                        {{-- Medicine --}}

                        <td>

                            <span class="medicine-dark-text">
                                {{ $medicine->name }}
                            </span>

                        </td>


                        {{-- Created At --}}

                        <td>

                            <span class="medicine-dark-text">

                                {{ $medicine->created_at->format('d M Y') }}

                            </span>

                        </td>


                        {{-- Actions --}}

                        <td class="text-center medicines-actions-column">

                            <div class="medicine-actions">

                                {{-- Edit --}}

                                <a href="{{ route('medicines.edit', $medicine->id) }}"
                                   class="btn medicine-action-btn medicine-edit-btn">

                                    <i class="bi bi-pencil-square me-1"></i>

                                    Edit

                                </a>


                                {{-- Delete --}}

                                <form action="{{ route('medicines.destroy', $medicine->id) }}"
                                      method="POST"
                                      class="m-0 p-0 d-flex align-items-center">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn medicine-action-btn medicine-delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this medicine?')">

                                        <i class="bi bi-trash me-1"></i>

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            <div class="medicines-empty">

                                <i class="bi bi-capsule fs-3 d-block mb-2"></i>

                                No medicines found.

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

    @if($medicines->hasPages())

        <div class="medicines-pagination">

            {{ $medicines->links() }}

        </div>

    @endif

</div>
