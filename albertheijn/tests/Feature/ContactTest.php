<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('toont het contactformulier', function () {
    $this->get('/contact')
        ->assertOk()
        ->assertSee('Contact')
        ->assertSee('name="email"', false)
        ->assertSee('name="tos"', false)
        ->assertSee('voorwaarden')
        ->assertSee('href="' . route('tos') . '"', false);
});

it('slaat een geldig contactformulier op', function () { // saves valid form
    $this->post(route('contact.submit'), [ // submit contact form
        'naam' => 'Sam',
        'email' => 'sam@example.com',
        'leeftijd' => 25,
        'tos' => '1',
    ]); 

    $this->assertDatabaseHas('sessies', [ // check database
        'naam' => 'Sam',
        'email' => 'sam@example.com',
        'leeftijd' => 25,
    ]);
});

it('weigert ongeldige gegevens', function () { // rejects invalid data
    $this->from('/contact')
        ->post(route('contact.submit'), [ // submit invalid contact form
            'email' => 'geen-email',
            'leeftijd' => 0,
        ])
        ->assertRedirect('/contact')  // redirect to contact
        ->assertSessionHasErrors(['email', 'leeftijd', 'tos']);  // validation errors

    $this->assertDatabaseCount('sessies', 0);  // check database
});

it('renders answer statistics', function () { // renders statistics component with given data
    $this->blade(
        '<x-statistic :statistics="$statistics" />',
        ['statistics' => [
            ['1' => 4, '0' => 2, 'label' => 'Stelling A'],
        ]]
    )
        ->assertSee('Antwoorden')
        ->assertSee('Eens')
        ->assertSee('Oneens')
        ->assertSee('Stelling A')
        ->assertSee('4')
        ->assertSee('2');
});

it('shows a message when there are no answers', function () { // shows message for empty statistics
    $this->blade('<x-statistic :statistics="[]" />')
        ->assertSee('Er zijn nog geen antwoorden.');
});

it('opent de voorwaardenpagina', function () {
    $this->get(route('tos'))
        ->assertOk()
        ->assertViewIs('TOS');
});