<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index(Request $request)
{
    $symptoms = Symptom::oldest()->paginate(10);

    if ($request->ajax()) {
        return view(
            'medical-care.symptoms.partials.table',
            compact('symptoms')
        )->render();
    }

    return view(
        'medical-care.symptoms.index',
        compact('symptoms')
    );
}

    public function create()
    {
        return view('medical-care.symptoms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:symptoms,name',
        ]);

        Symptom::create($validated);

        return redirect()
            ->route('symptoms.index')
            ->with('success', 'Symptom added successfully.');
    }

    public function edit(Symptom $symptom)
{
    return view('medical-care.symptoms.edit', compact('symptom'));
}

public function update(Request $request, Symptom $symptom)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:symptoms,name,' . $symptom->id,
    ]);

    $symptom->update($validated);

    return redirect()
        ->route('symptoms.index')
        ->with('success', 'Symptom updated successfully.');
}

    public function destroy(Symptom $symptom)
    {
        $symptom->delete();

        return redirect()
            ->route('symptoms.index')
            ->with('success', 'Symptom deleted successfully.');
    }
}