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
                'antwoorden as eens_count' => fn ($query) => $query->where('eens', 'eens'),
                'antwoorden as oneens_count' => fn ($query) => $query->where('eens', 'oneens'),
            ])
            ->get()
            ->map(fn ($stelling) => [
                'label' => $stelling->stelling,
                'eens' => $stelling->eens_count,
                'oneens' => $stelling->oneens_count,
            ]);

        return view('contact', [
            'statistics' => $statistics,
        ]);
    }
}