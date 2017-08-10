<?php

namespace Larabook\Http\Controllers\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Larabook\Events\UserRegistered;
use Larabook\Http\Controllers\Controller;
use Larabook\Http\Requests\RegisterUserRequest;
use Larabook\Jobs\RegisterUser;
use Laracasts\Flash\Flash;

/**
 * Controller to handle user registration.
 *
 * @package Larabook\Http\Controllers\Auth
 */
class RegisterController extends Controller
{

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {

        $this->middleware('guest');

    }

    /**
     * Show the registration form.
     *
     * @return Factory|View
     */
    public function showRegistrationForm()
    {

        return view('auth.register');

    }

    /**
     * Register a new user.
     *
     * @param RegisterUserRequest $request
     * @return Response
     */
    public function register(RegisterUserRequest $request)
    {

        extract($request->only(['name', 'email', 'password']));

        $user = dispatch(new RegisterUser($name, $email, $password));

        Auth::login($user);

        event(new UserRegistered($user));

        Flash::message('Glad to have you as a new Larabook member!');

        return redirect()->route('home');

    }

}
