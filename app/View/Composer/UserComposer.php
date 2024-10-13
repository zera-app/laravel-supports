<?php

namespace App\View\Composer;

use App\Supports\AvatarSupport;
use App\Supports\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Load the user composer.
     */
    public static function compose(View $view)
    {
        $user = Auth::user();

        // User information composers
        if ($user) {

            $userRoles = join(' ', $user->getRoleNames()->toArray());
            $isUserDeveloper = $user->hasRole('superuser');

            $view->with('userRoles', $userRoles);
            $view->with('isUserDeveloper', $isUserDeveloper);

            $view->with('AvatarUrl', AvatarSupport::getUserAvatar());
            $view->with('UserEmail', $user->email);
            $view->with('UserName', Str::headline($user->name));
        } else {

            $view->with('userRoles', null);
            $view->with('isUserDeveloper', false);

            $view->with('AvatarUrl', 'https://ui-avatars.com/api/?name=Guest&background=14b8a6');
            $view->with('UserEmail', 'Guest');
            $view->with('UserName', 'Guest');
        }
    }
}
