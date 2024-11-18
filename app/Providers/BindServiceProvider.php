<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->bindTwilio();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Twilio Bind
     */
    private function bindTwilio()
    {
        $classes = [
            \App\Interface\Services\Twilio\BaseServiceInterface::class => \App\Services\Twilio\BaseService::class,
            \App\Interface\Services\Twilio\InServiceInterface::class => \App\Services\Twilio\InService::class,
            \App\Interface\Services\Twilio\OutServiceInterface::class => \App\Services\Twilio\OutService::class,
            \App\Interface\Services\Twilio\MediaServiceInterface::class => \App\Services\Twilio\MediaService::class,
        ];

        foreach ($classes as $interface => $class) {
            $this->app->bind($interface, $class);
        }
    }
}
