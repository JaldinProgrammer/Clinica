<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use App\Models\Attention_instrument;
use App\Models\Instrument;
use Illuminate\Http\Request;

class AttentionInstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $attention_instruments = Attention_instrument::where('attention_id', $id)->paginate(6);
        $attention_instruments->load('instrument');
        $attention_instruments->load('attention');
        $instruments = Instrument::where('status',1)->get();
        $attention = Attention::findOrFail($id);
        return view('report.attentionInstruments', compact('attention_instruments'), compact('instruments'))->with('attention', $attention);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Attention_instrument::create([
            'attention_id' => request('attention_id'),
            'instrument_id' => request('instrument_id'),
            'amount' => request('amount'),
        ]);
        $instrument = Instrument::findOrFail(request('instrument_id'));
        $instrument->stock = $instrument->stock - request('amount');
        $instrument->update();
        return redirect()->route('attention_instrument.index', request('attention_id'));
    }

    public function update($id)
    {
        $attention_instruments = Attention_instrument::findOrFail($id);
        $instrument = Instrument::findOrFail($attention_instruments->instrument_id);
        $instrument->stock = $instrument->stock + $attention_instruments->amount;
        $attention_instruments->amount = request('amount');
        $instrument->stock = $instrument->stock - request('amount');
        $instrument->update();
        $attention_instruments->update();
        return redirect()->route('attention_instrument.index',$attention_instruments->attention_id);
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
     * @param  \App\Models\Attention_instrument  $attention_instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Attention_instrument $attention_instrument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attention_instrument  $attention_instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Attention_instrument $attention_instrument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attention_instrument  $attention_instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attention_instrument $attention_instrument)
    {
        //
    }
}
