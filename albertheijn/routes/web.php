<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/test', function () {
    return view('test');
});
Route::get('/contact', [StatementController::class, 'statistics']);

Route::get('/beantwoord-stellingen', [StatementController::class, 'show'])
    ->name('statements.show');

Route::post('/beantwoord-stellingen', [AnswerController::class, 'answer'])
    ->name('statements.answer');

Route::get('/resultaat', [StatementController::class, 'finished'])
    ->name('statements.finished');

Route::post('/contact', [SessionController::class, 'submit'])
    ->name('contact.submit'); 