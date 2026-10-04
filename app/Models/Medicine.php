<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'doctor_id',
    ];

    // Medicine belongs to one doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Medicine can belong to many checkups
    public function checkups()
    {
        return $this->belongsToMany(Checkup::class)
                    ->withPivot([
                        'dosage',
                        'frequency',
                        'duration',
                    ])
                    ->withTimestamps();
    }
}