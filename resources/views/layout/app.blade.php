<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>devpstagram- @yield('titulo')</title>
    @stack('styles')

    <link rel="stylesheet" href="{{asset('build/assets/app-dc102b5a.css')}}">

    {{-- @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/Perfil//index.js') --}}

    @livewireStyles
</head>

<body class="antialiased bg-gray-100">

    <header class="p-5 border-b bg-white shadow">
        <div class="container flex items-center justify-between">
            <a href="{{route('home')}}">
                <h1 class="text-3xl font-black">DevsTagram</h1>
            </a>
            <nav class="flex gap-2 items-center">

                @guest
                    <a class="font-bold uppercase tex-gray--600" href="{{ route('login') }}">Login </a>
                    <a class="font-bold uppercase tex-gray--600" href="{{ route('register') }}">Crear cuenta</a>
                @endguest

                @auth
                    <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                        Crear

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                          </svg>

                    </a>

                    <a class="font-bold uppercase tex-gray--500" href="{{route('posts.muro',auth()->user()->username)}}">Hola: <span class="font-normal">
                            {{ auth()->user()->name }} </span></a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase tex-gray--600" href="{{ route('logout') }}">Cerrar
                            session </button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-bold text-center text-3xl mt-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="text-center text-gray-500 p-5 font-bold uppercase ">
        Devpstagrant todos los derechos reservados {{ now()->year }}
    </footer>
    @livewireScripts
    <script src="{{asset('build/assets/app-3c5a9e80.js')}}"></script>
    <script src="{{asset('build/assets/index-ff7441ff.js')}}"></script>
</body>

</html>
