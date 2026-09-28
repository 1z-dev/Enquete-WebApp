<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antwoord;
use App\Models\Sessie;

class AnswerController extends Controller
{
    public function answer(Request $request)
    {
        $request->validate([
            'statement_id' => ['required', 'integer', 'exists:stellingen,id'],
            'answer' => ['required', 'boolean'],
            'uitleg' => ['nullable', 'string'],
        ]);

        $statementId = $request->input('statement_id');
        $answer = $request->boolean('answer');
        $uitleg = $request->input('uitleg');

        // Get/create one database session for this questionnaire
        $sessieId = session('sessie_id');

        $sessie = $sessieId ? Sessie::find($sessieId) : null;

        if (!$sessie) {
            $sessie = Sessie::create([
                'aangemaakt_op' => now(),
            ]);

            session([
                'sessie_id' => $sessie->id,
                'answers' => [],
            ]);
        }

        $answers = session('answers', []);
        $answers[$statementId] = $answer;

        session([
            'answers' => $answers,
        ]);

        Antwoord::updateOrCreate(
            [
                'sessie_id' => $sessie->id,
                'stelling_id' => $statementId,
            ],
            [
                'eens' => $answer,
                'uitleg' => $uitleg,
                'beantwoord_op' => now(),
            ]
        );

        return response()->json([
            'success' => true,
        ]);
    }
}