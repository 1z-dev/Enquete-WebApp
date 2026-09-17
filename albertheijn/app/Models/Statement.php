<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statement extends Model
{
    protected $fillable = [
        'question',
        'answer_a',
        'answer_b',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}