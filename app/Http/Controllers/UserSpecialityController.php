<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\User_Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Binnacle;
use Illuminate\Support\Facades\Auth;
class UserSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $using = User_Speciality::select('speciality_id')->where('user_id',$id)->get();
        $User_Specialities = User_Speciality::where('user_id',$id)->get();
        $User_Specialities->load('speciality');
        $User_Specialities->load('user');
        $specialities = Speciality::where('status',1)->whereNotin('id', $using)->get();
        
        return view('report.specialities', compact('specialities'),compact('User_Specialities'))->with('usuario',$user);
    }

    public function setSpeciality($id,$speciality){
        $r = User_Speciality::create([
            'user_id' => $id,
            'speciality_id' => $speciality
        ]);     
        $r->load('user');
        Binnacle::create([
            'entity' => $r->user->name,
            'action' => "inserto",
            'table' => "Especialidad usuarios",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('user.specialities', $id);
    }

    public function activateSpeciality($id){
        $user_Speciality = User_Speciality::findOrFail($id);
        $user_Speciality->load('user');
        $user_Speciality->status = 1;
        $user_Speciality->update();
        Binnacle::create([
            'entity' => $user_Speciality->user->name,
            'action' => "activo",
            'table' => "Especialidad usuarios",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('user.specialities', $user_Speciality->user->id);
    }

    public function desactivateSpeciality($id){
        $user_Speciality = User_Speciality::findOrFail($id);
        $user_Speciality->load('user');
        $user_Speciality->status = 0;
        $user_Speciality->update();
        Binnacle::create([
            'entity' => $user_Speciality->user->name,
            'action' => "desactivo",
            'table' => "Especialidad usuarios",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('user.specialities', $user_Speciality->user->id);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\User_Speciality  $user_Speciality
     * @return \Illuminate\Http\Response
     */
    public function show(User_Speciality $user_Speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Speciality  $user_Speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Speciality $user_Speciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_Speciality  $user_Speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Speciality $user_Speciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Speciality  $user_Speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Speciality $user_Speciality)
    {
        //
    }
}
