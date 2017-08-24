<?php

namespace Larabook\Repositories;
use Illuminate\Support\Collection;
use Larabook\Models\Status;
use Larabook\Models\User;

/**
 * Repository for statuses.
 *
 * @package Larabook\Repositories
 */
class StatusRepository
{

    /**
     * Saves a status to the repository.
     *
     * @param Status $status
     * @param $userId
     * @return bool
     */
    public function save(Status $status, $userId)
    {

        $status->user_id = $userId;

        return $status->save();

    }

    /**
     * Gets all the posts for the given user.
     *
     * @param $userId
     * @return array
     */
    public function getAllForUser($userId)
    {

        return Status::with('user')->where('user_id', $userId)->latest()->get()->all();

    }

    /**
     * Get the feed for a user.
     *
     * @param User $user
     * @return Collection
     */
    public function getFeedForUser(User $user)
    {

        $usersIds = $user->follows()->pluck('followed_id');
        $usersIds[] = $user->id;

        return Status::whereIn('user_id', $usersIds)->latest()->get();

    }

}
