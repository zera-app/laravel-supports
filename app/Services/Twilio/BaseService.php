<?php

namespace App\Services\Twilio;

use App\Interface\Services\Twilio\BaseServiceInterface;

class BaseService implements BaseServiceInterface
{
    /**
     * sid
     */
    protected $sid;

    /**
     * token
     */
    protected $token;

    /**
     * twilio whatsapp number
     */
    protected $twilioWhatsappNumber;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.auth_token');
        $this->twilioWhatsappNumber = config('services.twilio.whatsapp_number');
    }
}
