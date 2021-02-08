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
        $healthWorkers = Healthworker::orderBy('created_at', 'desc')->paginate(6);
        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(6);
        $patients = Patient::orderBy('created_at', 'desc')->paginate(6);
        $totalNoPatients = Patient::count();
        return view('pages.dashboard', [
            'healthWorkers' => $healthWorkers,
            'hospitals' => $hospitals,
            'patients' => $patients,
            'totalNoPatients' => $totalNoPatients
        ]);
    }
}
