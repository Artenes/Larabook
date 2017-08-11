<?php

namespace Larabook\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Events and listeners of the application.
 *
 * @package Larabook\Providers
 */
class EventServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $listen = [

        'Larabook\Events\UserRegistered' => [



        ],

        'Larabook\Events\StatusPublished' => [



        ],

    ];

    /**
     * Register any events for the application.
     */
    public function boot()
    {

        parent::boot();

    }

}
