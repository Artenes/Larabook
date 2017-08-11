<?php

namespace Larabook\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Larabook\Http\Requests\PublishStatusRequest;
use Larabook\Jobs\PublishStatus;
use Larabook\Models\Status;
use Larabook\Repositories\StatusRepository;
use Laracasts\Flash\Flash;

/**
 * Controller of user's status.
 *
 * @package Larabook\Http\Controllers
 */
class StatusController extends Controller
{

    /**
     * Shows the statuses page.
     *
     * @param StatusRepository $repo
     * @return View
     */
    public function index(StatusRepository $repo)
    {

        $statuses = $repo->getAllForUser(Auth::user()->id);

        return view('status.index', compact('statuses'));

    }

    /**
     * Store a new user's status.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(PublishStatusRequest $request)
    {

        dispatch(new PublishStatus($request->get('status'), Auth::user()->id));

        Flash::message('Your status has been updated')->important();

        return redirect()->refresh();

    }

}
