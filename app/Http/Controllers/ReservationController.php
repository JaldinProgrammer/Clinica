<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Binnacle;
use Illuminate\Support\Facades\Auth;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::paginate(4);
        $reservations->load('service');
        return view('report.allReservations', compact('reservations'));
    }

    public function delete($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 2;
        $reservation->update();
        Binnacle::create([
            'entity' => $reservation->details,
            'action' => "borro",
            'table' => "reservaciones",
            'user_id'=> Auth::user()->id
        ]);
        return $this->myReservations($reservation->user_id);
    }    

    public function searched(Request $request ){
        
        $reservations =  Reservation::where('date', $request->get('searched'))->orderby('time','DESC')->paginate(3);
        $reservations->load('service');
        return view('report.allReservations', compact('reservations'));
    }

    public function nowReservations(){
        $now = Carbon::now('America/Caracas');
        $reservations =  Reservation::where('date', $now->today())->orderby('time','DESC')->paginate(3);
        $reservations->load('service');
        $reservations->load('user');
        $reservations->load('location');
        return view('report.allReservations', compact('reservations'));
    }
    
    public function futureReservations(){
        $now = Carbon::now('America/Caracas');
        $reservations =  Reservation::where('date','>', $now->today())->orderby('time','ASC')->paginate(3);
        $reservations->load('service');
        $reservations->load('user');
        $reservations->load('location');
        return view('report.allReservations', compact('reservations'));
    }

    public function pastReservations(){
        $now = Carbon::now('America/Caracas');
        $reservations =  Reservation::where('date','<',$now->today())->orderby('time','ASC')->paginate(3);
        $reservations->load('service');
        $reservations->load('user');
        $reservations->load('location');
        return view('report.allReservations', compact('reservations'));
    }

    public function myReservations($id)
    {

        $reservations = Reservation::where('user_id',$id)->where('status','!=', 2)->orderby('id','ASC')->paginate(3);
        return view('report.reservations', compact('reservations'));
    }

    public function register($id){
        $user = User::findOrFail($id);
        $locations = Location::where('user_id', $id)->get();
        $services = Service::where('status',1)->get();
        //dd($services);
        return view('register.reservations',compact('locations'), compact('services'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $credentials =   Request()->validate([
            'date'=> ['required','date'] ,
            'details'=> ['required','string'] ,
            'time'=> ['required'] ,
            'location_id'=> ['required'] ,
            'service_id'=> ['required'] ,
        ]);
        Reservation::create([
            'date' => request('date'),
            'details' => request('details'),
            'time' => request('time'),
            'location_id' => request('location_id'),
            'user_id' => request('user_id'),
            'service_id' => request('service_id')
        ]);
        Binnacle::create([
            'entity' => request('details'),
            'action' => "inserto",
            'table' => "reservaciones",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('reservation.myReservations', request('user_id'));
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
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
