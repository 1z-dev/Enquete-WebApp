<?php

namespace App\Http\Controllers;

use App\Models\Stelling;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StellingController extends Controller
{
    public function index(): View
    {
        $stellingen = Stelling::query()
            ->orderBy('aangemaakt_op')
            ->orderBy('id')
            ->get();

        return view('admin.stellingen', compact('stellingen'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'stelling' => ['required', 'string', 'max:255'],
            'context' => ['nullable', 'string'],
        ]);

        Stelling::create([
            ...$validated,
            'aangemaakt_op' => now(),
        ]);

        return to_route('admin.stellingen.index')
            ->with('success', 'De stelling is toegevoegd.');
    }

    public function update(Request $request, Stelling $stelling): RedirectResponse
    {
        $validated = $request->validate([
            'stelling' => ['required', 'string', 'max:255'],
            'context' => ['nullable', 'string'],
        ]);

        $stelling->update($validated);

        return to_route('admin.stellingen.index')
            ->with('success', 'De stelling is bijgewerkt.');
    }

    public function destroy(Stelling $stelling): RedirectResponse
    {
        $stelling->delete();

        return to_route('admin.stellingen.index')
            ->with('success', 'De stelling is verwijderd.');
    }
}
