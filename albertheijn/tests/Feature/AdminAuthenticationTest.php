<?php

use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

test('admin pagina vereist een login', function () {
    $this->get('/admin/stellingen')
        ->assertRedirect(route('login'));
});

test('beheerder kan inloggen en de admin openen', function () {
    $account = Account::factory()->create([
        'email' => 'admin@example.com',
        'wachtwoord_hash' => 'secret-password',
    ]);

    $this->post(route('login.store'), [
        'email' => 'admin@example.com',
        'password' => 'secret-password',
    ])->assertRedirect(route('admin.stellingen.index'));

    $this->assertAuthenticatedAs($account);
    $this->get(route('admin.stellingen.index'))->assertOk();
});

test('inloggen met een fout wachtwoord mislukt', function () {
    Account::factory()->create([
        'email' => 'admin@example.com',
        'wachtwoord_hash' => 'secret-password',
    ]);

    $this->post(route('login.store'), [
        'email' => 'admin@example.com',
        'password' => 'fout-wachtwoord',
    ])->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('beheerder kan uitloggen', function () {
    $account = Account::factory()->create();

    $this->actingAs($account)
        ->post(route('logout'))
        ->assertRedirect(route('login'));

    $this->assertGuest();
});

test('de users-tabel bestaat niet meer', function () {
    expect(Schema::hasTable('users'))->toBeFalse()
        ->and(Schema::hasTable('accounts'))->toBeTrue();
});
