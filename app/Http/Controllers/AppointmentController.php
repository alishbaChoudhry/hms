<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Get logged-in doctor's profile
     */
    private function getLoggedInDoctor(): ?Doctor
    {
        return auth()->user()->doctor;
    }

    /**
     * Appointment List
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRole('Admin')) {

            // Admin can see all appointments
            $appointments = Appointment::with(['patient', 'doctor'])
                ->oldest()
                ->paginate(10);

        } else {

            // Doctor can see only their own appointments
            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $appointments = Appointment::with(['patient', 'doctor'])
                ->where('doctor_id', $doctor->id)
                ->oldest()
                ->paginate(10);
        }

        if ($request->ajax()) {
            return view(
                'appointments.partials.table',
                compact('appointments')
            )->render();
        }

        return view('appointments.index', compact('appointments'));
    }


    /**
     * Create Appointment Form
     */
    public function create()
    {
        $patients = Patient::orderBy('name')->get();

        if (auth()->user()->hasRole('Admin')) {

            // Admin can select any doctor
            $doctors = Doctor::orderBy('name')->get();

        } else {

            // Doctor can only select themselves
            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $doctors = collect([$doctor]);
        }

        return view(
            'appointments.form',
            compact('patients', 'doctors')
        );
    }


    /**
     * Save Appointment
     */
    public function store(StoreAppointmentRequest $request)
    {
        $data = $request->validated();

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            // Doctor can only create appointment for themselves
            $data['doctor_id'] = $doctor->id;
        }

        Appointment::create($data);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment created successfully.');
    }


    /**
     * Show Appointment
     */
    public function show(Appointment $appointment)
    {
        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $appointment->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        $appointment->load(['patient', 'doctor']);

        return view(
            'appointments.show',
            compact('appointment')
        );
    }


    /**
     * Edit Appointment
     */
    public function edit(Appointment $appointment)
    {
        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $appointment->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        $patients = Patient::orderBy('name')->get();

        if (auth()->user()->hasRole('Admin')) {

            // Admin can select any doctor
            $doctors = Doctor::orderBy('name')->get();

        } else {

    // Doctor can only see themselves
    $doctor = $this->getLoggedInDoctor();

    if (!$doctor) {
        abort(403, 'Access Denied');
    }

    $doctors = collect([$doctor]);
}

        return view(
            'appointments.form',
            compact('appointment', 'patients', 'doctors')
        );
    }


    /**
     * Update Appointment
     */
    public function update(
        StoreAppointmentRequest $request,
        Appointment $appointment
    ) {
        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $appointment->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        $data = $request->validated();

        if (!auth()->user()->hasRole('Admin')) {

            // Doctor cannot transfer appointment to another doctor
            $data['doctor_id'] = $appointment->doctor_id;
        }

        $appointment->update($data);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }


    /**
     * Update Appointment Status
     */
    public function updateStatus(
        Request $request,
        Appointment $appointment
    ) {
        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $appointment->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

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


    /**
     * Delete Appointment
     */
    public function destroy(Appointment $appointment)
    {
        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $appointment->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}