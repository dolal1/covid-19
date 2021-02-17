<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Healthworker;
use App\Models\District;
use App\Models\Patient;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(10);
        return view('hospitals.index', [
            'hospitals' => $hospitals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        return view('hospitals.create', [
            'districts' => $districts,
            'levels' => ['National', 'Regional', 'General'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hospital = new Hospital();

        $hospital->name = request('hospital');
        $hospital->district_id = request('district');
        $hospital->level = request('level');

        $hospital->save();

        $name = $hospital->name;
        return redirect('/hospitals')->with('msg', "$name has Been Added to the Database");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::findOrFail($id);
        $district = District::find($hospital->district_id);
        $healthWorkers = Healthworker::where('hospital_id', '=', $hospital->id)->paginate(4);

        $headOfficerName = 'None';
        $headOfficer = Healthworker::find($hospital->headofficer_id);
        if ($headOfficer != NULL) {
            $headOfficerName = "Dr. ".$headOfficer->name;
        }

        return view('hospitals.show', ['hospital' => $hospital, 'district' => $district, 'headOfficerName' => $headOfficerName, 'healthWorkers' => $healthWorkers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        $districts = District::all();
        $orignalDistrict = District::findOrFail($hospital->district_id);
        $originalLevel = $hospital->level;
        return view('hospitals.edit', [
            'hospital' => $hospital, 
            'districts' => $districts,
            'levels' => ['National', 'Regional', 'General'],
            'orignalDistrict' => $orignalDistrict,
            'originalLevel' => $originalLevel,
        ]);
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
        $hospital = Hospital::find($id);

        $hospital->name = request('hospital');
        $hospital->district_id = request('district');
        $hospital->level = request('level');

        $hospital->save();

        $name = $hospital->name;
        return redirect('/hospitals')->with('msg', "$name has Been Updated in the Database");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);
        $name = $hospital->name;
        $hospital->delete();

        return redirect('/hospitals')->with('msg', "$name has Been Removed from the Database");
    }
}
