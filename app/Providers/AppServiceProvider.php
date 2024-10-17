<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        AliasLoader::getInstance([
            'Number' => \App\Supports\Number::class,
            'Str' => \App\Supports\Str::class,
            'Carbon' => \App\Supports\Carbon::class,
            'Crypt' => \App\Supports\Crypt::class,
            'AvatarSupport' => \App\Supports\AvatarSupport::class,
        ]);

        Model::shouldBeStrict();
        Model::preventLazyLoading();
        Model::preventAccessingMissingAttributes();
    }
}
