<?php

namespace App\Interface\Services\Twilio;

use Illuminate\Http\Request;

interface InServiceInterface
{
    /**
     * Handle the incoming request from twilio.
     *
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void;

    /**
     * Handle the callback from twilio.
     * This function will be called when the message is status is changed,
     * e.g. delivered, read, failed, etc.
     *
     * @param Request $request
     * @return void
     */
    public function responseCallback(Request $request): void;
}
