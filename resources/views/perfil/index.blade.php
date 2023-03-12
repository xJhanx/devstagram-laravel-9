@extends('layout.app')

@section('titulo')
    Perfil {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" enctype="multipart/form-data" method="POST">
                @csrf
                <div>
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de usuario</label>
                    <input type="text" name="username" id="username" placeholder="Ingrese su username"
                        class="border p-3 w-full rounded-lg @error('username')border-red-500 @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo electronico</label>
                    <input type="text" name="email" id="email" placeholder="Ingrese su correo"
                        class="border p-3 w-full rounded-lg @error('email')border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex">
                    <label for="old_password" class="mb-2  block uppercase text-gray-500 font-bold">Desea cambiar su
                        contraseña ?</label>
                    <input class="ml-3" type="checkbox" name="change_password" id="change_password" {{ old('change_password') == "on" ? 'checked' : ''}}>

                </div>
                <div id="form_change_password" class="hidden">

                    <div>
                        <label for="old_password" class="mb-2 block uppercase text-gray-500 font-bold">Escria su antigua
                            contraseña</label>
                        <input type="text" name="old_password" id="old_password"
                            class="border p-3 w-full rounded-lg @error('email')border-red-500 @enderror">

                        @if (session('err_password'))
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                                {{ session('err_password') }}
                            </p>
                        @endif

                        @error('old_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                            {{ $message }}
                        </p>
                    @enderror

                    </div>

                    <div>
                        <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Escria su nueva
                            contraseña</label>
                        <input type="text" name="password" id="password"
                            class="border p-3 w-full rounded-lg @error('email')border-red-500 @enderror">
                        @error('password')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-container">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>



                <div>
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen del perfil </label>
                    <input type="file" name="imagen" id="imagen"
                        class="border p-3 w-full rounded-lg @error('imagen')border-red-500 @enderror"
                        accept=".jpg,.jpeg,.png">
                </div>

                <input type="submit" value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
        text-white font-bold w-full uppercase p-3 rounded-lg mt-10">
            </form>

        </div>
    </div>
@endsection
