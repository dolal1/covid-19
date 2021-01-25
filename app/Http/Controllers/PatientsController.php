<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
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
        return view('patients.create');
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
        $patient->hospital = request('hospital');
        $patient->gender = request('gender');
        $patient->officer = request('officer');
        $patient->asymptomatic = request('asymptomatic');
        $patient->date = Carbon::now()->toDateTimeString();

        $patient->save();

        return redirect('/patients')->with('msg', 'Patient has Been Added to the Database');
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
        return view('patients.show', ['patient' => $patient]);
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
        return view('patients.edit', ['patient' => $patient]);
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
        $patient->hospital = request('hospital');
        $patient->gender = request('gender');
        $patient->officer = request('officer');
        $patient->asymptomatic = request('asymptomatic');

        $patient->save();

        return redirect('/patients')->with('msg', 'Patient Info has Been Updated in the Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $patient = Patient::findOrFail($id);
        // $patient->delete();

        return redirect('/patients')->with('msg', 'Patient has Been Removed from the Database');
    }
}
