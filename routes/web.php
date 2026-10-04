<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\MedicalTestController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\DosageController;
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

        Route::get(
    '/patients/{patient}/medical-history',
    [PatientController::class, 'medicalHistory']
)->name('patients.medical-history');

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


    Route::get('/medical-care', function () {
    return view('medical-care.index');
})->name('medical-care');

Route::get('/symptoms', [SymptomController::class, 'index'])
    ->name('symptoms.index');

    Route::get('/symptoms/create', [SymptomController::class, 'create'])
    ->name('symptoms.create');

Route::post('/symptoms', [SymptomController::class, 'store'])
    ->name('symptoms.store');

    Route::get('/symptoms/{symptom}/edit', [SymptomController::class, 'edit'])
    ->name('symptoms.edit');

Route::put('/symptoms/{symptom}', [SymptomController::class, 'update'])
    ->name('symptoms.update');

    Route::delete('/symptoms/{symptom}', [SymptomController::class, 'destroy'])
    ->name('symptoms.destroy');

    // =========================
// Medical Tests CRUD
// =========================

Route::get('/medical-tests', [MedicalTestController::class, 'index'])
    ->name('medical-tests.index');

Route::get('/medical-tests/create', [MedicalTestController::class, 'create'])
    ->name('medical-tests.create');

Route::post('/medical-tests', [MedicalTestController::class, 'store'])
    ->name('medical-tests.store');

Route::get('/medical-tests/{medicalTest}/edit', [MedicalTestController::class, 'edit'])
    ->name('medical-tests.edit');

Route::put('/medical-tests/{medicalTest}', [MedicalTestController::class, 'update'])
    ->name('medical-tests.update');

Route::delete('/medical-tests/{medicalTest}', [MedicalTestController::class, 'destroy'])
    ->name('medical-tests.destroy');

    // =========================
// Medicines CRUD
// =========================

Route::get('/medicines', [MedicineController::class, 'index'])
    ->name('medicines.index');

Route::get('/medicines/create', [MedicineController::class, 'create'])
    ->name('medicines.create');

Route::post('/medicines', [MedicineController::class, 'store'])
    ->name('medicines.store');

Route::get('/medicines/{medicine}/edit', [MedicineController::class, 'edit'])
    ->name('medicines.edit');

Route::put('/medicines/{medicine}', [MedicineController::class, 'update'])
    ->name('medicines.update');

Route::delete('/medicines/{medicine}', [MedicineController::class, 'destroy'])
    ->name('medicines.destroy');

    // =========================
// Checkups
// =========================

Route::get('/checkups', [CheckupController::class, 'index'])
    ->name('checkups.index');

Route::get('/checkups/create', [CheckupController::class, 'create'])
    ->name('checkups.create');

Route::post('/checkups', [CheckupController::class, 'store'])
    ->name('checkups.store');

    Route::get('/checkups/{checkup}', [CheckupController::class, 'show'])
    ->name('checkups.show');

Route::get('/checkups/{checkup}/edit', [CheckupController::class, 'edit'])
    ->name('checkups.edit');

Route::put('/checkups/{checkup}', [CheckupController::class, 'update'])
    ->name('checkups.update');

Route::delete('/checkups/{checkup}', [CheckupController::class, 'destroy'])
    ->name('checkups.destroy');

    Route::resource('dosages', DosageController::class);
});

// Laravel authentication routes
require __DIR__.'/auth.php';
