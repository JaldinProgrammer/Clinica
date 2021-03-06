<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Binnacle;
use Illuminate\Support\Facades\Auth;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::paginate(6);
        return view('report.sections',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register(){
        return view('register.sections');
    }

    public function create()
    {
        $credentials =   Request()->validate([
            'price' => ['string'],
            'name' => ['required', 'string'],  
        ]);
        Section::create([
            'price' => request('price'),
            'name' => request('name'),
        ]);
        Binnacle::create([
            'entity' => request('name'),
            'action' => "inserto",
            'table' => "seccion",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('sections.all');
    }

    public function edit($id){
        $section = Section::findOrFail($id);
        return view('update.sections', compact('section'));
    }

    public function update($id){
        $credentials =   Request()->validate([
            'price' => ['string'],
            'name' => ['required', 'string'],  
        ]);
        $section = Section::findOrFail($id);
        $section->price = Request('price');
        $section->name = Request('name');
        $section->update();
        Binnacle::create([
            'entity' => request('name'),
            'action' => "actualizo",
            'table' => "seccion",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('sections.all');
    }

    public function activateSection($id){
        $section = Section::findOrFail($id);
        $section->status = 1;
        $section->update();
        Binnacle::create([
            'entity' => $section->name,
            'action' => "activo",
            'table' => "seccion",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('sections.all');
    }

    public function desactivateSection($id){
        $section = Section::findOrFail($id);
        $section->status = 0;
        $section->update();
        Binnacle::create([
            'entity' => $section->name,
            'action' => "desactivo",
            'table' => "seccion",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('sections.all');
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
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
