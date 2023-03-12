<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        //modifica el request para validar que el usuairo no este repetido
        $request->request->add(['username' => Str::slug( $request->username)]);

        $this->validate($request,[
            'name' => 'required|max:30',
            'username' => 'required|unique:users|max:28',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //intenta autenticar el usuaio
        // Auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        //otra forma de autenticar el usuaio

        Auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.muro',auth()->user());
    }
}
