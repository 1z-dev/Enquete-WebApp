<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function answer(Request $request)
    {
        $request->validate([
            'statement_id' => ['required', 'integer'],
            'answer' => ['required', 'in:1,2'],
        ]);

        $statementId = $request->input('statement_id');
        $answer = $request->input('answer');
        $answers = session('answers', []);
        $answers[$statementId] = $answer;

        session([
            'answers' => $answers,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }
}