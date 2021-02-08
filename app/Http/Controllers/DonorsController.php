<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Donor;
use App\Models\Treasury;

class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::orderBy('created_at', 'desc')->paginate(10);

        $totalDonations = Donor::sum('amount');
        return view('donors.index', ['donors' => $donors, 'totalDonations' => $totalDonations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donor = new Donor();

        $donor->name = request('name');
        $donor->amount = request('amount');

        $donor->save();

        $totalDonations = DB::table('donors')->sum('amount');
        $excess = $totalDonations - 1000000;

        $treasury = Treasury::find(1);
        $treasury->amount = $totalDonations;
        if($excess < 1 ) {
            $treasury->excess = 0;
        } else {
            $treasury->excess = $excess;
        }

        $treasury->save();

        return redirect('/donors')->with('msg', 'This Donation has Been Added to the Database');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        return view('donors.edit', ['donor' => $donor]);
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
        $donor = Donor::find($id);

        $donor->name = request('name');
        $donor->amount = request('amount');

        $donor->save();
        
        $totalDonations = DB::table('donors')->sum('amount');
        $excess = $totalDonations - 1000000;

        $treasury = Treasury::find(1);
        $treasury->amount = $totalDonations;
        if($excess < 1 ) {
            $treasury->excess = 0;
        } else {
            $treasury->excess = $excess;
        }

        $treasury->save();

        return redirect('/donors')->with('msg', 'This Donation Info Has Been Updated In The Database');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->delete();

        $totalDonations = DB::table('donors')->sum('amount');
        $excess = $totalDonations - 1000000;

        $treasury = Treasury::find(1);
        $treasury->amount = $totalDonations;
        if($excess < 1 ) {
            $treasury->excess = 0;
        } else {
            $treasury->excess = $excess;
        }

        $treasury->save();

        return redirect('/donors')->with('msg', 'This Donation has Been Removed from the Database');
    }
}
