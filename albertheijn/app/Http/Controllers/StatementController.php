<?php

namespace App\Http\Controllers;

use App\Models\Stelling;

class StatementController extends Controller
{
    public function show()
    {
        $statements = Stelling::all();

        return view('show_statements', [
            'statements' => $statements,
        ]);
    }

    public function finished()
    {
        return view('index');
    }
}