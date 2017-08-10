<?php

namespace Larabook\Repositories;
use Larabook\Models\User;

/**
 * User repository.
 *
 * @package Larabook\Repositories
 */
class UserRepository
{

    /**
     * Save a user in the storage.
     *
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {

        return $user->save();

    }

}