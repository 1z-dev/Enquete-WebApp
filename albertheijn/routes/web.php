<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StellingController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/test', function () {
    return view('test');
});
Route::get('/contact', [StatementController::class, 'statistics'])->name('contact');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.stellingen.index'))->name('index');
    Route::get('/stellingen', [StellingController::class, 'index'])->name('stellingen.index');
    Route::post('/stellingen', [StellingController::class, 'store'])->name('stellingen.store');
    Route::put('/stellingen/{stelling}', [StellingController::class, 'update'])->name('stellingen.update');
    Route::delete('/stellingen/{stelling}', [StellingController::class, 'destroy'])->name('stellingen.destroy');
});

Route::get('/beantwoord-stellingen', [StatementController::class, 'show'])
    ->name('statements.show');

Route::post('/beantwoord-stellingen', [AnswerController::class, 'answer'])
    ->name('statements.answer');

Route::get('/resultaat', [StatementController::class, 'finished'])
    ->name('statements.finished');

Route::post('/contact', [SessionController::class, 'submit'])
    ->name('contact.submit'); 

Route::get('/tos', function () {
    return view('TOS');
})->name('tos');