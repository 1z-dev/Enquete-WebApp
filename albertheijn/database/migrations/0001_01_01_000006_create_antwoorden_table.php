<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antwoorden', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sessie_id')
                ->constrained('sessies')
                ->cascadeOnDelete();

            $table->foreignId('stelling_id')
                ->constrained('stellingen')
                ->cascadeOnDelete();

            $table->string('eens');
            $table->text('uitleg')->nullable();
            $table->dateTime('beantwoord_op');

            $table->unique([
                'sessie_id',
                'stelling_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antwoorden');
    }
};