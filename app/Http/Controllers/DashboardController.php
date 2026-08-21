<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $patientsCount = Patient::count();
        $doctorsCount = Doctor::count();
        $appointmentsCount = Appointment::count();

        return view('dashboard', compact(
            'patientsCount',
            'doctorsCount',
            'appointmentsCount'
        ));
    }
}