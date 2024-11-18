<?php

namespace App\Services\Twilio;

use App\Enums\Twilio\TemplateEnum;
use App\Interface\Services\Twilio\InServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class InService extends BaseService implements InServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle the incoming request from twilio.
     *
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void
    {
        /**
         * Here you can handle the incoming request from twilio.
         * You can return a response back to twilio.
         * You can also return a response back to the user.
         */
        $outService = new OutService();
        $outService->sendMessage($request->From, TemplateEnum::WELCOME->getMessage(), ['To' => $request->From]);


        $data = $request->all();
        $dataMedia = (int) $data['NumMedia'];

        /**
         * We will save the image to our database.
         * Handle the image/document/video/audio
         *
         * @see https://www.twilio.com/docs/whatsapp/api/media-resourcebundle_count
         * @see https://www.twilio.com/docs/messaging/tutorials/how-to-receive-and-download-images-incoming-mms/php-laravel
         * @see https://github.com/TwilioDevEd/receive-mms-laravel/blob/master/app/Services/MediaMessageService/MediaMessageService.php
         */
        $media = [];
        if ($dataMedia > 0) {
            $mediaService = new MediaService();
            $media = $mediaService->storeMedia($request);

            /**
             * If the media is empty, send the invalid receipt template message.
             */
            if (count($media) === 0) {
                $outService->sendMessage($data['From'], TemplateEnum::FILE_INVALID->getMessage(), $data);
                return;
            }
        }

        Log::info($request->all());
    }

    /**
     * Handle the callback from twilio.
     * This function will be called when the message is status is changed,
     * e.g. delivered, read, failed, etc.
     *
     * @param Request $request
     * @return void
     */
    public function responseCallback(Request $request): void
    {
        Log::info($request->all());
    }
}
