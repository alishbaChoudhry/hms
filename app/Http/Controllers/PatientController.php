<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::oldest()->paginate(10);

        if ($request->ajax()) {
            return view('patients.partials.table', compact('patients'))->render();
        }

        return view('patients.patients', compact('patients'));
    }

    public function create()
    {
        return view('patients.form');
    }

    public function store(StorePatientRequest $request)
    {
        $patient = Patient::create($request->validated());

        return redirect()
            ->route('patients')
            ->with('success', 'Patient added successfully.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.form', compact('patient'));
    }

    public function update(StorePatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());

        return redirect()
            ->route('patients')
            ->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients')
            ->with('success', 'Patient deleted successfully.');
    }
}