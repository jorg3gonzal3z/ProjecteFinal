@extends('layouts.layout')

@section('header')
    Eventos
@stop

@section('content')
    <div class="p-6 bg-white border-b border-gray-200"> 
        @foreach ($eventos as $evento)
            <div class="p-6 bg-white border border-gray-200">
                <!-- fotografia del evento -->
                <img src="{{$evento->logo}}" alt="Foto evento" width="200" height="200"><br>               
                <!-- informacion sobre el tramo -->
                {{ $evento->nom}}<br>
                {{ $evento->tipus}}<br>
                {{ $evento->numPlaces}}<br>
                {{ $evento->localitzacio}}<br>
                <!-- usuario que ha organizado el evento -->
                @foreach ($users as $user)
                    @if ( $evento->id_usuari == $user->id )
                        {{$user->name}}<br>
                    @endif
                @endforeach
            
            <!-- si el user esta logueado podrá incribirse al evento siempre que queden plazas... -->
            @if (Auth::user())
            <div class="p-6">    
                <button type="button" class="btn btn-danger">Inscribirme</button>
            </div>
            @endif
            </div>
        @endforeach
    </div>
@stop