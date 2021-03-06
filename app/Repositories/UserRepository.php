<?php

namespace Larabook\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    /**
     * Gets a paginated list of all users.
     *
     * @param int $limit
     * @return Paginator
     */
    public function getPaginated($limit = 25)
    {

        return User::orderBy('name', 'asc')->simplePaginate($limit);

    }

    /**
     * Gets a user by its name.
     *
     * @param $name
     * @return User
     */
    public function findByName($name)
    {

        return User::with(['statuses' => function ($query) {

            $query->latest();

        }])->where('name', $name)->first();

    }

    /**
     * Finds a user by its id.
     *
     * @param $id
     * @return User
     * @throws ModelNotFoundException
     */
    public function findById($id)
    {

        return User::findOrFail($id);

    }

    /**
     * Follow a Larabook user.
     *
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow, User $user)
    {

        return $user->follows()->attach($userIdToFollow);

    }
    
}
