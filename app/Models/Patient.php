<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'gender',
        'cnic',
        'age',
        'contact_number',
        'address',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

     public function checkups(): HasMany
    {
        return $this->hasMany(Checkup::class);
    }
}