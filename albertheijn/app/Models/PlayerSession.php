<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlayerSession extends Model
{
    protected $fillable = [
        'email',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}