<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $fillable = [
        'player_session_id',
        'statement_id',
        'answer',
    ];

    public function playerSession(): BelongsTo
    {
        return $this->belongsTo(PlayerSession::class);
    }

    public function statement(): BelongsTo
    {
        return $this->belongsTo(Statement::class);
    }
}