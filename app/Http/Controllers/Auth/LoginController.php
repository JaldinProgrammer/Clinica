<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Binnacle;
use Carbon\Carbon;
class LoginController extends Controller
{
    public function login()
    {
        $credentials =   Request()->validate([
            'user' => ['required', 'string'],
            'password' => ['required', 'string']
         ]);
        $remember = request()->filled('remember');
         if(Auth::attempt($credentials, $remember)){
            request()->session()->regenerate();
            Binnacle::create([
                'entity' => Request('user'),
                'action' => "Se loggeo en",
                'table' => "El sistema",
                'user_id'=> Auth::user()->id
            ]); 
            return redirect()->route('user.perfil');
         }
         throw ValidationException::withMessages([
            'user' => __('auth.failed')
         ]);
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function create(){
        //dd(request());
        $name = User::where('user',request('user'))->get();
        //dd($name);
        if(sizeof($name)!=0 ){
            return back()->withErrors('Este nombre de usuario ya existe');
        }
        $credentials =   Request()->validate([
            'phone' => ['string'],
            'name' => ['required', 'string'],
            'user' => ['required', 'string'],
            'email' => ['email'],     
            'password' => ['required', 'string', 'confirmed'],
        ]);
        User::create([
            'phone' => request('phone'),
            'name' => request('name'),
            'user' => request('user'),
            'email' => request('email'),   
            'password' => Hash::make(request('password')),
        ]);
        Binnacle::create([
            'entity' => Request('user'),
            'action' => "inserto",
            'table' => "Usuarios",
            'user_id'=> Auth::user()->id
        ]);
        return redirect()->route('user.all');
    }

    public function perfil(){
        
    }
}
