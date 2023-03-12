@extends('layout.app')

@section('titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl md:mt-0 ">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>

                    <input type="text" name="titulo" id="titulo" type="text" placeholder="Titulo de la publicacion "
                        class="border p-3 w-full rounded-lg @error('titulo')border-red-500 @enderror"
                        value="{{ old('titulo') }}">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>

                    <textarea name="descripcion" id="descripcion" type="text" placeholder="descripcion de la publicacion "
                        class="border p-3 w-full rounded-lg @error('descripcion')border-red-500 @enderror">
                        {{ old('descripcion') }}
                </textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">

                    <input type="hidden" name="imagen" id="imagen" value="{{old('imagen')}}">
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <input type="submit" value="Publicar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                text-white font-bold w-full uppercase p-3 rounded-lg mt-10">
            </form>
        </div>
    </div>
@endsection
