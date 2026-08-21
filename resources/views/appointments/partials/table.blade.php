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

                    <th class="py-3" style="width: 220px;">
                        Reason / Symptoms
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

                        {{-- Reason / Symptoms --}}
                        <td style="
                            width: 220px;
                            min-width: 220px;
                            max-width: 220px;
                            white-space: normal;
                            word-break: break-word;
                        ">
                            {{ $appointment->reason }}
                        </td>

                        {{-- Actions --}}
                        <td class="text-center"
                            style="width: 180px; min-width: 180px; white-space: nowrap;">

                            {{-- View --}}
                            <a href="{{ route('appointments.show', $appointment->id) }}"
                               class="btn btn-sm btn-info me-1">

                                <i class="bi bi-eye me-1"></i>
                                View

                            </a>

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

                @empty

                    <tr>

                        <td colspan="9"
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