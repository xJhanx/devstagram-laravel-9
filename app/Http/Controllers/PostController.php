<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }

    public function index(User $user){

        $posts = Post::where('user_id', $user->id)->latest()->paginate(6);
        return view('dashboard',compact(['user','posts']));
    }

    public function create(){
        return view("posts.create");
    }

    public function store(Request $request){
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id,
        // ]);

        //forma de guardar informacion mediante una relacion
        auth()->user()->post()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route("posts.muro",auth()->user()->username);
    }

    public function show(User $user,Post $post){
        return view('posts.show',compact(['post','user']));
    }

    public function destroy(Post $post){


        $this->authorize('delete',$post);
        $post->delete();

        $img_delete = public_path('uploads/'.$post->imagen);

        if(File::exists($img_delete)){
            unlink($img_delete);

        }

        return redirect()->route('posts.muro',auth()->user()->username);
    }
}

