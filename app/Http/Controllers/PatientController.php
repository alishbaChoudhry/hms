<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display patients.
     */
    public function index(Request $request)
{
    abort_unless(
        auth()->user()->can('view patients'),
        403
    );

    if (auth()->user()->hasRole('Admin')) {

        $patients = Patient::oldest()->paginate(10);

    } else {

        $doctor = auth()->user()->doctor;

        $patients = Patient::whereHas('appointments', function ($query) use ($doctor) {
            $query->where('doctor_id', $doctor->id);
        })
        ->oldest()
        ->paginate(10);
    }

    if ($request->ajax()) {
        return view(
            'patients.partials.table',
            compact('patients')
        )->render();
    }

    return view(
        'patients.patients',
        compact('patients')
    );
}


    /**
     * Show create patient form.
     */
    public function create()
    {
        abort_unless(
            auth()->user()->can('create patients'),
            403
        );

        return view('patients.form');
    }


    /**
     * Store patient.
     */
    public function store(StorePatientRequest $request)
    {
        abort_unless(
            auth()->user()->can('create patients'),
            403
        );

        Patient::create($request->validated());

        return redirect()
            ->route('patients')
            ->with('success', 'Patient added successfully.');
    }


    /**
     * Show edit patient form.
     */
    public function edit(Patient $patient)
    {
        abort_unless(
            auth()->user()->can('edit patients'),
            403
        );

        return view(
            'patients.form',
            compact('patient')
        );
    }


    /**
     * Update patient.
     */
    public function update(
        StorePatientRequest $request,
        Patient $patient
    ) {
        abort_unless(
            auth()->user()->can('edit patients'),
            403
        );

        $patient->update(
            $request->validated()
        );

        return redirect()
            ->route('patients')
            ->with('success', 'Patient updated successfully.');
    }


    /**
     * Delete patient.
     */
    public function destroy(Patient $patient)
    {
        abort_unless(
            auth()->user()->can('delete patients'),
            403
        );

        $patient->delete();

        return redirect()
            ->route('patients')
            ->with('success', 'Patient deleted successfully.');
    }


    /**
     * Display patient's medical history.
     */
    public function medicalHistory(Patient $patient)
    {
        abort_unless(
            auth()->user()->can('view patients'),
            403
        );

        $patient->load([
            'checkups.doctor',
            'checkups.symptoms',
            'checkups.medicalTests',
            'checkups.medicines',
        ]);

        return view(
            'patients.medical-history',
            compact('patient')
        );
    }
}