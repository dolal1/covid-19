<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientsController extends Controller
{
    function viewPatientsPage () {
        return view('patients.index');
    }
}
