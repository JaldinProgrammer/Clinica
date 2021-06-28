<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Binnacle;
class UserController extends Controller
{
    public function index(){
        $users = User::orderby('id','desc')->paginate(5);
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
        $users = User::whereIn('id', $permissions )->paginate(5);
        return view('report.Admins', compact('users'));
    }

    public function showNurses(){
        $permissions = Permission::select('user_id')->where('role_id',3)->where('status',1)->get();
        $users = User::whereIn('id', $permissions )->paginate(5);
        return view('report.Nurses', compact('users'));
    }

    public function showPatients(){
        $permissions = Permission::select('user_id')->where('role_id',1)->where('status',1)->get();
        $users = User::whereIn('id', $permissions )->paginate(5);
        return view('report.Patients', compact('users'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if($user->user != request('user')){
            $name = User::where('user',request('user'))->get();
            //dd($name);
            if(sizeof($name)!=0 ){
                return back()->withErrors('Este nombre de usuario ya existe');
            }
        }
        $credentials =   Request()->validate([
            'phone' => ['string'],
            'name' => ['required', 'string'],
            'user' => ['required','string'],
            'email' => ['email'],     
        ]);
        $user->phone = $request->get('phone');
        $user->name = $request->get('name');
        $user->user = $request->get('user');
        $user->email = $request->get('email');
        $user->update();
        Binnacle::create([
            'entity' => $request->get('name'),
            'action' => "se actualizo",
            'table' => "Usuarios",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('user.all');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('update.users',compact('user'));
    }
}
