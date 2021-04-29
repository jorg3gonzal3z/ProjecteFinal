@extends('layouts.layout')

@section('header')
    Eventos
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/eventos.css') }}" />

    <div class="p-6 bg-white border-b border-gray-200"> 
        <div class="l-containerlol row">
            @foreach ($eventos as $evento)
                <div class="col-6 col-md-4 col-lg-3 ">
                    <!-- fotografia del evento -->
                    <div class="b-game-card">
                        <div class="b-game-card__cover" style="background-image: url({{ $evento->logo }});"></div>
                    </div>
                    <!-- informacion sobre el tramo -->
                    <table class="mt-3 table table-hover ">
                        <tbody>
                            <tr>
                                <th>
                                {{ $evento->nom}}
                                </th>
                            </tr>
                            <tr>
                                <th>
                                {{ $evento->tipus}}
                                </th>
                            </tr>
                            <tr>
                                <th>
                                {{ $evento->numPlaces}}
                                </th>
                            </tr>
                            <tr>
                                <th>
                                {{ $evento->localitzacio}}
                                </th>
                            </tr>
                            <tr>
                                <th>
                                @foreach ($users as $user)
                                    @if ( $evento->id_usuari == $user->id )
                                        {{$user->name}}<br>
                                    @endif
                                @endforeach
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <!-- usuario que ha organizado el evento -->

                
                <!-- si el user esta logueado podrá incribirse al evento siempre que queden plazas... -->
                @if (Auth::user())
                <div class="p-6">    
                    <button type="button" class="btn btn-danger">Inscribirme</button>
                </div>
                @endif
                </div>
            @endforeach
        </div>
        
    </div>
@stop