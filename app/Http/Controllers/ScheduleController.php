<?php

namespace App\Http\Controllers;

use App\Models\Attention;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Binnacle;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all()->paginate(4);
        //return view('report.schedule', compact('$chedules'));
    }

    public function mySchedule($id){
        $schedules = Schedule::where('user_id', $id)->where('status','!=',0)->paginate(4);
        
        $schedules->load('reservation'); 
        foreach($schedules as $schedule){
            $schedule->reservation->load('user');
            $schedule->reservation->load('service');
        }
        $user = User::findOrFail($id);
        $attentions = Attention::whereIn('schedule_id',$schedules )->get();
        //dd($attentions);
        return view('report.schedule', compact('schedules'), compact('user'))->with('attentions',$attentions );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $credentials =   Request()->validate([
        //     'zoomLink' => ['required','string'],
        //     'user_id' => ['required','numeric'],
        //     'user_id' => ['required','numeric'],
        // ]);
        Schedule::create([
            'zoomLink' => request('zoomLink'),
            'reservation_id' => request('reservation_id'),
            'user_id' => request('user_id'),
        ]);

        $reservation = Reservation::findOrFail(request('reservation_id'));
        $reservation->status = 1; // turning On reservation reserved
        $reservation->update();
        Binnacle::create([
            'entity' => $reservation->details,
            'action' => "inserto",
            'table' => "agenda",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('schedule.mySchedule', Auth::user()->id);
    }

    public function down($id){
        $schedule = Schedule::findOrFail($id);
        $schedule->status = 0; // turning off scheduled pass to free
        $schedule->update();
        $reservation = Reservation::findOrFail($schedule->reservation_id);
        $reservation->status = 0; // turning off reserved pass to free
        $reservation->update();
        Binnacle::create([
            'entity' => $reservation->details,
            'action' => "dio de baja",
            'table' => "agenda",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('schedule.mySchedule', Auth::user()->id);
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
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
