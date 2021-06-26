<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $schedules = Schedule::where('user_id', $id)->where('status',1)->paginate(4);
        $schedules->load('reservation');
        foreach($schedules as $schedule){
            $schedule->reservation->load('user');
            $schedule->reservation->load('service');
        }
        // dd($schedules);
        $user = User::findOrFail($id);
        return view('report.schedule', compact('schedules'), compact('user'));
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
        return redirect()->route('schedule.mySchedule', Auth::user()->id);
    }

    public function down($id){
        $schedule = Schedule::findOrFail($id);
        $schedule->status = 0; // turning off scheduled pass to free
        $schedule->update();
        $reservation = Reservation::findOrFail($schedule->reservation_id);
        $reservation->status = 0; // turning off reserved pass to free
        $reservation->update();
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
