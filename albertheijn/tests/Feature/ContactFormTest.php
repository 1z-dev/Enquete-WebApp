<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('toont het contactformulier', function () {
    $this->get('/contact')
        ->assertOk()
        ->assertSee('Contact')
        ->assertSee('name="email"', false);
});

it('slaat een geldig contactformulier op', function () {
    $this->post(route('contact.submit'), [
        'naam' => 'Sam',
        'email' => 'sam@example.com',
        'leeftijd' => 25,
        'tos' => '1',
    ])->assertRedirect(route('index'));

    $this->assertDatabaseHas('sessies', [
        'naam' => 'Sam',
        'email' => 'sam@example.com',
        'leeftijd' => 25,
    ]);
});

it('weigert ongeldige gegevens', function () {
    $this->from('/contact')
        ->post(route('contact.submit'), [
            'email' => 'geen-email',
            'leeftijd' => 0,
        ])
        ->assertRedirect('/contact')
        ->assertSessionHasErrors(['email', 'leeftijd', 'tos']);

    $this->assertDatabaseCount('sessies', 0);
});