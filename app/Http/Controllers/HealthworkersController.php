<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Healthworker;
use App\Models\Hospital;
use App\Models\Patient;

class HealthworkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthWorkers = Healthworker::orderBy('created_at', 'desc')->paginate(10);
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
        return view('healthWorker.create');
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
            'username' => "required|unique:healthworkers,username",
            // 'hospital' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique' => "This username, $username, has already been used",
        ];

        $this->validate($request, $rules, $customMessages);

        $healthWorker = new HealthWorker;

        $healthWorker->name = request('name');
        $healthWorker->username = request('username');

        $hospital = Hospital::where('level', 'General')->orderBy('workersNo')->first();
        $healthWorker->hospital_id = $hospital->id;

        $healthWorker->save();
        
        $hospital->workersNo = ($hospital->workersNo)+1;
        if($hospital->headofficer_id == NULL)
        {
            $hospital->headofficer_id = $healthWorker->id;
        }
        $hospital->save();

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
        $healthWorker = Healthworker::findOrFail($id);
        $hospital = Hospital::findOrFail($healthWorker->hospital_id);
        $patients = Patient::where('healthWorker_id', $healthWorker->id)->paginate(4);
        return view('healthWorker.show', ['healthWorker' => $healthWorker, 'hospital' => $hospital, 'patients' => $patients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $healthWorker = Healthworker::findOrFail($id);
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
        $username = request('username');
        $rules = [
            'name' => 'required',
            'username' => "required|unique:healthworkers,username,$id",
            'hospital' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique' => "This username, $username, has already been used by another user.",
        ];

        $this->validate($request, $rules, $customMessages);
        $healthWorker = Healthworker::find($id);

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
        $healthWorker = Healthworker::findOrFail($id);
        $hospital = Hospital::find($healthWorker->hospital_id);
        $healthWorker->delete();
        
        --$hospital->workersNo;
        $hospital->save();

        // //if health worker was head. replace him
        // $hosp = Hospital::where('headofficer_id', $id)->first();
        // if ($hosp != null) {
        //     $hosp->headofficer_id = NULL;

        //     $newHead = Healthworker::where('hospital_id', $hosp->id)->orderBy('created_at')->first();
        //     //if hospital stil has workers left
        //     if ($newHead != null) {
        //         $hosp->headofficer_id = $newHead->id;
        //     }
        //     $hosp->save();
        // }

        return redirect('/healthworkers')->with('msg', 'A Health Officer has Been Removed from the Database');
    }
}
