<?php

namespace Larabook\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Larabook\Events\StatusPublished;
use Larabook\Models\Status;
use Larabook\Repositories\StatusRepository;

/*
 * Publish a new status.
 */

class PublishStatus
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $body;

    /**
     * @var int
     */
    private $userId;

    /**
     * Create a new job instance.
     *
     * @param $body
     * @param $userId
     */
    public function __construct($body, $userId)
    {

        $this->body = $body;
        $this->userId = $userId;

    }

    /**
     * Execute the job.
     *
     * @param StatusRepository $repo
     * @return Status
     */
    public function handle(StatusRepository $repo)
    {

        $status = Status::publish($this->body);

        $repo->save($status, $this->userId);

        event(new StatusPublished($status));

        return $status;

    }

}
