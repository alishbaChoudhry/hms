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

                    <th class="py-3 text-center">
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

                        <td class="text-center">

                            {{-- Edit --}}

                            <a href="{{ route('patients.edit', $patient->id) }}"
                               class="btn btn-sm btn-warning me-1">

                                <i class="bi bi-pencil-square me-1"></i>
                                Edit

                            </a>


                            {{-- Delete --}}

                            <form action="{{ route('patients.destroy', $patient->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this patient?')">

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