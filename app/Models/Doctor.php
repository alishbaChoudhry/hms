<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'specialization',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function checkups(): HasMany
    {
        return $this->hasMany(Checkup::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}