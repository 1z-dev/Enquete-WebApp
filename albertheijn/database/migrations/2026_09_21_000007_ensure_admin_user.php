<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ensure the development/admin account exists with a known password.
     *
     * This migration is intentionally idempotent so an existing database is
     * repaired when the application is deployed without running the seeder.
     */
    public function up(): void
    {
        if (! Schema::hasTable('accounts')) {
            return;
        }

        $existing = DB::table('accounts')->where('email', 'test@example.com')->first();

        if ($existing) {
            DB::table('accounts')
                ->where('id', $existing->id)
                ->update([
                    'voornaam' => 'Test',
                    'achternaam' => 'User',
                    'wachtwoord_hash' => Hash::make('password'),
                ]);

            return;
        }

        DB::table('accounts')->insert([
            'voornaam' => 'Test',
            'achternaam' => 'User',
            'email' => 'test@example.com',
            'wachtwoord_hash' => Hash::make('password'),
            'remember_token' => null,
            'aangemaakt_op' => now(),
        ]);
    }

    public function down(): void
    {
        // Keep the admin account intact when rolling back unrelated changes.
    }
};
