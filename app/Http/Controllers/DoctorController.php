<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
{
    $doctors = Doctor::oldest()->paginate(10);

    if ($request->ajax()) {
        return view('doctors.partials.table', compact('doctors'))->render();
    }

    return view('doctors.index', compact('doctors'));
}

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|digits:11',
            'specialization' => 'required',
        ]);

        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'specialization' => $request->specialization,
        ]);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor added successfully.');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|digits:11',
            'specialization' => 'required',
        ]);

        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'specialization' => $request->specialization,
        ]);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor deleted successfully.');
    }
}