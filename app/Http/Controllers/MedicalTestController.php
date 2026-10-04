<?php

namespace App\Http\Controllers;

use App\Models\MedicalTest;
use Illuminate\Http\Request;

class MedicalTestController extends Controller
{
    /**
     * Display a listing of medical tests.
     */
    public function index(Request $request)
    {
        $medicalTests = MedicalTest::oldest()->paginate(10);

        if ($request->ajax()) {

            return view(
                'medical-care.medical-tests.partials.table',
                compact('medicalTests')
            )->render();

        }

        return view(
            'medical-care.medical-tests.index',
            compact('medicalTests')
        );
    }


    /**
     * Show the form for creating a new medical test.
     */
    public function create()
    {
        return view('medical-care.medical-tests.create');
    }


    /**
     * Store a newly created medical test.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:medical_tests,name',
        ]);

        MedicalTest::create($validated);

        return redirect()
            ->route('medical-tests.index')
            ->with('success', 'Medical test added successfully.');
    }


    /**
     * Show the form for editing the specified medical test.
     */
    public function edit(MedicalTest $medicalTest)
    {
        return view(
            'medical-care.medical-tests.edit',
            compact('medicalTest')
        );
    }


    /**
     * Update the specified medical test.
     */
    public function update(Request $request, MedicalTest $medicalTest)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:medical_tests,name,' . $medicalTest->id,
        ]);

        $medicalTest->update($validated);

        return redirect()
            ->route('medical-tests.index')
            ->with('success', 'Medical test updated successfully.');
    }


    /**
     * Remove the specified medical test.
     */
    public function destroy(MedicalTest $medicalTest)
    {
        $medicalTest->delete();

        return redirect()
            ->route('medical-tests.index')
            ->with('success', 'Medical test deleted successfully.');
    }
}