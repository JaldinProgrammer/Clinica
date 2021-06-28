<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Binnacle;
use Illuminate\Support\Facades\Auth;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderby('id','DESC')->paginate(3);
        return view('report.services', compact('services'));
    }

    public function showAvailable()
    {
        $services = Service::where('status',1)->orderby('name','ASC')->paginate(6);
        return view('report.publicServices', compact('services'));
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
            'description' => ['required','string']
        ]);
        $service = Service::create([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description')
        ]);
        Binnacle::create([
            'entity' => $service->name,
            'action' => "inserto",
            'table' => "servicio",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('service.all');
    }

    public function activate($id){
        $service = Service::findOrFail($id);
        $service->status = 1;
        $service->update();
        Binnacle::create([
            'entity' => $service->name,
            'action' => "activo",
            'table' => "servicio",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('service.all');
    }

    public function desactivate($id){
        $service = Service::findOrFail($id);
        $service->status = 0;
        $service->update();
        Binnacle::create([
            'entity' => $service->name,
            'action' => "desactivo",
            'table' => "servicio",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('service.all');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $credentials =   Request()->validate([
            'name' => ['required','string'],
            'price' => ['required','numeric'],
            'description' => ['required','string']
        ]);
        $service = Service::findOrFail($id);
        $service->name = Request('name');
        $service->price = Request('price');
        $service->description = Request('description');
        $service->update();
        Binnacle::create([
            'entity' => $service->name,
            'action' => "actualizo",
            'table' => "servicio",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('service.all');
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
