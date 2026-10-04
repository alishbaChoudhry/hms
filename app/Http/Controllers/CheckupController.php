<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Symptom;
use App\Models\MedicalTest;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckupController extends Controller
{
    /**
     * Get logged-in doctor's profile.
     */
    private function getLoggedInDoctor(): ?Doctor
    {
        return auth()->user()->doctor;
    }

    /**
     * Display checkups.
     */
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {

            // Admin can see all checkups.
            $checkups = Checkup::with([
                'patient',
                'doctor',
                'symptoms',
                'medicalTests',
                'medicines',
            ])
                ->latest()
                ->paginate(10);

        } else {

            // Doctor can see only their own checkups.
            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $checkups = Checkup::with([
                'patient',
                'doctor',
                'symptoms',
                'medicalTests',
                'medicines',
            ])
                ->where('doctor_id', $doctor->id)
                ->latest()
                ->paginate(10);
        }

        /*
        |--------------------------------------------------------------------------
        | Manual Medicines
        |--------------------------------------------------------------------------
        */

        $manualMedicines = DB::table('checkup_medicine')
            ->whereIn('checkup_id', $checkups->pluck('id'))
            ->whereNull('medicine_id')
            ->get()
            ->groupBy('checkup_id');

        return view(
            'medical-care.checkups.index',
            compact('checkups', 'manualMedicines')
        );
    }

    /**
     * Show create checkup form.
     */
    public function create()
    {
        $patients = Patient::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Doctors
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->hasRole('Admin')) {

            // Admin can select any doctor.
            $doctors = Doctor::orderBy('name')->get();

        } else {

            // Doctor can only select themselves.
            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $doctors = collect([$doctor]);
        }

        /*
        |--------------------------------------------------------------------------
        | Symptoms & Medical Tests
        |--------------------------------------------------------------------------
        */

        $symptoms = Symptom::orderBy('name')->get();

        $medicalTests = MedicalTest::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Medicines
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->hasRole('Admin')) {

            // Admin can see all medicines.
            $medicines = Medicine::orderBy('name')->get();

        } else {

            // Doctor can see only their own medicines.
            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $medicines = Medicine::where('doctor_id', $doctor->id)
                ->orderBy('name')
                ->get();
        }

        return view(
            'medical-care.checkups.create',
            compact(
                'patients',
                'doctors',
                'symptoms',
                'medicalTests',
                'medicines'
            )
        );
    }

    /**
     * Store checkup.
     */
    public function store(Request $request)
    {
        $request->validate([

            'patient_id' => 'required|exists:patients,id',

            'doctor_id' => 'required|exists:doctors,id',

            'symptoms' => 'nullable|array',
            'symptoms.*' => 'exists:symptoms,id',

            'medical_tests' => 'nullable|array',
            'medical_tests.*' => 'exists:medical_tests,id',

            'diagnosis' => 'nullable|string|max:1000',

            'notes' => 'nullable|string|max:2000',

            'medicines' => 'nullable|array',

            'medicines.*.id' =>
                'nullable|exists:medicines,id',

            'medicines.*.custom_name' =>
                'nullable|string|max:255',

            'medicines.*.dosage' =>
                'nullable|string|max:255',

            'medicines.*.frequency' =>
                'nullable|string|max:255',

            'medicines.*.duration' =>
                'nullable|string|max:255',

            'follow_up_date' =>
                'nullable|date',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Doctor Medicine Access
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $medicineIds = collect($request->medicines ?? [])
                ->pluck('id')
                ->filter()
                ->unique();

            $invalidMedicine = Medicine::whereIn('id', $medicineIds)
                ->where('doctor_id', '!=', $doctor->id)
                ->exists();

            if ($invalidMedicine) {
                abort(403, 'Access Denied');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Checkup Data
        |--------------------------------------------------------------------------
        */

        $data = $request->only([
            'patient_id',
            'doctor_id',
            'diagnosis',
            'notes',
            'follow_up_date',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Doctor Can Only Create Checkup For Themselves
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $data['doctor_id'] = $doctor->id;
        }

        /*
        |--------------------------------------------------------------------------
        | Create Checkup
        |--------------------------------------------------------------------------
        */

        $checkup = Checkup::create($data);

        /*
        |--------------------------------------------------------------------------
        | Attach Symptoms
        |--------------------------------------------------------------------------
        */

        $checkup->symptoms()->sync(
            $request->symptoms ?? []
        );

        /*
        |--------------------------------------------------------------------------
        | Attach Medical Tests
        |--------------------------------------------------------------------------
        */

        $checkup->medicalTests()->sync(
            $request->medical_tests ?? []
        );

        /*
        |--------------------------------------------------------------------------
        | Attach Medicines
        |--------------------------------------------------------------------------
        */

        $usedMedicineIds = [];

        foreach ($request->medicines ?? [] as $medicine) {

            /*
            |--------------------------------------------------------------------------
            | Existing Medicine
            |--------------------------------------------------------------------------
            */

            if (!empty($medicine['id'])) {

                $medicineId = (int) $medicine['id'];

                // Prevent duplicate medicine selection.
                if (in_array($medicineId, $usedMedicineIds)) {
                    continue;
                }

                $usedMedicineIds[] = $medicineId;

                DB::table('checkup_medicine')->insert([

                    'checkup_id' =>
                        $checkup->id,

                    'medicine_id' =>
                        $medicineId,

                    'custom_medicine_name' =>
                        null,

                    'dosage' =>
                        $medicine['dosage'] ?? null,

                    'frequency' =>
                        $medicine['frequency'] ?? null,

                    'duration' =>
                        $medicine['duration'] ?? null,

                    'created_at' =>
                        now(),

                    'updated_at' =>
                        now(),
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Manual Medicine
            |--------------------------------------------------------------------------
            */

            elseif (!empty($medicine['custom_name'])) {

                DB::table('checkup_medicine')->insert([

                    'checkup_id' =>
                        $checkup->id,

                    'medicine_id' =>
                        null,

                    'custom_medicine_name' =>
                        $medicine['custom_name'],

                    'dosage' =>
                        $medicine['dosage'] ?? null,

                    'frequency' =>
                        $medicine['frequency'] ?? null,

                    'duration' =>
                        $medicine['duration'] ?? null,

                    'created_at' =>
                        now(),

                    'updated_at' =>
                        now(),
                ]);
            }
        }

        return redirect()
            ->route('checkups.index')
            ->with(
                'success',
                'Checkup added successfully.'
            );
    }

    /**
     * Display the specified checkup.
     */
    public function show(Checkup $checkup)
    {
        /*
        |--------------------------------------------------------------------------
        | Doctor Access
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $checkup->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Load Relationships
        |--------------------------------------------------------------------------
        */

        $checkup->load([
            'patient',
            'doctor',
            'symptoms',
            'medicalTests',
            'medicines',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Manual Medicines
        |--------------------------------------------------------------------------
        */

        $manualMedicines = DB::table('checkup_medicine')
            ->where('checkup_id', $checkup->id)
            ->whereNull('medicine_id')
            ->get();

        return view(
            'medical-care.checkups.show',
            compact(
                'checkup',
                'manualMedicines'
            )
        );
    }

    /**
     * Show the form for editing the specified checkup.
     */
    public function edit(Checkup $checkup)
    {
        /*
        |--------------------------------------------------------------------------
        | Doctor Access
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $checkup->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Patients
        |--------------------------------------------------------------------------
        */

        $patients = Patient::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Doctors
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->hasRole('Admin')) {

            // Admin can select any doctor.
            $doctors = Doctor::orderBy('name')->get();

        } else {

            // Doctor can only see themselves.
            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $doctors = collect([$doctor]);
        }

        /*
        |--------------------------------------------------------------------------
        | Symptoms & Medical Tests
        |--------------------------------------------------------------------------
        */

        $symptoms = Symptom::orderBy('name')->get();

        $medicalTests = MedicalTest::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Medicines
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->hasRole('Admin')) {

            // Admin can see all medicines.
            $medicines = Medicine::orderBy('name')->get();

        } else {

            // Doctor can see only their own medicines.
            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $medicines = Medicine::where('doctor_id', $doctor->id)
                ->orderBy('name')
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Load Checkup Relationships
        |--------------------------------------------------------------------------
        */

        $checkup->load([
            'symptoms',
            'medicalTests',
            'medicines',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Load Manual Medicines
        |--------------------------------------------------------------------------
        */

        $manualMedicines = DB::table('checkup_medicine')
            ->where('checkup_id', $checkup->id)
            ->whereNull('medicine_id')
            ->get();

        return view(
            'medical-care.checkups.edit',
            compact(
                'checkup',
                'patients',
                'doctors',
                'symptoms',
                'medicalTests',
                'medicines',
                'manualMedicines'
            )
        );
    }

    /**
     * Update the specified checkup.
     */
    public function update(Request $request, Checkup $checkup)
    {
        /*
        |--------------------------------------------------------------------------
        | Doctor Access
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $checkup->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'patient_id' => 'required|exists:patients,id',

            'doctor_id' => 'required|exists:doctors,id',

            'symptoms' => 'nullable|array',
            'symptoms.*' => 'exists:symptoms,id',

            'symptom_values' => 'nullable|array',

            'medical_tests' => 'nullable|array',
            'medical_tests.*' => 'exists:medical_tests,id',

            'diagnosis' => 'nullable|string|max:1000',

            'notes' => 'nullable|string|max:2000',

            'medicines' => 'nullable|array',

            'medicines.*.id' =>
                'nullable|exists:medicines,id',

            'medicines.*.custom_name' =>
                'nullable|string|max:255',

            'medicines.*.dosage' =>
                'nullable|string|max:255',

            'medicines.*.frequency' =>
                'nullable|string|max:255',

            'medicines.*.duration' =>
                'nullable|string|max:255',

            'follow_up_date' =>
                'nullable|date',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Doctor Medicine Access
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor) {
                abort(403, 'Access Denied');
            }

            $medicineIds = collect($request->medicines ?? [])
                ->pluck('id')
                ->filter()
                ->unique();

            $invalidMedicine = Medicine::whereIn('id', $medicineIds)
                ->where('doctor_id', '!=', $doctor->id)
                ->exists();

            if ($invalidMedicine) {
                abort(403, 'Access Denied');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Checkup Data
        |--------------------------------------------------------------------------
        */

        $data = $request->only([
            'patient_id',
            'doctor_id',
            'diagnosis',
            'notes',
            'follow_up_date',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Doctor Cannot Transfer Checkup
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $data['doctor_id'] = $checkup->doctor_id;
        }

        /*
        |--------------------------------------------------------------------------
        | Database Transaction
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use ($request, $checkup, $data) {

            /*
            |--------------------------------------------------------------------------
            | Update Checkup
            |--------------------------------------------------------------------------
            */

            $checkup->update($data);

            /*
            |--------------------------------------------------------------------------
            | Update Symptoms
            |--------------------------------------------------------------------------
            */

            $symptomData = [];

            foreach ($request->symptoms ?? [] as $symptomId) {

                $symptomData[$symptomId] = [
                    'value' => $request->input(
                        'symptom_values.' . $symptomId
                    ),
                ];
            }

            $checkup->symptoms()->sync($symptomData);

            /*
            |--------------------------------------------------------------------------
            | Update Medical Tests
            |--------------------------------------------------------------------------
            */

            $checkup->medicalTests()->sync(
                $request->medical_tests ?? []
            );

            /*
            |--------------------------------------------------------------------------
            | Remove Existing Medicines
            |--------------------------------------------------------------------------
            */

            DB::table('checkup_medicine')
                ->where('checkup_id', $checkup->id)
                ->delete();

            /*
            |--------------------------------------------------------------------------
            | Add Submitted Medicines
            |--------------------------------------------------------------------------
            */

            $usedMedicineIds = [];

            foreach ($request->medicines ?? [] as $medicine) {

                /*
                |--------------------------------------------------------------------------
                | Existing Medicine
                |--------------------------------------------------------------------------
                */

                if (!empty($medicine['id'])) {

                    $medicineId = (int) $medicine['id'];

                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Duplicate Medicine
                    |--------------------------------------------------------------------------
                    */

                    if (in_array($medicineId, $usedMedicineIds)) {
                        continue;
                    }

                    $usedMedicineIds[] = $medicineId;

                    /*
                    |--------------------------------------------------------------------------
                    | Insert Existing Medicine
                    |--------------------------------------------------------------------------
                    */

                    DB::table('checkup_medicine')->insert([

                        'checkup_id' =>
                            $checkup->id,

                        'medicine_id' =>
                            $medicineId,

                        'custom_medicine_name' =>
                            null,

                        'dosage' =>
                            $medicine['dosage'] ?? null,

                        'frequency' =>
                            $medicine['frequency'] ?? null,

                        'duration' =>
                            $medicine['duration'] ?? null,

                        'created_at' =>
                            now(),

                        'updated_at' =>
                            now(),
                    ]);
                }

                /*
                |--------------------------------------------------------------------------
                | Manual Medicine
                |--------------------------------------------------------------------------
                */

                elseif (!empty($medicine['custom_name'])) {

                    DB::table('checkup_medicine')->insert([

                        'checkup_id' =>
                            $checkup->id,

                        'medicine_id' =>
                            null,

                        'custom_medicine_name' =>
                            $medicine['custom_name'],

                        'dosage' =>
                            $medicine['dosage'] ?? null,

                        'frequency' =>
                            $medicine['frequency'] ?? null,

                        'duration' =>
                            $medicine['duration'] ?? null,

                        'created_at' =>
                            now(),

                        'updated_at' =>
                            now(),
                    ]);
                }
            }
        });

        return redirect()
            ->route('checkups.index')
            ->with(
                'success',
                'Checkup updated successfully.'
            );
    }

    /**
     * Delete the specified checkup.
     */
    public function destroy(Checkup $checkup)
    {
        /*
        |--------------------------------------------------------------------------
        | Doctor Access
        |--------------------------------------------------------------------------
        */

        if (!auth()->user()->hasRole('Admin')) {

            $doctor = $this->getLoggedInDoctor();

            if (!$doctor || $checkup->doctor_id !== $doctor->id) {
                abort(403, 'Access Denied');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Remove Relationships
        |--------------------------------------------------------------------------
        */

        $checkup->symptoms()->detach();

        $checkup->medicalTests()->detach();

        /*
        |--------------------------------------------------------------------------
        | Remove Medicines
        |--------------------------------------------------------------------------
        */

        DB::table('checkup_medicine')
            ->where('checkup_id', $checkup->id)
            ->delete();

        /*
        |--------------------------------------------------------------------------
        | Delete Checkup
        |--------------------------------------------------------------------------
        */

        $checkup->delete();

        return redirect()
            ->route('checkups.index')
            ->with(
                'success',
                'Checkup deleted successfully.'
            );
    }
}
