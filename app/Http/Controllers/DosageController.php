<?php

namespace App\Http\Controllers;

use App\Models\Dosage;
use Illuminate\Http\Request;

class DosageController extends Controller
{
    /**
     * Display a listing of dosages.
     */
    public function index()
    {
        $dosages = Dosage::latest()->paginate(10);

        return view('medical-care.dosages.index', compact('dosages'));
    }

    /**
     * Show the form for creating a new dosage.
     */
    public function create()
    {
        return view('medical-care.dosages.create');
    }

    /**
     * Store a newly created dosage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dosage' => 'required|string|max:100',
            'frequency' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
        ]);

        Dosage::create([
            'dosage' => $request->dosage,
            'frequency' => $request->frequency,
            'duration' => $request->duration,
        ]);

        return redirect()
            ->route('dosages.index')
            ->with('success', 'Dosage added successfully.');
    }

    /**
     * Show the form for editing the specified dosage.
     */
    public function edit(Dosage $dosage)
    {
       return view('medical-care.dosages.edit', compact('dosage'));
    }

    /**
     * Update the specified dosage.
     */
    public function update(Request $request, Dosage $dosage)
    {
        $request->validate([
            'dosage' => 'required|string|max:100',
            'frequency' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
        ]);

        $dosage->update([
            'dosage' => $request->dosage,
            'frequency' => $request->frequency,
            'duration' => $request->duration,
        ]);

        return redirect()
            ->route('dosages.index')
            ->with('success', 'Dosage updated successfully.');
    }

    /**
     * Remove the specified dosage.
     */
    public function destroy(Dosage $dosage)
    {
        $dosage->delete();

        return redirect()
            ->route('dosages.index')
            ->with('success', 'Dosage deleted successfully.');
    }
}