<?php

use App\Models\Account;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

/**
 * Bootst een oude database na: met een "users"-tabel zoals die vroeger
 * bestond, gevuld met een admin.
 */
function maakOudeUsersTabel(string $naam = 'Test User', string $wachtwoord = 'geheim'): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });

    DB::table('users')->insert([
        'name' => $naam,
        'email' => 'Admin@Example.com',
        'password' => password_hash($wachtwoord, PASSWORD_BCRYPT, ['cost' => 12]),
        'remember_token' => 'oud-token',
        'created_at' => '2026-01-02 03:04:05',
        'updated_at' => '2026-01-02 03:04:05',
    ]);
}

function draaiOverzetMigratie(): void
{
    (require database_path('migrations/2026_09_21_000008_move_users_to_accounts.php'))->up();
}

it('zet een user over naar accounts en verwijdert de users-tabel', function () {
    maakOudeUsersTabel('Test User');

    draaiOverzetMigratie();

    expect(Schema::hasTable('users'))->toBeFalse();

    $account = Account::where('email', 'admin@example.com')->firstOrFail();
    expect($account->voornaam)->toBe('Test')
        ->and($account->achternaam)->toBe('User')
        ->and($account->remember_token)->toBe('oud-token')
        ->and($account->aangemaakt_op->format('Y-m-d H:i:s'))->toBe('2026-01-02 03:04:05');
});

it('laat de overgezette beheerder met hetzelfde wachtwoord inloggen', function () {
    maakOudeUsersTabel(wachtwoord: 'geheim');

    draaiOverzetMigratie();

    // De hash is met cost 12 gemaakt, de tests hashen met cost 4. Inloggen
    // triggert dus ook het automatisch opnieuw hashen van "wachtwoord_hash".
    $this->post(route('login.store'), [
        'email' => 'Admin@Example.com',
        'password' => 'geheim',
    ])->assertRedirect(route('admin.stellingen.index'));

    $account = Account::where('email', 'admin@example.com')->firstOrFail();
    $this->assertAuthenticatedAs($account);
    expect(password_verify('geheim', $account->fresh()->wachtwoord_hash))->toBeTrue();
});

it('ondersteunt een naam zonder spatie', function () {
    maakOudeUsersTabel('Admin');

    draaiOverzetMigratie();

    $account = Account::where('email', 'admin@example.com')->firstOrFail();
    expect($account->voornaam)->toBe('Admin')->and($account->achternaam)->toBe('');
});

it('overschrijft geen bestaand account met hetzelfde e-mailadres', function () {
    maakOudeUsersTabel();
    Account::factory()->create([
        'voornaam' => 'Bestaand',
        'email' => 'admin@example.com',
    ]);

    draaiOverzetMigratie();

    expect(Account::where('email', 'admin@example.com')->count())->toBe(1)
        ->and(Account::where('email', 'admin@example.com')->first()->voornaam)->toBe('Bestaand');
});

it('beëindigt sessies die nog naar een oude user verwijzen', function () {
    maakOudeUsersTabel();

    DB::table('sessions')->insert([
        ['id' => 'ingelogd', 'user_id' => 1, 'payload' => '', 'last_activity' => time()],
        ['id' => 'speler', 'user_id' => null, 'payload' => '', 'last_activity' => time()],
    ]);

    draaiOverzetMigratie();

    expect(DB::table('sessions')->pluck('id')->all())->toBe(['speler']);
});

it('doet niets als er geen users-tabel is', function () {
    expect(Schema::hasTable('users'))->toBeFalse();

    draaiOverzetMigratie();

    expect(Schema::hasTable('accounts'))->toBeTrue();
});
