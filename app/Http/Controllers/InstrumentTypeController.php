<?php

namespace App\Http\Controllers;

use App\Models\Instrument_type;
use Illuminate\Http\Request;

class InstrumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Instrument_types = Instrument_type::all();
        return view('report.instrument_type',compact('Instrument_types'));
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
        Instrument_type::create([
            'name' => request('name'),
        ]);
        return redirect()->route('instrument.all');
    }

    public function activate($id){
        $Instrument_type = Instrument_type::findOrFail($id);
        $Instrument_type->status = 1;
        $Instrument_type->update();
        return redirect()->route('instrument.all');
    }

    public function desactivate($id){
        $Instrument_type = Instrument_type::findOrFail($id);
        $Instrument_type->status = 0;
        $Instrument_type->update();
        return redirect()->route('instrument.all');
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
     * @param  \App\Models\Instrument_type  $instrument_type
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument_type $instrument_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instrument_type  $instrument_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrument_type $instrument_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instrument_type  $instrument_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $credentials =   Request()->validate([
            'name' => ['required','string']
        ]);
        $instrument_type = Instrument_type::findOrFail($id);
        $instrument_type->name = Request('name');
        $instrument_type->update();
        return redirect()->route('instrument.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrument_type  $instrument_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument_type $instrument_type)
    {
        //
    }
}
