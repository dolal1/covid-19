<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalsController extends Controller
{
    function viewHospitalsPage () {
        return view('hospitals.index');
    }
}
