<?php

namespace App\Enums\Twilio;

enum TemplateEnum: string
{
    case WELCOME = 'WELCOME';

    case FILE_INVALID = 'FILE_INVALID';

    /**
     * Get template message.
     */
    public function getMessage(): string
    {
        $appName = config('app.name');

        return match ($this) {
            self::WELCOME => "Welcome to Official WhatsApp Account {$appName}!",
            self::FILE_INVALID => "File is invalid. please upload a valid file.",
        };
    }
}
