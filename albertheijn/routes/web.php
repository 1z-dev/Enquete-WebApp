<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatementController;

Route::get('/', function () {
    return view('index');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/beantwoord-stellingen', [StatementController::class, 'show']);
