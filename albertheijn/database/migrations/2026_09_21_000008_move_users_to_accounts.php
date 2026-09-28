<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Zet de gegevens uit de overbodige "users"-tabel over naar "accounts"
     * en verwijder de "users"-tabel daarna.
     *
     * Op een nieuwe database bestaat "users" niet meer; dan doet deze
     * migratie niets.
     */
    public function up(): void
    {
        if (! Schema::hasTable('users')) {
            return;
        }

        DB::table('users')->orderBy('id')->get()->each(function ($user) {
            // Het inlogformulier zet het e-mailadres om naar kleine letters,
            // dus dat doen we hier ook.
            $email = strtolower(trim($user->email));

            // Een bestaand account met hetzelfde e-mailadres laten we ongemoeid.
            if (DB::table('accounts')->where('email', $email)->exists()) {
                return;
            }

            // "name" wordt gesplitst op de eerste spatie: "Test User" wordt
            // voornaam "Test" en achternaam "User".
            $naam = trim($user->name) !== '' ? trim($user->name) : strstr($email, '@', true);
            [$voornaam, $achternaam] = array_pad(explode(' ', $naam, 2), 2, '');

            DB::table('accounts')->insert([
                'voornaam' => $voornaam,
                'achternaam' => trim($achternaam),
                'email' => $email,
                // De bestaande hash wordt ongewijzigd overgenomen, zodat het
                // wachtwoord hetzelfde blijft.
                'wachtwoord_hash' => $user->password,
                'remember_token' => $user->remember_token,
                'aangemaakt_op' => $user->created_at ?? now(),
            ]);
        });

        // Ingelogde sessies bewaren het id van de oude user. Dat id zegt niets
        // meer over de accounts-tabel, dus die sessies worden beëindigd. De
        // beheerder moet daarna opnieuw inloggen.
        if (Schema::hasTable('sessions')) {
            DB::table('sessions')->whereNotNull('user_id')->delete();
        }

        Schema::dropIfExists('users');
    }

    /**
     * Maakt de lege "users"-tabel weer aan en kopieert de accounts terug.
     */
    public function down(): void
    {
        if (Schema::hasTable('users')) {
            return;
        }

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('accounts')->orderBy('id')->get()->each(function ($account) {
            DB::table('users')->insert([
                'name' => trim($account->voornaam.' '.$account->achternaam),
                'email' => $account->email,
                'password' => $account->wachtwoord_hash,
                'remember_token' => $account->remember_token,
                'created_at' => $account->aangemaakt_op,
                'updated_at' => $account->aangemaakt_op,
            ]);
        });
    }
};
