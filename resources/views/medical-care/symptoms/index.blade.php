@extends('layouts.app')

@section('title', 'Symptoms')

@section('content')

<div class="content-header py-4">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">
                    Symptoms
                </h2>

                <p class="text-muted mb-0">
                    Manage patient symptoms.
                </p>
            </div>

            <a href="{{ route('symptoms.create') }}"
              class="btn btn-primary">
                Add Symptom
            </a>

        </div>
        
        @if(session('success'))

    <div class="symptom-success-message"
         id="symptomSuccessMessage">

        <span>
            {{ session('success') }}
        </span>

        <button type="button"
                class="symptom-success-close"
                onclick="document.getElementById('symptomSuccessMessage').remove()">

            &times;

        </button>

    </div>

@endif


{{-- Symptoms Card --}}

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <h5 class="fw-bold mb-0">
            Symptoms List
        </h5>

    </div>


    <div id="symptomsTable">

        @include('medical-care.symptoms.partials.table')

    </div>

</div>
        

 </div>
    </div>
</div>

<style>
    .symptom-success-message {
        width: 600px;
        max-width: 100%;

        padding: 12px 16px;
        margin-bottom: 20px;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;

        background: #d1e7dd;
        border: 1px solid #a3cfbb;
        border-radius: 7px;

        color: #0f5132;
        font-size: 14px;
        font-weight: 500;
    }

    .symptom-success-close {
        border: none;
        background: transparent;
        color: #0f5132;

        font-size: 22px;
        line-height: 1;

        cursor: pointer;
        padding: 0;
    }

    .symptom-success-close:hover {
        opacity: 0.6;
    }
</style>

<script>
    setTimeout(function () {

        const message = document.getElementById('symptomSuccessMessage');

        if (message) {
            message.remove();
        }

    }, 3000);
</script>

<script>
    document.addEventListener('click', function (event) {

        const link = event.target.closest('#symptomsTable .pagination a');

        if (!link) {
            return;
        }

        event.preventDefault();

        fetch(link.href, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {

            document.getElementById('symptomsTable').innerHTML = html;

        })
        .catch(error => {

            console.error('AJAX Error:', error);

        });

    });
</script>

@endsection