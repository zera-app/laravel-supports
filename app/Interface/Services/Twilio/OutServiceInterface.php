<?php

namespace App\Interface\Services\Twilio;

use Twilio\Rest\Api\V2010\Account\MessageInstance;

interface OutServiceInterface
{
    /**
     * Send a message.
     * 
     * @param string $to
     * @param string $message
     * @param array $data
     * 
     * @return MessageInstance
     */
    public function sendMessage(string $to, string $message, array $data): MessageInstance;

    /**
     * Send a message from a template.
     * 
     * @param string $to
     * @param string $message
     * @param string $contentSid
     * 
     * @return MessageInstance
     */
    public function sendMessageFromTemplate(string $to, string $message, string $contentSid): MessageInstance;
}
