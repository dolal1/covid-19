<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function landingPage () {
    return view('pages.landing');
    }

    function dashboardPage () {
    return view('pages.dashboard');
    }
}
