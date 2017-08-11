<?php

namespace Larabook\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Larabook\ViewComposers\UserComposer;

/**
 * Provider for view coposers.
 *
 * @package Larabook\Providers
 */
class ViewComposerProvider extends ServiceProvider
{

    /**
     * Boot the composers.
     */
    public function boot()
    {

        View::composer('*', UserComposer::class);

    }

}
