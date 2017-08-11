<?php

namespace Larabook\Http\Controllers\Auth;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Larabook\Http\Controllers\Controller;
use Larabook\Http\Requests\RegisterUserRequest;
use Larabook\Jobs\RegisterUser;

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

        flash('Glad to have you as a new Larabook member!')->important();

        return redirect()->route('home');

    }

}
