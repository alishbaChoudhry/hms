<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Checkup;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Doctor')) {

    $doctor = $user->doctor;

    $patientsCount = Patient::whereHas('appointments', function ($query) use ($doctor) {
        $query->where('doctor_id', $doctor->id);
    })
    ->distinct()
    ->count();

    $appointmentsCount = Appointment::where(
        'doctor_id',
        $doctor->id
    )->count();

    $checkupsCount = Checkup::where(
        'doctor_id',
        $doctor->id
    )->count();

    return view('dashboard', compact(
        'patientsCount',
        'appointmentsCount',
        'checkupsCount'
    ));
}
        // Admin
        $patientsCount = Patient::count();
        $doctorsCount = Doctor::count();
        $appointmentsCount = Appointment::count();
        $checkupsCount = Checkup::count();

        return view('dashboard', compact(
            'patientsCount',
            'doctorsCount',
            'appointmentsCount',
            'checkupsCount'
        ));
    }
}