<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of medicines.
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        abort_unless(
            $user->can('view medicines'),
            403
        );

        // Admin can see all medicines
        if ($user->hasRole('Admin')) {

            $medicines = Medicine::latest()
                ->paginate(10);

        } else {

            // Doctor can see only medicines created by himself
            $doctor = $user->doctor;

            abort_unless($doctor, 403);

            $medicines = Medicine::where('doctor_id', $doctor->id)
                ->latest()
                ->paginate(10);
        }

        if ($request->ajax()) {
            return view(
                'medical-care.medicines.partials.table',
                compact('medicines')
            )->render();
        }

        return view(
            'medical-care.medicines.index',
            compact('medicines')
        );
    }


    /**
     * Show the form for creating a new medicine.
     */
    public function create()
    {
        $user = auth()->user();

        abort_unless(
            $user->can('create medicines'),
            403
        );

        return view('medical-care.medicines.create');
    }


    /**
     * Store a newly created medicine.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        abort_unless(
            $user->can('create medicines'),
            403
        );

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Medicine is created by Doctor
        if ($user->hasRole('Doctor')) {

            $doctor = $user->doctor;

            abort_unless($doctor, 403);

            Medicine::create([
                'doctor_id' => $doctor->id,
                'name' => $request->name,
            ]);

        } else {

            // Admin can create medicine without a doctor
            Medicine::create([
                'doctor_id' => null,
                'name' => $request->name,
            ]);
        }

        return redirect()
            ->route('medicines.index')
            ->with('success', 'Medicine added successfully.');
    }


    /**
     * Show the form for editing the specified medicine.
     */
    public function edit(Medicine $medicine)
    {
        $user = auth()->user();

        abort_unless(
            $user->can('edit medicines'),
            403
        );

        // Admin can edit any medicine
        if ($user->hasRole('Admin')) {

            return view(
                'medical-care.medicines.edit',
                compact('medicine')
            );
        }

        // Doctor can edit only his own medicine
        $doctor = $user->doctor;

        abort_unless(
            $doctor && $medicine->doctor_id === $doctor->id,
            403
        );

        return view(
            'medical-care.medicines.edit',
            compact('medicine')
        );
    }


    /**
     * Update the specified medicine.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $user = auth()->user();

        abort_unless(
            $user->can('edit medicines'),
            403
        );

        // Doctor can update only his own medicine
        if ($user->hasRole('Doctor')) {

            $doctor = $user->doctor;

            abort_unless(
                $doctor && $medicine->doctor_id === $doctor->id,
                403
            );
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $medicine->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('medicines.index')
            ->with('success', 'Medicine updated successfully.');
    }


    /**
     * Remove the specified medicine.
     */
    public function destroy(Medicine $medicine)
    {
        $user = auth()->user();

        abort_unless(
            $user->can('delete medicines'),
            403
        );

        // Admin can delete any medicine
        if ($user->hasRole('Admin')) {

            $medicine->delete();

        } else {

            // Doctor can delete only his own medicine
            $doctor = $user->doctor;

            abort_unless(
                $doctor && $medicine->doctor_id === $doctor->id,
                403
            );

            $medicine->delete();
        }

        return redirect()
            ->route('medicines.index')
            ->with('success', 'Medicine deleted successfully.');
    }
}
