<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\Healthworker;
use Carbon\Carbon;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', [
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all();
        $healtworkers = HealthWorker::all();
        return view('patients.create', ['hospitals' => $hospitals, 'healthworkers' => $healtworkers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient();

        $patient->name = request('name');
        $patient->hospital_id = Hospital::find(request('healthWorker_id'))->id;
        $patient->gender = request('gender');
        $patient->healthWorker_id = request('healthWorker_id');
        $patient->asymptomatic = request('asymptomatic');
        $patient->date = Carbon::now()->toDateTimeString();

        $patient->save();

        $hospital = Hospital::find(request('healthWorker_id'));
        ++$hospital->patientNo;
        $hospital->save();

        $name = $patient->name;
        return redirect('/patients')->with('msg', "$name has Been Added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        $hospital = Hospital::findOrFail($patient->hospital_id);
        $healthWorker = HealthWorker::findOrFail($patient->healthWorker_id);
        return view('patients.show', ['patient' => $patient, 'hospital' => $hospital, 'healthWorker' => $healthWorker]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $hospitals = Hospital::all();
        $allHealthWorkers = HealthWorker::all();
        $hospital = Hospital::findOrFail($patient->hospital_id);
        $selectedHealthWorker = HealthWorker::findOrFail($patient->healthWorker_id);

        return view('patients.edit', ['patient' => $patient, 'hospital' => $hospital, 'healthWorker' => $selectedHealthWorker, 'hospitals' => $hospitals, 'healthWorkers' => $allHealthWorkers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        $patient->name = request('name');
        $patient->hospital_id = Hospital::find(request('healthWorker_id'))->id;
        $patient->gender = request('gender');
        $patient->healthWorker_id = request('healthWorker_id');
        $patient->asymptomatic = request('asymptomatic');

        $patient->save();

        $name = $patient->name;
        return redirect('/patients')->with('msg', "$name has Been Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $hospital = $patient->hospital_id;
        $name = $patient->name;

        $patient->delete();

        $hospital = Hospital::find($hospital);
        --$hospital->patientNo;
        $hospital->save();

        return redirect('/patients')->with('msg', "$name has Been Deleted.");
    }
}
