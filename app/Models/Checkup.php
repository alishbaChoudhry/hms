<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'diagnosis',
        'notes',
        'follow_up_date',
    ];


    // Checkup belongs to one patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    // Checkup belongs to one doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    // Checkup can have many symptoms
public function symptoms()
{
    return $this->belongsToMany(Symptom::class)
                ->withPivot('value')
                ->withTimestamps();
}


    // Checkup can have many medical tests
    public function medicalTests()
    {
        return $this->belongsToMany(MedicalTest::class);
    }


    // Checkup can have many medicines
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)
                    ->withPivot([
                        'dosage',
                        'frequency',
                        'duration',
                        'custom_medicine_name',
                    ])
                    ->withTimestamps();
    }
}