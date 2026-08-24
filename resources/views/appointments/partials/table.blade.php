<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

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
                        Time
                    </th>

                    <th class="py-3">
                        Type
                    </th>

                    <th class="py-3">
                        Status
                    </th>

                    

                    <th class="py-3 text-center" style="width: 180px;">
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
                            {{ $appointment->patient->name }}
                        </td>

                        {{-- Doctor --}}
                        <td>
                            {{ $appointment->doctor->name }}
                        </td>

                        {{-- Date --}}
                        <td>
                            {{ $appointment->appointment_date }}
                        </td>

                        {{-- Time --}}
                        <td>
                            {{ $appointment->appointment_time }}
                        </td>

                        {{-- Type --}}
                        <td>
                            {{ $appointment->appointment_type }}
                        </td>

                        {{-- Status --}}
                        <td>

                            <form action="{{ route('appointments.status', $appointment->id) }}"
                                  method="POST">

                                @csrf
                                @method('PATCH')

                                <select name="status"
                                        class="form-select form-select-sm status"
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

                        </td>


                        {{-- Actions --}}
                        <td class="text-center"
                            style="width: 180px; min-width: 180px; white-space: nowrap;">

                            {{-- View --}}
                            <button type="button"
                             class="btn btn-sm btn-info me-1"
                             data-bs-toggle="modal"
                             data-bs-target="#appointmentViewModal{{ $appointment->id }}">

                            <i class="bi bi-eye me-1"></i>
                            View

                            </button>

                            {{-- Edit --}}
                            <a href="{{ route('appointments.edit', $appointment->id) }}"
                               class="btn btn-sm btn-warning me-1">

                                <i class="bi bi-pencil-square me-1"></i>
                                Edit

                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this appointment?')">

                                    <i class="bi bi-trash me-1"></i>
                                    Delete

                                </button>

                            </form>

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

                        <td colspan="8"
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