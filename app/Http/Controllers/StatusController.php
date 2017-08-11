<?php

namespace Larabook\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index()
    {

        return view('status.index');

    }

}
