<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\IsOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('perfil.index');
    }

    public function store(Request $request){

        $this->validate($request,[
            'username' => ['required','min:3','max:30','unique:users,username'],
            'email' => [
            'email',
            Rule::unique('users')->ignore(auth()->id(), 'id')
            ],
            'old_password' => [new IsOldPassword],
        ]);

        if($request->imagen){
            //guarda la imagen en el servidor
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid().".".$imagen->extension();
            // las clase Image:: es la clase de intervention image instalada
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagenpath = public_path('perfiles').'/'.$nombreImagen;
            $imagenServidor->save($imagenpath);
        }


        //guarada la info en la bd
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password = Str::of($request->password)->isEmpty() ? auth()->user()->password : Hash::make($request->password);
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->save();

        return redirect()->route('posts.muro',$usuario->username);

    }
}
