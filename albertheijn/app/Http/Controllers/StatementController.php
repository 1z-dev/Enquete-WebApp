<?php

namespace App\Http\Controllers;

class StatementController extends Controller
{
    private function getStatements()
    {
        return [
            (object) [
                'id' => 1,
                'statement' => 'This is a test statement',
                'answerOptions' => ['Eens', 'Oneens'],
            ],

            (object) [
                'id' => 2,
                'statement' => 'Another test statement',
                'answerOptions' => ['Eens', 'Oneens'],
            ],

            (object) [
                'id' => 3,
                'statement' => 'PHP is fun to use',
                'answerOptions' => ['Eens', 'Oneens'],
            ],
        ];
    }

    public function show()
    {
        $statements = $this->getStatements();

        return view('show_statements', [
            'statements' => $statements,
        ]);
    }

    public function finished()
    {
        return view('welcome');
    }
}