@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/eventos.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/user.css') }}" />

    <!-- control de errores del formulario -->
    @if (count($errors) > 0)
        <div class="p-6 border-b border-gray-200">
            <div class="alert alert-danger">
                <p>Corrige los siguientes errores:</p>
                <br>
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        </div><br>
        @endif

    <!-- si el user esta logeado -->
    @if (Auth::user())

        <div class="d-flex flex-wrap">    
            <div class="p-3 col-12 col-lg-6">@include('user.components.edit_cuenta')</div>
            <div class="p-3 col-12 col-lg-6">@include('user.components.inscripciones')</div>
        </div>

        @include('user.components.coche.coches')
        
        @include('user.components.tramos.tramos')



        @if ($auth_user->rol == 'organitzador')
            
            @include('user.components.eventos.eventos')

            @include('user.components.rallys.rallys')
            
        @endif

    @endif
@stop
<script src="{{ url('/js/user.js') }}"></script>
