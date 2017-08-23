<?php

namespace Larabook\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Larabook\Http\Controllers\Controller;
use Larabook\Models\User;

/**
 * Login controller.
 *
 * @package Larabook\Http\Controllers\Auth
 */
class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected $redirectTo = '/statuses';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');

    }

    /**
     * The user has been authenticated.
     *
     * @param  Request  $request
     * @param  User $user
     */
    protected function authenticated(Request $request, $user)
    {

        flash('Welcome back!')->important();

    }

}
