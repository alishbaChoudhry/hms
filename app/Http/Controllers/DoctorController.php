<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display doctors.
     */
    public function index(Request $request)
    {
         $this->authorize('view doctors');
        


        $doctors = Doctor::oldest()->paginate(10);

        if ($request->ajax()) {
            return view(
                'doctors.partials.table',
                compact('doctors')
            )->render();
        }

        return view(
            'doctors.index',
            compact('doctors')
        );
    }


    /**
     * Show create doctor form.
     */
    public function create()
    {
        $this->authorize('create doctors');
        return view('doctors.create');
    }


    /**
     * Store doctor.
     */
    public function store(Request $request)
    {
        $this->authorize('create doctors');

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

        return redirect()
            ->route('doctors.index')
            ->with(
                'success',
                'Doctor added successfully.'
            );
    }


    /**
     * Show edit doctor form.
     */
    public function edit(Doctor $doctor)
    {
        $this->authorize('edit doctors');

        return view(
            'doctors.edit',
            compact('doctor')
        );
    }


    /**
     * Update doctor.
     */
    public function update(
        Request $request,
        Doctor $doctor
    ) {
        $this->authorize('edit doctors');

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

        return redirect()
            ->route('doctors.index')
            ->with(
                'success',
                'Doctor updated successfully.'
            );
    }


    /**
     * Delete doctor.
     */
    public function destroy(Doctor $doctor)
    {
       $this->authorize('delete doctors');

        $doctor->delete();

        return redirect()
            ->route('doctors.index')
            ->with(
                'success',
                'Doctor deleted successfully.'
            );
    }
}