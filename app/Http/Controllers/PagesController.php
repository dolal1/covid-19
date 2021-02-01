<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\Healthworker;

class PagesController extends Controller
{
    function landingPage () {
        return view('pages.landing');
    }

    function dashboardPage () {
        $healthWorkers = Healthworker::paginate(5);
        $hospitals = Hospital::paginate(5);
        $patients = Patient::paginate(2);
        return view('pages.dashboard', [
            'healthWorkers' => $healthWorkers,
            'hospitals' => $hospitals,
            'patients' => $patients,
        ]);
    }
}
