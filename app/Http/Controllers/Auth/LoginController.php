<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return redirect('/');
    }

    public function perfil(){
        
    }
}
