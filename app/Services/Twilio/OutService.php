<?php

namespace App\Services\Twilio;

use App\Interface\Services\Twilio\OutServiceInterface;
use App\Supports\Str;
use Twilio\Rest\Api\V2010\Account\MessageInstance;
use Twilio\Rest\Client;

final class OutService extends BaseService implements OutServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Send a message.
     * 
     * @param string $to
     * @param string $message
     * @param array $data
     * 
     * @return MessageInstance
     */
    public function sendMessage(string $to, string $message, array $data): MessageInstance
    {
        $twilio = new Client($this->sid, $this->token);
        $message = $twilio
            ->messages
            ->create(Str::twilioWhatsappNumber($to), [
                'from' => $data['To'],
                'body' => $message,
            ]);

        return $message;
    }

    /**
     * Send a message from a template.
     * 
     * @param string $to
     * @param string $message
     * @param string $contentSid
     * 
     * @return MessageInstance
     */
    public function sendMessageFromTemplate(string $to, string $message, string $contentSid): MessageInstance
    {
        $twilio = new Client($this->sid, $this->token);
        $message = $twilio
            ->messages
            ->create(Str::twilioWhatsappNumber($to), [
                'from' => "{$this->twilioWhatsappNumber}",
                'body' => $message,
                'contentSid' => $contentSid,
            ]);

        return $message;
    }
}
