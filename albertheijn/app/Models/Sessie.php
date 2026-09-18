<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sessie extends Model
{
    protected $table = 'sessies';

    public $timestamps = false;

    protected $fillable = [
        'aangemaakt_op',
        'sessie_duur',
        'email',
        'naam',
        'leeftijd',
    ];

    protected $casts = [
        'aangemaakt_op' => 'datetime',
        'sessie_duur' => 'datetime',
        'leeftijd' => 'integer',
    ];

    public function antwoorden(): HasMany
    {
        return $this->hasMany(Antwoord::class, 'sessie_id');
    }
}