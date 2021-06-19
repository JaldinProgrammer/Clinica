<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $using = Permission::select('role_id')->where('user_id',$id)->get();
        // Role::whereIn('id', $using)->get();
        $permissions = Permission::where('user_id',$id)->get();
        $permissions->load('role');
        $permissions->load('user');
        //dd($user);
        $roles = Role::whereNotin('id', $using)->get();
        return view('report.permissions', compact('roles'),compact('permissions'))->with('usuario',$user);
    }

    public function makeAdmin($id){
        Permission::create([
            'user_id' => $id,
            'role_id' => 2
        ]);     
        return redirect()->route('user.permissions', $id);
    }

    public function makeNurse($id){
        Permission::create([
            'user_id' => $id,
            'role_id' => 3
        ]);
        return redirect()->route('user.permissions', $id);
    }

    public function makePatient($id){
        Permission::create([
            'user_id' => $id,
            'role_id' => 1
        ]);
        return redirect()->route('user.permissions', $id);
    }

    public function activatePermission($id){
        $permission = Permission::findOrFail($id);
        $permission->load('user');
        $permission->status = 1;
        $permission->update();
        return redirect()->route('user.permissions', $permission->user->id);
    }

    public function desactivatePermission($id){
        $permission = Permission::findOrFail($id);
        $permission->load('user');
        $permission->status = 0;
        $permission->update();
        return redirect()->route('user.permissions', $permission->user->id);
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
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
