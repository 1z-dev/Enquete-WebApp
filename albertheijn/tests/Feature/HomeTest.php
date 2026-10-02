<?php

it('shows the homepage content and links', function () {
    $this->get(route('index'))
        ->assertOk()
        ->assertSee('Paden Van Verstand')
        ->assertSee('Start')
        ->assertSee('Admin panel')
        ->assertSee('href="/beantwoord-stellingen"', false)
        ->assertSee('href="/admin"', false);
});