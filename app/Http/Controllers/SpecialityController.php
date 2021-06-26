<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::orderby('id','DESC')->paginate(4);
        return view('register.speciality', compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $credentials =   Request()->validate([
            'name' => ['required','string']
        ]);
        Speciality::create([
            'name' => request('name'),
        ]);
        return redirect()->route('speciality.all');
    }

    public function activate($id){
        $Instrument_type = Speciality::findOrFail($id);
        $Instrument_type->status = 1;
        $Instrument_type->update();
        return redirect()->route('speciality.all');
    }

    public function desactivate($id){
        $Instrument_type = Speciality::findOrFail($id);
        $Instrument_type->status = 0;
        $Instrument_type->update();
        return redirect()->route('speciality.all');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials =   Request()->validate([
            'name' => ['required','string']
        ]);
        $speciality = Speciality::findOrFail($id);
        $speciality->name = Request('name');
        $speciality->update();
        return redirect()->route('speciality.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        //
    }
}
