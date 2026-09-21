<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\AnswerController;

Route::get('/', function () {
    return view('index');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/beantwoord-stellingen', [StatementController::class, 'show'])
    ->name('statements.show');

Route::post('/beantwoord-stellingen', [AnswerController::class, 'answer'])
    ->name('statements.answer');

Route::get('/resultaat', [StatementController::class, 'finished'])
    ->name('statements.finished');
