<?php

namespace Larabook\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Larabook\Models\User;
use Larabook\Repositories\UserRepository;

/**
 * Job to follow a user.
 *
 * @package Larabook\Jobs
 */
class FollowUser
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int
     */
    private $userIdToFollow;

    /**
     * @var int
     */
    private $userId;

    /**
     * Create a new job instance.
     * @param $userIdToFollow
     * @param $userId
     */
    public function __construct($userId, $userIdToFollow)
    {

        $this->userIdToFollow = $userIdToFollow;
        $this->userId = $userId;

    }

    /**
     * Execute the job.
     *
     * @param UserRepository $repo
     * @return User
     */
    public function handle(UserRepository $repo)
    {

       $user = $repo->findById($this->userId);

       $repo->follow($this->userIdToFollow, $user);

       return $user;

    }

}
