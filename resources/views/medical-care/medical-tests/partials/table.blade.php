<style>
    /* =========================
       Medical Tests Table
    ========================== */

    .medical-tests-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .medical-tests-table thead th {
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

    .medical-tests-table tbody td {
        padding: 14px;
        font-size: 14px;
        color: #334155;
        border-bottom: 1px solid #edf2f7;
        vertical-align: middle;
        white-space: nowrap;
    }

    .medical-tests-table tbody tr {
        background: #fff;
        transition: background-color 0.15s ease;
    }

    .medical-tests-table tbody tr:hover {
        background: #f5f9ff;
    }

    .medical-tests-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       Text
    ========================== */

    .medical-test-id {
        color: #334155;
        font-size: 14px;
        font-weight: 600;
    }

    .medical-test-name {
        color: #172033;
        font-size: 14px;
        font-weight: 600;
    }

    .medical-test-date {
        color: #334155;
        font-size: 14px;
        font-weight: 500;
    }


    /* =========================
       Actions
    ========================== */

    .medical-test-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .medical-test-action-btn {
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

    .medical-test-action-btn:hover {
        transform: translateY(-1px);
    }


    /* Edit - Neutral */

    .medical-test-edit-btn {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
        color: #475569 !important;
    }

    .medical-test-edit-btn:hover {
        background: #e2e8f0 !important;
        border-color: #94a3b8 !important;
        color: #334155 !important;
    }


    /* Delete - Red */

    .medical-test-delete-btn {
        background: #fef2f2 !important;
        border-color: #fecaca !important;
        color: #dc2626 !important;
    }

    .medical-test-delete-btn:hover {
        background: #fee2e2 !important;
        border-color: #fca5a5 !important;
        color: #b91c1c !important;
    }
    /* =========================
       Pagination
    ========================== */

    .medical-tests-pagination {
        padding: 14px 20px;
        border-top: 1px solid #e5e7eb;
        background: #fff;
    }

    .medical-tests-pagination .pagination {
        margin: 0;
    }


    /* =========================
       Empty
    ========================== */

    .medical-tests-empty {
        padding: 45px 20px !important;
        color: #94a3b8 !important;
        font-size: 14px !important;
    }
</style>

<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table medical-tests-table align-middle mb-0">

            <thead>

                <tr>

                    <th class="px-4 py-3">
                        ID
                    </th>

                    <th class="py-3">
                        Medical Test
                    </th>

                    <th class="py-3">
                        Created At
                    </th>

                    <th class="py-3 text-center medical-test-actions-column">

                        Actions

                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($medicalTests as $medicalTest)

                    <tr>

                        {{-- ID --}}

                        <td class="px-4">

                            <span class="medical-test-id">
                                {{ $medicalTest->id }}
                            </span>

                        </td>


                        {{-- Medical Test Name --}}

                        <td>

                            <span class="medical-test-name">
                                {{ $medicalTest->name }}
                            </span>

                        </td>


                        {{-- Created At --}}

                        <td>

                            <span class="medical-test-date">
                                {{ $medicalTest->created_at->format('d M Y') }}
                            </span>

                        </td>


                        {{-- Actions --}}

                        <td class="text-center medical-test-actions-column">

                            <div class="medical-test-actions">


                                {{-- Edit --}}

                                <a href="{{ route('medical-tests.edit', $medicalTest->id) }}"
                                   class="btn medical-test-action-btn medical-test-edit-btn">

                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit

                                </a>


                                {{-- Delete --}}

                                <form action="{{ route('medical-tests.destroy', $medicalTest->id) }}"
                                      method="POST"
                                      class="m-0 p-0 d-flex align-items-center">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn medical-test-action-btn medical-test-delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this medical test?')">

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
                            class="text-center py-5 text-muted">

                            No medical tests found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}

    <div class="medical-tests-pagination">

        {{ $medicalTests->links() }}

    </div>

</div>
