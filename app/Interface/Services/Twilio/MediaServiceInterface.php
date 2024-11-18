<?php

namespace App\Interface\Services\Twilio;

use Illuminate\Http\Request;

interface MediaServiceInterface
{
    /**
     * Store media to storage.
     *
     * @param Request $request
     * @return array
     * @throws \Exception
     *
     * @see https://www.twilio.com/docs/whatsapp/api/media-resourcebundle_count
     * @see https://www.twilio.com/docs/messaging/tutorials/how-to-receive-and-download-images-incoming-mms/php-laravel
     * @see https://github.com/TwilioDevEd/receive-mms-laravel/blob/master/app/Services/MediaMessageService/MediaMessageService.php
     */
    public function storeMedia(Request $request): array;

    /**
     * Get media content.
     * This is return the file content, not as an image path or url.
     * Just plain image. thats why the function createFile is used to save the image to storage.
     *
     * @see https://github.com/TwilioDevEd/receive-mms-laravel/blob/master/app/Services/MediaMessageService/MediaMessageService.php
     * @param string $mediaUrl
     * @return string|bool
     */
    public function getMediaContent($mediaUrl): string|bool;
}
