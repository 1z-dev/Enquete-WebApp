<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('accounts')) {
            return;
        }

        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam');
            $table->string('achternaam')->default('');
            $table->string('email')->unique();
            $table->string('wachtwoord_hash');
            $table->rememberToken();
            $table->dateTime('aangemaakt_op');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
