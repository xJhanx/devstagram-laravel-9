<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        return view('auth.login');
    }

    public function store(ValidationLogin $request){
        $validated = $request->validated();

        if(!Auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','credenciales incorrectas');
        }

        return redirect()->route('posts.muro',auth()->user()->username);
    }
}
