<?php

namespace Larabook\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Larabook\Models\Status;

/**
 * Event for when a status is published.
 *
 * @package Larabook\Events
 */
class StatusPublished
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Status
     */
    public $status;

    /**
     * Create a new event instance.
     */
    public function __construct(Status $status)
    {

        $this->status = $status;

    }

}
