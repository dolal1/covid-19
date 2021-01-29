<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthWorker;
use App\Models\Hospital;

class HealthWorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthWorkers = HealthWorker::all();
        return view('healthWorker.index', [
            'healthWorkers' => $healthWorkers,
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
        return view('healthWorker.create', ['hospitals' => $hospitals]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = request('username');
        $rules = [
            'name' => 'required',
            'username' => "required|unique:health_workers,username",
            'hospital' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique' => "This username, $username, has already been used",
        ];

        $this->validate($request, $rules, $customMessages);

        $healthWorker = new HealthWorker;

        $healthWorker->name = request('name');
        $healthWorker->username = request('username');
        $healthWorker->hospital_id = request('hospital');

        $healthWorker->save();
        $name = $healthWorker->name;
        return redirect('/healthworkers')->with('msg', "$name has Been Added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $healthWorker = HealthWorker::findOrFail($id);
        $hospital = Hospital::findOrFail($healthWorker->hospital_id);
        return view('healthWorker.show', ['healthWorker' => $healthWorker, 'hospital' => $hospital]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $healthWorker = HealthWorker::findOrFail($id);
        $hospital = Hospital::findOrFail($healthWorker->hospital_id);
        $hospitals = Hospital::all();

        return view('healthWorker.edit', ['healthWorker' => $healthWorker, 'hospitals' => $hospitals, 'hospital' => $hospital]);
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
        $rules = [
            'name' => 'required',
            'username' => "required|unique:health_workers,username,$id",
            'hospital' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique' => "This username, :attribute, has already been used",
        ];

        $this->validate($request, $rules, $customMessages);
        $healthWorker = HealthWorker::find($id);

        $healthWorker->name = request('name');
        $healthWorker->username = request('username');
        $healthWorker->hospital_id = request('hospital');

        $healthWorker->save();
        $name = $healthWorker->name;
        return redirect('/healthworkers')->with('msg', "$name has Been Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $healthWorker = HealthWorker::findOrFail($id);
        $healthWorker->delete();

        return redirect('/healthworkers')->with('msg', 'A Health Officer has Been Removed from the Database');
    }
}
