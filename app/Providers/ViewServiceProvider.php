<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\View\ViewServiceProvider as ViewViewServiceProvider;

class ViewServiceProvider extends ViewViewServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerBladeDirectives();
        View::composer('*', "App\View\Composer\UserComposer@compose");
    }

    /**
     * Register the blade directives.
     */
    protected function registerBladeDirectives(): void
    {
        \App\View\Directive\DateDirective::load();
        \App\View\Directive\Number::load();
        \App\View\Directive\Str::load();
    }
}
