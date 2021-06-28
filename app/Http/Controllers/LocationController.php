<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Binnacle;
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
        $user = User::findOrFail($id);
        $locations->load('user');
        return view('report.locations', compact('locations'), compact('user'));
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
            'title' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'latitude' => ['required'],
            'section_id' => ['required'],
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
        Binnacle::create([
            'entity' => $request['title'],
            'action' => "inserto",
            'table' => "Ubicaciones",
            'user_id'=> Auth::user()->id
        ]);
        $locations = Location::where('user_id',$user)->get();
        return view('report.locations', compact('locations'));
    }

    public function showMap($id){
        $location = Location::findOrFail($id);
        return view('report.show_map', compact('location'));
    }

    public function locationsAll(){
        $locations = Location::orderby('id','desc')->paginate(9);
        $locations->load('user');
        $locations->load('section');
        return view('report.locationsAll', compact('locations'));
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
