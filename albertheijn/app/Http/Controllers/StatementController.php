<?php

namespace App\Http\Controllers;

use App\Models\Stelling;
use App\Models\Antwoord;
use Illuminate\Support\Facades\DB;

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
            $sessieId = session('sessie_id');

        $answers = Antwoord::where('sessie_id', $sessieId)->get();

        $total = $answers->count();

        $eens = $answers->where('eens', true)->count();
        $oneens = $answers->where('eens', false)->count();

        $statistics = [
            '0' => $total > 0 ? ($eens / $total) * 100 : 0,
            '1' => $total > 0 ? ($oneens / $total) * 100 : 0,
        ];

        return view('result', [
            'statistics' => $statistics,
        ]);
    }

    public function statistics()
    {
        $statistics = Stelling::query()
            ->withCount([
                'antwoorden as eens_count' => fn ($query) => $query->where('eens', '1'),
                'antwoorden as oneens_count' => fn ($query) => $query->where('eens', '0'),
            ])
            ->get()
            ->map(fn ($stelling) => [
                'label' => $stelling->stelling,
                '1' => $stelling->eens_count,
                '0' => $stelling->oneens_count,
            ]);

        return view('contact', [
            'statistics' => $statistics,
        ]);
    }
}