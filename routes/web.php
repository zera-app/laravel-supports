<?php

use App\Http\Controllers\Test\BladeDirectiveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('test/blade-directive', [BladeDirectiveController::class, 'index'])->name('test.blade-directive');
