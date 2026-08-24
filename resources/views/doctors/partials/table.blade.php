<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead style="background: #f8fafc;">

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
                            {{ $doctor->id }}
                        </td>


                        {{-- Name --}}
                        <td>
                            {{ $doctor->name }}
                        </td>


                        {{-- Email --}}
                        <td>
                            {{ $doctor->email }}
                        </td>


                        {{-- Phone --}}
                        <td>
                            {{ $doctor->phone }}
                        </td>


                        {{-- Specialization --}}
                        <td>
                            {{ $doctor->specialization }}
                        </td>


                        {{-- Actions --}}
                        <td class="text-center"
                            style="width: 270px; min-width: 270px; white-space: nowrap;">

                            <div class="d-flex justify-content-center align-items-center gap-1">

                                {{-- View --}}

                                <button type="button"
                                        class="btn btn-sm btn-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#doctorViewModal{{ $doctor->id }}">

                                    <i class="bi bi-eye me-1"></i>
                                    View

                                </button>


                                {{-- Edit --}}

                                <a href="{{ route('doctors.edit', $doctor->id) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit

                                </a>


                                {{-- Delete --}}

                                <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                method="POST"
                                class="m-0 p-0 d-flex align-items-center">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this doctor?')">

                                    <i class="bi bi-trash me-1"></i>
                                    Delete

                                  </button>

                                </form>

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