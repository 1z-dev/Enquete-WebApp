<?php

use App\Models\Account;
use App\Models\Stelling;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(Account::factory()->create());
});

it('shows the stellingen admin page', function () {
    $this->get('/admin/stellingen')
        ->assertOk()
        ->assertSee('Stellingen');
});

it('can create, update and delete a stelling', function () {
    $this->post('/admin/stellingen', [
        'stelling' => 'Een teststelling',
        'context' => 'Testcontext',
    ])->assertRedirect('/admin/stellingen');

    $stelling = Stelling::query()->where('stelling', 'Een teststelling')->firstOrFail();

    $this->put("/admin/stellingen/{$stelling->id}", [
        'stelling' => 'Een gewijzigde stelling',
        'context' => 'Gewijzigde context',
    ])->assertRedirect('/admin/stellingen');

    expect($stelling->fresh()->stelling)->toBe('Een gewijzigde stelling');

    $this->delete("/admin/stellingen/{$stelling->id}")
        ->assertRedirect('/admin/stellingen');

    expect(Stelling::find($stelling->id))->toBeNull();
});
