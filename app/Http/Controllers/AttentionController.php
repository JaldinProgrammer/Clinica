<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attentions = Attention::all();
        $attentions->load('service');
        $attentions->load('nurse');
        $attentions->load('patient');
        $attentions->load('schedule');
        return view('report.attention', compact('attentions'));
    }

    public function attention($id)
    {
        $attention = Attention::where('schedule_id', $id)->get();
        $attention->load('service');
        $attention->load('nurse');
        $attention->load('patient');
        $attention->load('schedule');
        return view('report.attentionRes', compact('attention'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Attention::create([
            'patient_id' => request('patient_id'),
            'nurse_id' => request('nurse_id'),
            'schedule_id' => request('schedule_id'),
            'service_id' => request('service_id'),
            'totalPrice' => request('totalPrice'),
            'checkOut' => request('checkOut'),
            'checkIn' => request('checkIn'),
            'date' => Carbon::now('America/Caracas')->today()
        ]);
        return redirect()->route('attention.attention',request('schedule_id') ); 
    }

    public function update(Request $request, $id)
    {
        $attention = Attention::findOrFail($id);
        $attention->checkIn = $request->get('checkIn');
        $attention->checkOut = $request->get('checkOut');
        $attention->update();
        return redirect()->route('attention.attention',$attention->schedule_id ); 
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
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function show(Attention $attention)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function edit(Attention $attention)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attention  $attention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attention $attention)
    {
        //
    }
}
