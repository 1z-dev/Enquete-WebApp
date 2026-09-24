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
        return view('index');
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