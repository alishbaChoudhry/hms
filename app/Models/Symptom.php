<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
    ];


    // Symptom can belong to many checkups
    public function checkups()
    {
        return $this->belongsToMany(Checkup::class);
    }
}