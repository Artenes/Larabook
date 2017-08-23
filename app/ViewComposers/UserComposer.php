<?php

namespace Larabook\ViewComposers;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Composer to add authenticate
 * user to view.
 *
 * @package Larabook\ViewComposers
 */
class UserComposer
{

    /**
     * Compose the view element.
     *
     * @param View $view
     */
    public function compose(View $view)
    {

        $view->with('authUser', Auth::user());

    }

}
