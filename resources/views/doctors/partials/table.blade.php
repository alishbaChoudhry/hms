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
                    <th class="py-3 text-center">Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($doctors as $doctor)

                    <tr>

                        <td class="px-4">
                            {{ $doctor->id }}
                        </td>

                        <td>
                            {{ $doctor->name }}
                        </td>

                        <td>
                            {{ $doctor->email }}
                        </td>

                        <td>
                            {{ $doctor->phone }}
                        </td>

                        <td>
                            {{ $doctor->specialization }}
                        </td>

                        <td class="text-center">

                            <a href="{{ route('doctors.edit', $doctor->id) }}"
                               class="btn btn-sm btn-warning me-1">

                                <i class="bi bi-pencil-square me-1"></i>
                                Edit

                            </a>

                            <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this doctor?')">

                                    <i class="bi bi-trash me-1"></i>
                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

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