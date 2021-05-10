@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/rallys.css') }}" />

@section('header')
    Rallys
@stop

@section('content')

    <!-- control de errores de los formulario -->
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

    <!-- si el usuario esta logueado i es organizador o es admin puede añadir rallys -->
    @if (Auth::user())
        @if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
            <div class="p-6 bg-white border-b border-gray-200">    
                <button id="add_rally" type="button" class="btn btn-danger">Organizar Rally</button>
            </div>

            <!-- formulario para añadir rallys -->
            <div id="container_animacion" style="display:none;">

                <form id="form_add_rally" action="{{ route('rallys.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
                    @csrf
                    <a  id="esconder_form" style="cursor:pointer; " class="mt-3 float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Organizar Rally</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Imagenes</label>
                        <div class="col-sm-10">
                            <input type="file" name="fotos[]" multiple>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" placeholder="Nombre del Rally ...">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Distancia Total en km</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="distancia" name="distancia" placeholder="25 Km">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Numero Tramos Cronometrados</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="numTC" name="numTC" placeholder="8 ...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Numero de Assistencias</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="numAssistencies" name="numAssistencies" placeholder="3 ...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Localizacion</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="localitzacio" name="localitzacio" placeholder="Vilafranca ...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Numero de Plazas</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="numPlaces" name="numPlaces" placeholder="150 ...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Superficie</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_superficie" style="border-radius:10px">>
                                @foreach ($superficies as $superficie)
                                    <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Categorias de coches que pueden participar</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="categorias[]" style="border-radius:10px" multiple>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-danger" >Submit</button>

                </form>
            </div>
            
        @endif
    @endif

    @foreach ($rallys as $rally)

        @if (Auth::user())
            <!-- si eres admin o dueño del rally podra eliminar, editar etc... -->
            @if ($auth_user->rol == 'admin' || $auth_user->id == $rally->id_usuari)
                <!-- editar rally -->
                <a id="edit_rally:{{$rally->id}}" class="float-right pl-3 btn editButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
                <!-- eliminar rally -->
                <form id="delete_rally:{{$rally->id}}" class="float-right" style="color:red;" action="{{ route('rallys.destroy',['id' => $rally->id,'location' => 'rallys' ]) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                </form>

                
                <!-- formulario de edicion de rallys si eres el organizador del mismo -->
                <form id="form_edit_rally:{{$rally->id}}" action="{{ route('rally.update',['id' => $rally->id,'location' => 'rallys'] ) }}" method="POST" enctype="multipart/form-data" hidden>
                    @csrf
                    {{ method_field('PUT') }}

                    <a  id="esconder_form_edit:{{$rally->id}}" style="cursor:pointer; " class="mt-3 float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Editar Rally</label>
                    </div>
                    <div class="row">
                        <!-- fotografia del rally a editar -->
                        @foreach ($fotos_rallys as $foto_rally)
                            @if ($foto_rally->id_rallys == $rally->id)
                                @foreach ($fotos as $key => $foto)
                                    @if($foto_rally->id_fotos == $foto->id)
                                        <img class="mr-5" src="{{$foto->binari}}" alt="Foto tramo" width="200" height="200">
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div><br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Imagenes</label>
                        <div class="col-sm-10">
                            <input type="file" name="fotos[]" multiple>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" value="{{$rally->nom}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Distancia Total en km</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="distancia" name="distancia" value="{{$rally->distancia}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Numero Tramos Cronometrados</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="numTC" name="numTC" value="{{$rally->numTC}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Numero de Assistencias</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="numAssistencies" name="numAssistencies" value="{{$rally->numAssistencies}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Localizacion</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="localitzacio" name="localitzacio" value="{{$rally->localitzacio}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Numero de Plazas</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="numPlaces" name="numPlaces" value="{{$rally->numPlaces}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Superficie</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_superficie" style="border-radius:10px">>
                                @foreach ($superficies as $superficie)
                                    @if ($rally->id_superficie == $superficie->id)
                                        <option selected value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                    @else
                                        <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Categorias de coches que pueden participar</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="categorias[]" style="border-radius:10px" multiple>
                                @foreach ($categorias_rallys as $categoria_rally)
                                    @if ( $categoria_rally->id_rallys == $rally->id )
                                        @foreach ($categorias as $categoria)
                                            @if($categoria->id == $categoria_rally->id_categories)
                                                <option selected value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                            @else
                                                <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-danger" >Submit</button>

                </form>
            @endif
        @endif

        <!-- mostrar rallys -->
        <table id="rally:{{$rally->id}}" class="table table-hover">
            <tbody>
                <tr>
                    <th style="width: 30%; padding: 0;"rowspan="6" colspan="2">
                        <div id="controlsCarousel{{$rally->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
                            <div class="carousel-inner">
                            <!-- fotos del rally -->
                            @foreach ($fotos_rallys as $foto_rally)
                                @if ($foto_rally->id_rallys == $rally->id)
                                    @foreach ($fotos as $key => $foto)
                                        @if($foto_rally->id_fotos == $foto->id)
                                        <div class="carousel-item">
                                            <img src="{{ $foto->binari }}" class="d-block w-100" alt="...">
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#controlsCarousel{{$rally->id}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#controlsCarousel{{$rally->id}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th rowspan="2">{{ $rally->nom}}</th>
                </tr>
                <tr>
                <!-- usuario que ha organizado el rally -->
                @foreach ($users as $user)
                    @if ( $rally->id_usuari == $user->id )
                    <td>{{ $user->name}}</td>
                    @endif
                @endforeach
                </tr>
                <tr>
                    <th rowspan="2" colspan="1">{{ $rally->numTC}}-{{ $rally->numAssistencies}}</th>
                </tr>
                <tr>
                    <th>{{ $rally->distancia}}km</th>
                </tr>
                <tr>
                    <!-- informacion sobre la superficie del rally -->
                    @foreach ($superficies as $superficie)
                        @if ( $rally->id_superficie == $superficie->id )
                            <th>{{$superficie->tipus}}<th>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <th>{{$rally->localitzacio}}<th>    
                </tr>
                <tr>
                    <th>{{$rally->numPlaces}}<th>
                </tr>
                <tr>
                <!-- categorias que pueden correr este rally -->
                @foreach ($categorias_rallys as $categoria_rally)
                    @if ( $categoria_rally->id_rallys == $rally->id )
                        @foreach ($categorias as $categoria)
                            @if($categoria->id == $categoria_rally->id_categories)
                                <th>{{$categoria->nomCategoria}}<th> 
                            @endif
                        @endforeach
                    @endif
                @endforeach
                </tr>
            </tbody>
        </table><br>

        <!-- listado de participantes -->
        <div class="d-flex justify-content-center p-0 m-0">
            <div id="ver_listado:{{$rally->id}}">
                <div id="listadoParticipantes:{{$rally->id}}" class="p-6 Participantes" style="cursor:pointer;color:blue;">
                    <p>Ver listado de participantes</p>
                </div>
                <div id="lista:{{$rally->id}}" hidden>
                    <ul class="list-group">
                        <li id="participantes:{{$rally->id}}"class="list-group-item"  style="cursor:pointer;" hidden><b>Listado de Participantes:</b></li>

                        @php
                            $inscritos = false;
                        @endphp

                        @foreach ($inscritos_rallys as $inscrito_rally)

                            @if ($inscrito_rally->id_rallys == $rally->id)
                                
                                @foreach ($users as $user)
                                @foreach ($coches as $coche)
                                    @if ( $inscrito_rally->id_usuari == $user->id && $inscrito_rally->id_cotxe == $coche->id)
                                        <li class="list-group-item">{{$user->name}} <i class="fa fa-arrow-right"></i> {{$coche->model}}</li>
                                        @php
                                            $inscritos = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @endforeach

                            @endif

                        @endforeach

                        @if ($inscritos == false)
                            <li class="list-group-item">No hay inscritos</li>
                        @endif

                    </ul>                   
                </div>
            </div>
        </div>

        <!-- si el user esta logueado podrá incribirse al rally siempre que queden plazas... -->
        @if (Auth::user())

            @php
                $inscrit = false;
            @endphp

            @foreach($inscripciones as $inscripcion)
                @if($inscripcion->id_rallys == $rally->id &&  $inscripcion->id_usuari == $auth_user->id)
                    @php
                        $inscrit = true;
                    @endphp 
                @endif
            @endforeach

            <!-- falta inscribirse bro -->
            @if ($inscrit == false)
                <form action="{{ route('rally.signup',['id_user' => $auth_user->id,'id_rally' => $rally->id ] ) }}" method="GET" >
                    @csrf
                    <button class="btn btn-danger"><i class=""></i> Inscribirme</button>
                </form>
            @elseif($inscrit == true)
                <form action="{{ route('rally.quit',['id_user' => $auth_user->id,'id_rally' => $rally->id ] ) }}" method="POST" >
                    @csrf
                    <button class="btn btn-danger">DesInscribirme</button>
                </form>
            @endif
        @endif


    @endforeach

@stop

<script src="{{ url('/js/rallys.js') }}"></script>
