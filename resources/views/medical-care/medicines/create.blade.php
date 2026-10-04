@extends('layouts.app')

@section('title', 'Add Medicine')

@section('content')

{{-- Page Header --}}

<div class="content-header py-4">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            {{-- Page Title --}}

            <div>

                <h1 class="mb-1"
                    style="font-size: 28px; font-weight: 600; color: #1f2937;">

                    Add a New Medicine

                </h1>

                <p class="mb-0 text-muted"
                   style="font-size: 14px;">

                    Add a new medicine to the available medicines list.

                </p>

            </div>


            {{-- Back Button --}}

            <div>

                <a href="{{ route('medicines.index') }}"
                   class="btn btn-outline-primary px-3">

                    <i class="bi bi-arrow-left me-1"></i>

                    Back to Medicines

                </a>

            </div>

        </div>

    </div>
</div>


{{-- Form Section --}}

<div class="content pt-2">

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8 col-xl-7">

                {{-- Medicine Card --}}

                <div class="card shadow-sm border-0"
                     style="border-radius: 10px; overflow: hidden;">


                    {{-- Card Header --}}

                    <div class="card-header bg-white py-3 px-4"
                         style="border-bottom: 1px solid #e5e7eb;">

                        <h3 class="card-title mb-0"
                            style="font-size: 18px; font-weight: 500; color: #1f2937;">

                            <i class="bi bi-capsule me-2"
                               style="color: #0d6efd;"></i>

                            Medicine Information

                        </h3>

                    </div>


                    {{-- Form --}}

                    <form action="{{ route('medicines.store') }}"
                          method="POST">

                        @csrf

                        <div class="card-body px-4 py-4">

                            <div class="row">

                                {{-- Medicine Name --}}

                                <div class="col-md-12 mb-3">

                                    <label for="name"
                                           class="form-label"
                                           style="font-weight: 500; color: #374151;">

                                        Medicine Name

                                    </label>


                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}"
                                        placeholder="Enter medicine name"
                                    >


                                    @error('name')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- Buttons --}}

                        <div class="card-footer bg-white d-flex justify-content-end gap-2 px-4 py-3"
                             style="border-top: 1px solid #e5e7eb;">

                            <a href="{{ route('medicines.index') }}"
                               class="btn btn-danger px-3">

                                <i class="bi bi-x-circle me-1"></i>

                                Cancel

                            </a>


                            <button type="submit"
                                    class="btn btn-primary px-3">

                                <i class="bi bi-check-circle me-1"></i>

                                Save Medicine

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection