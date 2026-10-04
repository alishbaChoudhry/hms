<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    /**
     * Display a listing of symptoms.
     */
    public function index()
{
    $symptoms = Symptom::latest()->paginate(10);

    if (request()->ajax()) {
        return view(
            'medical-care.symptoms.partials.table',
            compact('symptoms')
        );
    }

    return view(
        'medical-care.symptoms.index',
        compact('symptoms')
    );
}


    /**
     * Show the form for creating a new symptom.
     */
    public function create()
    {
        return view('medical-care.symptoms.create');
    }

    /**
     * Store a newly created symptom.
     */
    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'nullable|string|max:1000',
    'type' => 'required|in:Text,Number,Boolean',
]);

        Symptom::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        return redirect()
            ->route('symptoms.index')
            ->with('success', 'Symptom added successfully.');
    }

    /**
     * Show the form for editing the specified symptom.
     */
    public function edit(Symptom $symptom)
    {
        return view(
            'medical-care.symptoms.edit',
            compact('symptom')
        );
    }

    /**
     * Update the specified symptom.
     */
    public function update(Request $request, Symptom $symptom)
    {
        $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'nullable|string|max:1000',
    'type' => 'required|in:Text,Number,Boolean',
]);

        $symptom->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        return redirect()
            ->route('symptoms.index')
            ->with('success', 'Symptom updated successfully.');
    }

    /**
     * Remove the specified symptom.
     */
    public function destroy(Symptom $symptom)
    {
        $symptom->delete();

        return redirect()
            ->route('symptoms.index')
            ->with('success', 'Symptom deleted successfully.');
    }
}