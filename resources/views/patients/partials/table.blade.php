<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead style="background: #f8fafc;">

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
                        Gender
                    </th>

                    <th class="py-3">
                        CNIC
                    </th>

                    <th class="py-3">
                        Age
                    </th>

                    <th class="py-3">
                        Contact Number
                    </th>

                    <th class="py-3">
                        Address
                    </th>

                    <th class="py-3 text-center"
    style="width: 270px; min-width: 270px;">
    Actions
</th>

                </tr>

            </thead>

            <tbody>

                @forelse($patients as $patient)

                    <tr>

                        <td class="px-4">
                            {{ $patient->id }}
                        </td>

                        <td>
                            {{ $patient->name }}
                        </td>

                        <td>
                            {{ $patient->father_name }}
                        </td>

                        <td>
                            {{ $patient->gender }}
                        </td>

                        <td>
                            {{ $patient->cnic }}
                        </td>

                        <td>
                            {{ $patient->age }}
                        </td>

                        <td>
                            {{ $patient->contact_number }}
                        </td>

                        <td>
                            {{ $patient->address }}
                        </td>

                        <td class="text-center"
                            style="width: 270px; min-width: 270px; white-space: nowrap;">

                            <div class="d-flex justify-content-center align-items-center gap-1">

                                {{-- View --}}

                                <button type="button"
                                        class="btn btn-sm btn-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#patientViewModal{{ $patient->id }}">

                                    <i class="bi bi-eye me-1"></i>
                                    View

                                </button>


                                {{-- Edit --}}

                                <a href="{{ route('patients.edit', $patient->id) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit

                                </a>


                                {{-- Delete --}}

                                <form action="{{ route('patients.destroy', $patient->id) }}"
                                      method="POST"
                                      style="display:inline; margin:0;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            style="margin:0;"
                                            onclick="return confirm('Are you sure you want to delete this patient?')">

                                        <i class="bi bi-trash me-1"></i>
                                        Delete

                                    </button>

                                </form>

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

                        <td colspan="9"
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