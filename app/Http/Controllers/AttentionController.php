<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Location;
use App\Models\Section;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Binnacle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $attentions = Attention::paginate(5);
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
        $attention = Attention::create([
            'patient_id' => request('patient_id'),
            'nurse_id' => request('nurse_id'),
            'schedule_id' => request('schedule_id'),
            'service_id' => request('service_id'),
            'totalPrice' => request('totalPrice'),
            'checkOut' => request('checkOut'),
            'checkIn' => request('checkIn'),
            'date' => Carbon::now('America/Caracas')->today()
        ]);

        Binnacle::create([
            'entity' => "la atencion: ". $attention->id,
            'action' => "inserto",
            'table' => "Atencion",
            'user_id'=> Auth::user()->id
        ]);
        if(request('schedule_id') != null){
            $schedule = Schedule::findOrFail(request('schedule_id'));
            $reservation = Reservation::findOrFail($schedule->reservation_id);
            $location = Location::findOrFail($reservation->location_id);
            $section = Section::findOrFail($location->section_id);
            $service = Service::findOrFail($attention->service_id);
            $attention->totalPrice = $attention->totalPrice + $section->price + $service->price;
            $attention->update();
            $schedule->status = 2;
            $schedule->update();
        }
        return redirect()->route('attention.attention',$schedule->id ); 
    }

    public function myAttentions($id){
        $attentions = Attention::where('patient_id', $id)->paginate(7);
        return view('report.attention', compact('attentions'));
    }

    public function update(Request $request, $id)
    {
        $attention = Attention::findOrFail($id);
        $attention->checkIn = $request->get('checkIn');
        $attention->checkOut = $request->get('checkOut');
        $attention->update();
        Binnacle::create([
            'entity' => "la atencion: ".  $attention->id,
            'action' => "se actualizo",
            'table' => "Atencion",
            'user_id'=> Auth::user()->id
        ]);
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
