@extends('layout.app')

@section('titulo')
    Registrate en devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset('imgs/registrar.jpg')}}" alt="Imagen registro de usuarios" srcset="">
        </div>
        <div class="md:w-4/12 ">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">nombre</label>

                    <input type="text"
                    name="name"
                    id="name"
                    type="text"
                    placeholder="Tu nombre"
                    class="border p-3 w-full rounded-lg @error('name')border-red-500 @enderror"
                    value="{{old('name')}}">
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Usuario</label>
                    <input type="text"
                    name="username"
                    id="username"
                    type="text"
                    placeholder="tu nonmbre de usuario"
                    value="{{old('username')}}"
                    class="border p-3 w-full rounded-lg @error('username')border-red-500 @enderror">

                    @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                        {{$message}}
                    </p>
                    @enderror

                </div>

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
                    <input 
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
                <div>
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir assword</label>
                    <input type="text"
                    name="password_confirmation"
                    id="password_confirmation"
                    type="password"
                    placeholder="Repite tu Password"
                    class="border p-3 w-full rounded-lg @error('password_confirmation')border-red-500 @enderror">

                    @error('password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                text-white font-bold w-full uppercase p-3 rounded-lg mt-10">
            </form>
        </div>
    </div>
@endsection
