<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosage extends Model
{
    protected $fillable = [
        'dosage',
        'frequency',
        'duration',
    ];
}