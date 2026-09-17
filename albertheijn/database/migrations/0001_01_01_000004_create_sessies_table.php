<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessies', function (Blueprint $table) {
            $table->id();
            $table->dateTime('aangemaakt_op');
            $table->dateTime('sessie_duur')->nullable();
            $table->string('email')->nullable();
            $table->string('naam')->nullable();
            $table->unsignedInteger('leeftijd')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessies');
    }
};