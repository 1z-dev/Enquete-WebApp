<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    public $timestamps = false;

    protected $fillable = [
        'voornaam',
        'achternaam',
        'email',
        'wachtwoord_hash',
        'remember_token',
        'aangemaakt_op',
    ];

    protected $hidden = [
        'wachtwoord_hash',
        'remember_token',
    ];

    protected $casts = [
        'aangemaakt_op' => 'datetime',
    ];
}