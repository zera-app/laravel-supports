<?php

use App\Http\Controllers\Response\ResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/response/file/{fileName}', [ResponseController::class, 'handle'])->name('response-file');
Route::get('/response/download/{fileName}', [ResponseController::class, 'download'])->name('response-download');
