<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;


// Home
Route::get('/', function () {
    return view('welcome');
});


// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Authentication required routes
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // =========================
    // Patients CRUD
    // =========================

    Route::get('/patients', [PatientController::class, 'index'])
        ->name('patients');

    Route::get('/patients/create', [PatientController::class, 'create'])
        ->name('patients.create');

    Route::post('/patients', [PatientController::class, 'store'])
        ->name('patients.store');

    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])
        ->name('patients.edit');

    Route::put('/patients/{patient}', [PatientController::class, 'update'])
        ->name('patients.update');

    Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])
        ->name('patients.destroy');


    // =========================
    // Doctors CRUD
    // =========================

    Route::get('/doctors', [DoctorController::class, 'index'])
        ->name('doctors.index');

    Route::get('/doctors/create', [DoctorController::class, 'create'])
        ->name('doctors.create');

    Route::post('/doctors', [DoctorController::class, 'store'])
        ->name('doctors.store');

    Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])
        ->name('doctors.edit');

    Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])
        ->name('doctors.update');

    Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])
        ->name('doctors.destroy');


    // =========================
    // Appointments CRUD
    // =========================

    Route::get('/appointments', [AppointmentController::class, 'index'])
        ->name('appointments.index');
        

    Route::get('/appointments/create', [AppointmentController::class, 'create'])
        ->name('appointments.create');

    Route::post('/appointments', [AppointmentController::class, 'store'])
        ->name('appointments.store');

        Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])
    ->name('appointments.show');

    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])
        ->name('appointments.edit');

    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])
        ->name('appointments.update');

        Route::patch('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])
    ->name('appointments.status');

    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])
        ->name('appointments.destroy');

});


// Laravel authentication routes
require __DIR__.'/auth.php';