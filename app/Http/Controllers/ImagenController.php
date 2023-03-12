<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid().".".$imagen->extension();
        // las clase Image:: es la clase de intervention image instalada
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000,1000);

        $imagenpath = public_path('uploads').'/'.$nombreImagen;
        $imagenServidor->save($imagenpath);
        return response()->json(['file' => $nombreImagen]);
    }
}
