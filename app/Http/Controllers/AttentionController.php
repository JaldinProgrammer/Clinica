<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use App\Models\Reservation;
use App\Models\Schedule;
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
        $attentions = Attention::where('schedule_id', $id)->get();
        $attentions->load('service');
        $attentions->load('nurse');
        $attentions->load('patient');
        $attentions->load('schedule');
        return view('report.attentionRes', compact('attentions'));
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

        if(request('schedule_id') != null){
            $schedule = Schedule::findOrFail(request('schedule_id'));
           // $reservation = Reservation::findOrFail(Schedule::select('reservation_id')->where('status',1)->get());
            $schedule->status = 2;
            $schedule->update();


        }
        return redirect()->route('attention.attention',$schedule->id ); 
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
