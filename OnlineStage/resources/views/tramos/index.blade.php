@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/mapbox.css') }}" /> 

@section('header')
    Tramos
@stop

@section('content')
    @if (Auth::user())
        <!-- si el usuario esta logueado o es admin puede añadir tramos, este boton abre un formulario -->
        <div class="p-6 bg-dark border-b border-red-500 text-center">    
            <button id="add_tramo" type="button" class="btn btn-danger">Compartir Tramo</button>
        </div>

        <div id="containerErrorsAdd" class="bg-dark" >
            <!-- control de errores del formulario -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <p>Corrige los siguientes errores:</p>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div id="container_animacion" class="p-6 d-flex" style="display:none;">

      
            <div id='map' class="col-12 col-md-6" style='' hidden></div>" 

            <!-- formulario para añadir tramos -->
            
            <form id="form_add_tramo" class="text-danger col-12 col-md-6" saction="{{ route('tramos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
                @csrf
                <a id="esconder_form" style="cursor:pointer;" class="float-right mt-3 mr-3 text-danger" hidden ><i class="fa fa-caret-up fa-2x"></i></a>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Añadir Tramo</label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Imagenes</label>
                    <div class="col-sm-10">
                        <input type="file" name="fotos[]" multiple>
                    </div>
                </div>

                <div class="form-group">
                    <label class="">Nombre</label>
                    <input type="text" class="form-control" name="nom" placeholder="Nombre del Tramo ...">
                    <small id="nombreHelp" class="form-text text-muted">Describe el tramo en unas pocas palabras.</small>
                </div>
                
                <div class="form-group " >
                    <label class="col-sm-2 col-form-label">Distancia km</label>
                    <div class="col-sm-10">
                        <input readonly class="form-control" id="distancia" name="distancia" placeholder="25 Km">
                    </div>
                </div>

                <div class="form-group" hidden>
                    <label class="col-sm-2 col-form-label">Salida</label>
                    <div class="col-sm-10">
                    <input readonly type="text" class="form-control" id="sortida" name="sortida" placeholder="La Bisbal del Penedès ...">
                    </div>
                </div>

                <div class="form-group" hidden>
                    <label class="col-sm-2 col-form-label">Final</label>
                    <div class="col-sm-10">
                    <input readonly type="text" class="form-control" id="final" name="final" placeholder="El Vendrell ...">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Trayecto</label>
                    <div class="col-sm-10">
                    <input readonly type="text" class="form-control" id="adressa" name="adressa">
                    </div>
                </div>

                <div class="form-group">
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Superficie</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_superficie" style="border-radius:10px">>
                            @foreach ($superficies as $superficie)
                                <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-danger" >Submit</button>

            </form>
        </div>
    @endif
    <!-- mostrar listado de los tramos -->
    <div class="d-md-flex">
        @foreach ($tramos as $tramo)
            <div class="tramoContainer text-danger border-b border-red-500 col-12 col-md-6 p-6">
                <!-- si el user esta logueado y es el dueño del tramo o tiene el rol de admin podra editar, eliminar... -->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab{{$tramo->id}}" role="tablist">
                        <style>.nav-link{color: white;}.nav-link.active{background-color: #DC3545 !important;color: white !important;}.nav-link:hover{color:white;}</style>
                        <a class="nav-item nav-link active" id="nav-home-tab{{$tramo->id}}" data-toggle="tab" href="#nav-fotos{{$tramo->id}}" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-picture-o" aria-hidden="true"></i>  Fotos</a>
                        <a class="nav-item nav-link" id="nav-profile-tab{{$tramo->id}}" data-toggle="tab" href="#nav-info{{$tramo->id}}" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-info-circle" aria-hidden="true"></i>  Info</a>
                        @if (Auth::user())
                            @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
                                <!-- editar tramo -->
                                <a id="edit_tramo:{{$tramo->id}}" class="nav-item nav-link text-danger bg-white editButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
                                <!-- eliminar tramo -->
                                <form id="delete_tramo:{{$tramo->id}}" class="nav-item nav-link bg-danger " style="color:red;" action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'tramos' ]) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="text-white"><i class="fa fa-trash-o"></i> Eliminar</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </nav>
                <div  id="tramo:{{$tramo->id}}" class="tab-content text-danger" id="nav-tabContent{{$tramo->id}}">
                    <div class="tab-pane fade show active" id="nav-fotos{{$tramo->id}}" role="tabpanel" aria-labelledby="nav-fotos-tab">
                        <div id="controlsCarousel{{$tramo->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
                                    <div class="carousel-inner">
                                    <!-- fotos del tramo -->
                                    @foreach ($fotos_tramos as $foto_tramo)
                                        @if ($foto_tramo->id_trams == $tramo->id)
                                        
                                            @foreach ($fotos as $key => $foto)
                                                @if($foto_tramo->id_fotos == $foto->id)
                                                <div class="carousel-item">
                                                    <img src="{{ $foto->binari }}" class="d-block w-100" alt="...">
                                                </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#controlsCarousel{{$tramo->id}}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#controlsCarousel{{$tramo->id}}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                        </div>
                    <div class="tab-pane fade " id="nav-info{{$tramo->id}}" role="tabpanel" aria-labelledby="nav-info-tab">
                            <table class="table text-danger table-hover ">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%; padding: 0;"rowspan="6" colspan="2">
                                            
                                        </th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">{{ $tramo->nom}}</th>
                                    </tr>
                                    <tr>
                                    <!-- usuario que ha compartido el tramo -->
                                    @foreach ($users as $user)
                                        @if ( $tramo->id_usuari == $user->id )
                                        <td>{{ $user->name}}</td>
                                        @endif
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <th rowspan="2" colspan="1">{{$tramo->adressa}}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ $tramo->distancia}}km</th>
                                    </tr>
                                    <tr>
                                        <!-- informacion sobre la superficie del tramo -->
                                        @foreach ($superficies as $superficie)
                                            @if ( $tramo->id_superficie == $superficie->id )
                                                <th>{{$superficie->tipus}}<th>
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                        </table>   
                    </div>
                </div>
            
                <div id="container_edit:{{$tramo->id}}" style="display:none;">
                    <!-- formulario para editar tramos -->
                    <form id="form_edit_tramo:{{$tramo->id}}" action="{{ route('tramos.update',[ 'id' => $tramo->id,'location' => 'tramos' ] ) }}" method="POST" enctype="multipart/form-data" hidden>
                        @csrf
                        {{ method_field('PUT') }}
                        <a  id="esconder_form_edit:{{$tramo->id}}" style="cursor:pointer; " class="float-right pl-3" hidden >Volver <i class="fa fa-caret-up fa-2x"></i></a>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Editar Tramo</label>
                        </div>
                        <div class="row">
                        <!-- fotografia del tramo a editar -->
                        @foreach ($fotos_tramos as $foto_tramo)
                            @if ($foto_tramo->id_trams == $tramo->id)
                                @foreach ($fotos as $foto)
                                        @if($foto_tramo->id_fotos == $foto->id)
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
                            <input type="text" class="form-control" name="nom" value="{{$tramo->nom}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Distancia km</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="distancia" value="{{$tramo->distancia}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Salida</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="sortida" value="{{$tramo->sortida}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Final</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="final" value="{{$tramo->final}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Superficie</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_superficie" style="border-radius:10px">>
                                    @foreach ($superficies as $superficie)
                                        @if ($tramo->id_superficie == $superficie->id)
                                            <option selected value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                        @else
                                            <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-danger" >Update</button>

                    </form>
                </div>
            </div> 
        @endforeach
    </div>
@stop
<script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<script src="{{ url('/js/tramos.js') }}"></script>
<script src="{{ url('/js/mapbox.js') }}"></script>
