<?php

namespace Larabook\Http\Controllers;

use Illuminate\View\View;
use Larabook\Repositories\UserRepository;

/**
 * Controller to manage users.
 *
 * @package Larabook\Http\Controllers
 */
class UsersController extends Controller
{

    /**
     * Displays all users.
     *
     * @param UserRepository $repo
     * @return View
     */
    public function index(UserRepository $repo)
    {

        $users = $repo->getPaginated();

        return view('user.index', compact('users'));

    }

    /**
     * Show a user profile.
     *
     * @param UserRepository $repo
     * @param $name
     * @return View
     */
    public function show(UserRepository $repo, $name)
    {

        $user = $repo->findByName($name);

        return view('user.show', compact('user'));

    }

}
