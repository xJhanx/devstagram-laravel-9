@extends('layout.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">

        <div class="md:w-1/2">
            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del post {{ $post->titulo }}">

            <div class="p-3 flex items-center gap-4 ">
            @auth
            <livewire:like-post  :post="$post" />
            {{-- ESTE CODIGO ES LA FORMA EN LA QUE SE UTILIZA LARAVEL NORMAL SIN LIVEWIRE  --}}
            {{-- @if ($post->checkLike(auth()->user()))
            <form action="{{route('posts.likes.destroy',$post)}}" method="POST">
                @csrf
                @method('DELETE')

            </form>
            @else
            <form action="{{route('posts.likes.store',$post)}}" method="POST">
                @csrf
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                      </svg>
                </button>
            </form>
            @endif --}}

                @endauth
                {{-- Se movio al componente de live wire --}}
                {{-- <p class="font-bold ">{{$post->likes()->count()}} <span class="font-normal"> likes </span> </p> --}}
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="my-5 ">{{ $post->descripcion }}</p>
            </div>
            @auth
            @if($post->user->id == auth()->user()->id)
                <form action="{{route('posts.destroy',$post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="bg-red-500 hover:bg-600 p-2 rounded text-white font-bold mt-5 cursor-pointer" type="submit"
                        value="Eliminar publicación">
                </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            <p class="">{{ session('mensaje') }}</p>
                        </div>
                    @endif

                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">comentario</label>

                            <textarea name="comentario" id="comentario" type="text" placeholder="comentario de la publicacion "
                                class="border p-3 w-full rounded-lg @error('comentario')border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <input type="submit" value="Publicar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    text-white font-bold w-full uppercase p-3 rounded-lg mt-10">
                    </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">

                    @if ($post->comentarios->count() > 0)
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b ">
                                <a href="{{ route('posts.muro', $comentario->user) }}"
                                    class="font-bold">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p>{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios aún.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
