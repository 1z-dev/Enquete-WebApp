<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('answer_a');
            $table->string('answer_b');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statements');
    }
};