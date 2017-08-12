<?php

namespace Larabook\Presenters;

use Laracasts\Presenter\Presenter;

/**
 * Presenter for status model.
 *
 * @package Larabook\Presenters
 */
class StatusPresenter extends Presenter
{

    /**
     * Gets the readable time since publication.
     *
     * @return string
     */
    public function timeSincePublished()
    {

        return $this->created_at->diffForHumans();

    }

}
