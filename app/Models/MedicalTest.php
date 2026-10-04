<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalTest extends Model
{
    protected $fillable = [
        'name',
    ];


    // Medical Test can belong to many checkups
    public function checkups()
    {
        return $this->belongsToMany(Checkup::class);
    }
}