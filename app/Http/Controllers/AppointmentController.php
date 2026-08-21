<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Appointment List
    public function index(Request $request)
{
    $appointments = Appointment::with(['patient', 'doctor'])
        ->oldest()
        ->paginate(10);

    if ($request->ajax()) {
        return view('appointments.partials.table', compact('appointments'))->render();
    }

    return view('appointments.index', compact('appointments'));
}

    // Create Appointment Form
    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get();

        return view('appointments.form', compact('patients', 'doctors'));
    }

    // Save Appointment
    public function store(StoreAppointmentRequest $request)
    {
        Appointment::create($request->validated());

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment created successfully.');
    }

    public function show(Appointment $appointment)
{
    $appointment->load(['patient', 'doctor']);

    return view('appointments.show', compact('appointment'));
}

    // Edit Appointment
    public function edit(Appointment $appointment)
    {
        $patients = Patient::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get();

        return view(
            'appointments.form',
            compact('appointment', 'patients', 'doctors')
        );
    }

    // Update Appointment
    public function update(
        StoreAppointmentRequest $request,
        Appointment $appointment
    ) {
        $appointment->update($request->validated());

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    // Update Appointment Status
public function updateStatus(Request $request, Appointment $appointment)
{
    $request->validate([
        'status' => [
            'required',
            'in:Pending,Confirmed,Completed,Cancelled',
        ],
    ]);

    $appointment->update([
        'status' => $request->status,
    ]);

    return redirect()
        ->route('appointments.index')
       ->with('success', 'Appointment status updated successfully.');
}

    // Delete Appointment
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}