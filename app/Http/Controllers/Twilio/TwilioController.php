<?php

namespace App\Http\Controllers\Twilio;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class TwilioController extends Controller
{
    /**
     * Response a message.
     */
    public function inbound(Request $request): JsonResponse
    {
        $inService = new \App\Services\Twilio\InService();
        $inService->handle($request);

        return $this->responseJsonMessage(__('Message received successfully.'));
    }

    /**
     * Response callback.
     */
    public function callback(Request $request): JsonResponse
    {
        $inService = new \App\Services\Twilio\InService();
        $inService->responseCallback($request);

        return $this->responseJsonMessage(__('Callback received successfully.'));
    }
}
