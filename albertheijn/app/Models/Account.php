<?php

namespace App\Models;

use Database\Factories\AccountFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    /** @use HasFactory<AccountFactory> */
    use HasFactory;

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
        'wachtwoord_hash' => 'hashed',
    ];

    public function getAuthPasswordName(): string
    {
        return 'wachtwoord_hash';
    }
}
