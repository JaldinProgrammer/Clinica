<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $locations = Location::where('user_id',$user)->get();
        return view('report.locations', compact('locations'));
    }

    public function userLocations($id)
    {
        $locations = Location::where('user_id',$id)->get();
        return view('report.locations', compact('locations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $sections = Section::all();
       return view('register.reg_locations',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'title' => ['required']
        ]);

        $user = $request['user_id'];
        Location::create([
            'title' => $request['title'],
            'latitude'=> $request['latitude'],
            'longitude'=> $request['longitude'],
            'details'=> $request['details'],
            'number'=> $request['number'],
            'user_id'=> $request['user_id'],
            'section_id' => $request['section_id']
        ]);
        $locations = Location::where('user_id',$user)->get();
        return view('report.locations', compact('locations'));
    }

    public function showMap($id){
        $location = Location::findOrFail($id);
        return view('report.show_map', compact('location'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
