@extends('layout.app')

@section('titulo')
    Principal
@endsection


@section('contenido')
    @if ($posts->count())
        <x-listar-post :posts="$posts" />
    @else
        <h2>No hay posts</h2>
    @endif
@endsection
