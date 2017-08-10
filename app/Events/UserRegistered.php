<?php

namespace Larabook\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Larabook\Models\User;

/**
 * When a user is registered.
 *
 * @package Larabook\Events
 */
class UserRegistered
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user)
    {

        $this->user = $user;

    }

}
