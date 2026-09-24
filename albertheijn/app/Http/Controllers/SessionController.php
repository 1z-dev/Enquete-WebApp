<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }


    public function submit(\Illuminate\Http\Request $request)
    {
    $validated = $request->validate([
        'naam' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'leeftijd' => 'required|integer|min:1',
        'tos' => 'accepted',
    ]);

    \App\Models\Sessie::create([
        'aangemaakt_op' => now(),
        'email' => $validated['email'],
        'naam' => $validated['naam'] ?? null,
        'leeftijd' => $validated['leeftijd'],
    ]);

    return redirect()->route('index'); // or wherever makes sense
    }
}
