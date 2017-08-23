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
     * @return View
     */
    public function index(UserRepository $repo)
    {

        $users = $repo->getPaginated();

        return view('user.index', compact('users'));

    }

}
