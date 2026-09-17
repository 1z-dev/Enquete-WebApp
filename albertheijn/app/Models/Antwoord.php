<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Antwoord extends Model
{
    protected $table = 'antwoorden';

    public $timestamps = false;

    protected $fillable = [
        'sessie_id',
        'stelling_id',
        'eens',
        'uitleg',
        'beantwoord_op',
    ];

    protected $casts = [
        'beantwoord_op' => 'datetime',
    ];

    public function sessie(): BelongsTo
    {
        return $this->belongsTo(Sessie::class, 'sessie_id');
    }

    public function stelling(): BelongsTo
    {
        return $this->belongsTo(Stelling::class, 'stelling_id');
    }
}