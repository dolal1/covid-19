<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthWorker;

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
        $healthWorker = new HealthWorker;

        $healthWorker->name = request('name');
        $healthWorker->hospital = request('hospital');

        $healthWorker->save();

        return redirect('/healthworkers')->with('msg', 'Health Worker has Been Added to the Database');
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
        return view('healthWorker.show', ['healthWorker' => $healthWorker]);
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
        return view('healthWorker.edit', ['healthWorker' => $healthWorker]);
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
        $healthWorker = HealthWorker::find($id);

        $healthWorker->name = request('name');
        $healthWorker->hospital = request('hospital');

        $healthWorker->save();

        return redirect('/healthworkers')->with('msg', 'Health Worker Info has Been Updated in the Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $healthWorker = HealthWorker::findOrFail($id);
        // $healthWorker->delete();

        return redirect('/healthworkers')->with('msg', 'A Health Officer has Been Removed from the Database');
    }
}
