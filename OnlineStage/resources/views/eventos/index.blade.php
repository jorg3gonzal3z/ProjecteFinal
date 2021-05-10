@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('header')
    Eventos
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/eventos.css') }}" />

    <!-- control de errores del formulario -->
    @if (count($errors) > 0)
    <div class="p-6 bg-white border-b border-gray-200"> 
        <div class="alert alert-danger">
            <p>Corrige los siguientes errores:</p>
            <br>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    @if (Auth::user())
        <!-- si el usuario esta logueado i es organizador o es admin puede añadir eventos, este boton abre un formulario -->
        @if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
        <div class="p-6 bg-white border-b border-gray-200">    
            <button id="add_event" type="button" class="btn btn-danger">Añadir Evento</button>
        </div>
    
        <div class="p-6 bg-white border-b border-gray-200"> 

            <!-- formulario para añadir eventos -->
            <form id="form_add_event" action="{{ route('eventos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
                @csrf
                <a  id="esconder_form" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Añadir Evento</label>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cartel</label>
                    <div class="col-sm-10">
                        <input type="file" name="logo">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom" placeholder="Nombre del Evento ...">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipo de Evento</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="tipus" placeholder="Fira del automovil ...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Numero de plazas</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="numPlaces" placeholder="200 ...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Localizacion</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="localitzacio" placeholder="El Vendrell ...">
                    </div>
                </div>

                <button class="btn btn-danger" >Submit</button>

            </form>

        </div>
        @endif
    @endif


    <!-- div para mostrar los eventos -->
    <div class="p-6"> 
        <div class="row">
            @foreach ($eventos as $evento)
                <div class="col-6 col-md-4 col-lg-3 ">
                    @if (Auth::user())
                        @if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
                            @if ($auth_user->rol == 'admin' || $auth_user->id == $evento->id_usuari)
                            
                            <!-- editar evento -->
                            <a id="edit_evento:{{$evento->id}}" class="float-right pr-3 editButton btn" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
                            <!-- eliminar evento -->
                            <form id="delete_evento:{{$evento->id}}" class="float-right btn btn-danger" action="{{ route('eventos.destroy',['id' => $evento->id,'location' => 'eventos' ]) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                            </form><br><br>
                            
                            @endif

                            <!-- formulario para editar eventos -->
                            <form id="form_edit_evento:{{$evento->id}}" action="{{ route('eventos.update',['id' => $evento->id,'location' => 'eventos' ] ) }}" method="POST" enctype="multipart/form-data" hidden>
                                @csrf
                                {{ method_field('PUT') }}
                                <a  id="esconder_form_edit:{{$evento->id}}" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Editar Evento</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Cartel</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="logo">
                                    </div>
                                </div>

                                <input name="old_logo" value="{{$evento->logo}}" hidden></input>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom" value="{{$evento->nom}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tipo de Evento</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tipus" value="{{$evento->tipus}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Numero de plazas</label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control" name="numPlaces" value="{{$evento->numPlaces}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Localizacion</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="localitzacio" value="{{$evento->localitzacio}}">
                                    </div>
                                </div>

                                <button class="btn btn-danger" >Submit</button>

                            </form>

                        @endif
                    @endif

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
                            <!-- usuario que ha organizado el evento -->
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
                    
                <!-- listado de participantes -->
                <div class="d-flex justify-content-center p-0 m-0">
                    <div id="listadoParticipantes:{{$evento->id}}" class="p-6 Participantes" style="cursor:pointer;color:blue;">
                        <p>Ver listado de participantes</p>
                    </div>
                    <div id="lista:{{$evento->id}}" hidden>
                        <ul class="list-group">
                            <li id="participantes:{{$evento->id}}"class="list-group-item"  style="cursor:pointer;" hidden><b>Listado de Participantes:</b></li>

                            @php
                                $inscritos = false;
                            @endphp

                            @foreach ($inscritos_eventos as $inscrito_evento)

                                @if ($inscrito_evento->id_events == $evento->id)
                                    
                                    @foreach ($users as $user)
                                        @if ( $inscrito_evento->id_usuari == $user->id )
                                            <li class="list-group-item">{{$user->name}}</li>
                                            @php
                                                $inscritos = true;
                                            @endphp
                                        @endif
                                    @endforeach

                                @endif

                            @endforeach

                            @if ($inscritos == false)
                                <li class="list-group-item">No hay inscritos</li>
                            @endif

                        </ul>                   
                    </div>
                </div>

                <!-- si el user esta logueado podrá incribirse al evento siempre que queden plazas... -->
                @if (Auth::user())

                    @php
                        $inscrit = false;
                    @endphp

                    @foreach($inscripciones as $inscripcion)
                        @if($inscripcion->id_events == $evento->id &&  $inscripcion->id_usuari == $auth_user->id)
                            @php
                                $inscrit = true;
                            @endphp 
                        @endif
                    @endforeach

                    @if ($inscrit == false)
                        <div class="p-6 d-flex justify-content-center">
                        <form action="{{ route('evento.signup',['id_user' => $auth_user->id,'id_event' => $evento->id ] ) }}" method="POST" >
                            @csrf 
                            <button class="btn btn-danger">Inscribirme</button>
                        </form>
                        </div>
                    @elseif ($inscrit == true)
                        <div class="p-6 d-flex justify-content-center">
                        <form action="{{ route('evento.quit',['id_user' => $auth_user->id,'id_event' => $evento->id ] ) }}" method="POST" >
                            @csrf
                            <button class="btn btn-danger">DesInscribirme</button>
                        </form>
                        </div>
                    @endif

                @endif
                </div>
            @endforeach
        </div>
    </div>
@stop
<script src="{{ url('/js/eventos.js') }}"></script>