<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class StatementController extends Controller
{
    public function show() {
        return view('show_statements');
    }

}