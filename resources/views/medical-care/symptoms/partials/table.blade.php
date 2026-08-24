<div class="card-body p-0">

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead style="background: #f8fafc;">

                <tr>

                    <th class="px-4 py-3">
                        ID
                    </th>

                    <th class="py-3">
                        Symptom
                    </th>

                    <th class="py-3">
                        Created At
                    </th>

                    <th class="py-3 text-center"
                        style="width: 270px; min-width: 270px;">

                        Actions

                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($symptoms as $symptom)

                    <tr>

                        <td class="px-4">
                            {{ $symptom->id }}
                        </td>

                        <td>
                            {{ $symptom->name }}
                        </td>

                        <td>
                            {{ $symptom->created_at->format('d M Y') }}
                        </td>

                        <td class="text-center"
                            style="width: 270px; min-width: 270px; white-space: nowrap;">

                            <div class="d-flex justify-content-center align-items-center gap-1">

                                {{-- Edit --}}

                                <a href="{{ route('symptoms.edit', $symptom->id) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit

                                </a>


                                {{-- Delete --}}

                                <form action="{{ route('symptoms.destroy', $symptom->id) }}"
                                      method="POST"
                                      class="m-0 p-0 d-flex align-items-center">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this symptom?')">

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

                            No symptoms found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}

    <div class="px-4 py-3 border-top">

        {{ $symptoms->links() }}

    </div>

</div>