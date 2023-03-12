@extends('layout.app')

@section('titulo')
    Inicia session en devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset('imgs/login.jpg')}}" alt="Imagen logn de usuarios" srcset="">
        </div>
        <div class="md:w-4/12 ">
            <form action="{{route('login')}}" method="POST">
                @csrf

                @if(session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                    {{session('mensaje')}}
                </p>
                @endif

                <div>
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="text"
                    name="email"
                    id="email"
                    type="email"
                    placeholder="tu correo electronico"
                    value="{{old('email')}}"
                    class="border p-3 w-full rounded-lg @error('email')border-red-500 @enderror">
                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="text"
                    name="password"
                    id="password"
                    type="password"
                    placeholder="Password de registro"
                    class="border p-3 w-full rounded-lg @error('password')border-red-500 @enderror">
                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                    Mantener    mi session abierta
                    </label>
                </div>

                <input type="submit" value="Iniciar session" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                text-white font-bold w-full uppercase p-3 rounded-lg mt-10">
            </form>
        </div>
    </div>
@endsection
