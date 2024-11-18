<?php

namespace App\Services\Twilio;

use App\Interface\Services\Twilio\MediaServiceInterface;
use App\Supports\Carbon;
use App\Supports\Str;
use Apxcde\MimeTypes\MimeTypeConverter;
use Illuminate\Http\Request;

final class MediaService extends BaseService implements MediaServiceInterface
{
    /**
     * @var MimeTypeConverter
     */
    protected MimeTypeConverter $mimeTypeConverter;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->mimeTypeConverter = new MimeTypeConverter();
    }

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
    public function storeMedia(Request $request): array
    {
        $numMedia = (int) $request->input('NumMedia');
        $filePaths = [];

        if ($numMedia === 0) {
            return $filePaths;
        }

        for ($i = 0; $i < $numMedia; $i++) {

            $mediaUrl = $request->input("MediaUrl$i");
            $MIMEType = $request->input("MediaContentType$i");
            $mediaSid = basename($mediaUrl);
            $media = $this->getMediaContent($mediaUrl);

            $fileName = $this->createFile(
                content: $media,
                MIMEType: $MIMEType,
            );

            $filePaths[] = [
                'mediaSid' => $mediaSid,
                'mediaUrl' => $mediaUrl,
                'media' => $fileName,
                'fileExtension' => $MIMEType,
            ];

            $this->createMediaMessagePath(
                messageSid: $request->input('MessageSid'),
                mediaSid: $mediaSid,
                mediaUrl: $mediaUrl,
                mediaContentType: $MIMEType,
                path: $fileName,
            );
        }

        return $filePaths;
    }

    /**
     * Get media content.
     * This is return the file content, not as an image path or url.
     * Just plain image. thats why the function createFile is used to save the image to storage.
     *
     * @see https://github.com/TwilioDevEd/receive-mms-laravel/blob/master/app/Services/MediaMessageService/MediaMessageService.php
     * @param string $mediaUrl
     * @return string|bool
     */
    public function getMediaContent($mediaUrl): string|bool
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $mediaUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->sid . ':' . $this->token);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $media = curl_exec($ch);
        curl_close($ch);

        return $media;
    }

    /**
     * Create media message path.
     * 
     * @param string $messageSid
     * @param string $mediaSid
     * @param string $mediaUrl
     * @param string $mediaContentType
     * @param string $path
     */
    private function createMediaMessagePath(string $messageSid, string $mediaSid, string $mediaUrl, string $mediaContentType, string $path)
    {
        // store your file to database
    }

    /**
     * This will create a file and save it to storage.
     * 
     * @param string $content
     * @param string $MIMEType
     * @return string
     */
    private function createFile(string $content, string $MIMEType): string
    {
        $fileName = Carbon::now()->format('Y-m-d') . '/' . Str::uuid() . '.' . $this->mimeTypeConverter->toExtension($MIMEType);

        // Create new directory if not exists
        $directory = dirname(storage_path('app/public/' . $fileName));
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        file_put_contents(storage_path('app/public/' . $fileName), $content);

        return $fileName;
    }
}
