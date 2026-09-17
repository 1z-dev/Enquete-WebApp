<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('player_session_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('statement_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('answer', 1);

            $table->timestamps();

            $table->unique([
                'player_session_id',
                'statement_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};