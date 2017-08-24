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
     * @var UserRepository
     */
    protected $repo;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repo
     */
    public function __construct(UserRepository $repo)
    {

        $this->repo = $repo;

        $this->middleware('auth')->except(['index', 'show']);

    }

    /**
     * Displays all users.
     *
     * @return View
     */
    public function index()
    {

        $users = $this->repo->getPaginated();

        return view('user.index', compact('users'));

    }

    /**
     * Show a user profile.
     *
     * @param $name
     * @return View
     */
    public function show($name)
    {

        $user = $this->repo->findByName($name);

        return view('user.show', compact('user'));

    }

}
