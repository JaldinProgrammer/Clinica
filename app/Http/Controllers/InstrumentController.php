<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\Instrument_type;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instruments = Instrument::orderby('id','DESC')->paginate(4);
        $instrument_types = Instrument_type::where('status',1)->get();
        $instruments->load('instrument_type');
        return view('report.instruments', compact('instruments'), compact('instrument_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $credentials =   Request()->validate([
            'name' => ['required','string'],
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'instrument_type_id' => ['required']
        ]);
        Instrument::create([
            'name' => request('name'),
            'price' => request('price'),
            'stock' => request('stock'),
            'instrument_type_id' => request('instrument_type_id')
        ]);
        return redirect()->route('instruments.eachOne');
    }

    public function activate($id){
        $instrument = Instrument::findOrFail($id);
        $instrument->status = 1;
        $instrument->update();
        return redirect()->route('instrument.all');
    }

    public function desactivate($id){
        $instrument = Instrument::findOrFail($id);
        $instrument->status = 0;
        $instrument->update();
        return redirect()->route('instruments.eachOne');
    }

    public function edit($id)
    {
        $instrument = Instrument::findOrFail($id);
        $instrument_types = Instrument_type::where('status',1)->get();
        return view('update.instruments',compact('instrument'), compact('instrument_types'));
    }

    public function update(Request $request, $id)
    {
        $credentials =   Request()->validate([
            'name' => ['required','string'],
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'instrument_type_id' => ['required']
        ]);
        $instrument = Instrument::findOrFail($id);
        $instrument->price = Request('price');
        $instrument->name = Request('name');
        $instrument->stock = Request('stock');
        $instrument->instrument_type_id = Request('instrument_type_id');
        $instrument->update();
        return redirect()->route('instruments.eachOne');
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
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument $instrument)
    {
        //
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument)
    {
        //
    }
}
