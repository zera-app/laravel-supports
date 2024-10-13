<?php

namespace App\View\Directive;

use Illuminate\Support\Facades\Blade;

class Number
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Load the number blade directive.
     */
    public static function load()
    {
        Blade::directive('formatCurrency', function ($expression) {
            return "<?php echo \App\Supports\Str::formatCurrency($expression) ?>";
        });
        Blade::directive(
            'formatNumber',
            function ($expression) {
                return "<?php echo \App\Supports\Str::formatNumber($expression) ?>";
            }
        );
        Blade::directive('phoneNumber', function ($expression) {
            return
                "<?php echo \App\Supports\Str::phoneNumber($expression) ?>";
        });
        Blade::directive('toDecimal', function ($expression) {
            return "<?php echo \App\Supports\Str::toDecimal($expression) ?>";
        });
        Blade::directive('reversePhoneNumber', function ($expression) {
            return "<?php echo \App\Supports\Str::reversePhoneNumber($expression) ?>";
        });
    }
}
