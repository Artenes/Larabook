<?php

namespace Larabook\Presenters;

use Laracasts\Presenter\Presenter;

/**
 * Presenter for user model.
 *
 * @package Larabook\Presenters
 */
class UserPresenter extends Presenter
{

    /**
     * Gets the user gravatar url.
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {

        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";

    }

}
