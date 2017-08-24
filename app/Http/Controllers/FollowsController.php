<?php

namespace Larabook\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Larabook\Jobs\FollowUser;
use Laracasts\Flash\Flash;

class FollowsController extends Controller
{

    /**
     * FollowersController constructor.
     */
    public function __construct()
    {

        $this->middleware('auth');

    }


    /**
     * Follow user.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $userIdToFollow = $request->get('user_id_to_follow');
        $authUserId = Auth::user()->id;

        dispatch(new FollowUser($authUserId, $userIdToFollow));

        Flash::success('You are now following this user')->important();

        return redirect()->back();

    }

    /**
     * Stop following user.
     */
    public function destroy()
    {

    }

}
