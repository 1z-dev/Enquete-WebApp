<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stelling extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'stellingen';

    public $timestamps = false;

    protected $fillable = [
        'stelling',
        'context',
        'aangemaakt_op',
    ];

    protected $casts = [
        'aangemaakt_op' => 'datetime',
    ];

    public function antwoorden(): HasMany
    {
        return $this->hasMany(Antwoord::class, 'stelling_id');
    }
}