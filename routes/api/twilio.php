<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'twilio'], function () {
    Route::post('/inbound', [\App\Http\Controllers\Twilio\TwilioController::class, 'inbound']);
    Route::post('/callback', [\App\Http\Controllers\Twilio\TwilioController::class, 'callback']);
});
