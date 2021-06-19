<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('report.users', compact('users'));
    }

    public function create(){
        return view('register.register');
    }

    public function perfil(){
        //$user = User::where('id',Auth::user()->id)->get();
       // dd($user);
        return view('dashboard');
    }

    public function showAdmins(){
        $permissions = Permission::select('user_id')->where('role_id',2)->where('status',1)->get();
        $users = User::whereIn('id', $permissions )->get();
        return view('report.Admins', compact('users'));
    }

    public function showNurses(){
        $permissions = Permission::select('user_id')->where('role_id',3)->where('status',1)->get();
        $users = User::whereIn('id', $permissions )->get();
        return view('report.Admins', compact('users'));
    }

    public function showPatients(){
        $permissions = Permission::select('user_id')->where('role_id',1)->where('status',1)->get();
        $users = User::whereIn('id', $permissions )->get();
        return view('report.Admins', compact('users'));
    }
}
