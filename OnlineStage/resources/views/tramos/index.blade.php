@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('header')
    Tramos
@stop

@section('content')
    @if (Auth::user())
        <!-- si el usuario esta logueado o es admin puede añadir tramos, este boton abre un formulario -->
        <div class="p-6 bg-white border-b border-gray-200">    
            <button id="add_tramo" type="button" class="btn btn-danger">Compartir Tramo</button>
        </div>
        <div class="p-6 bg-white border-b border-gray-200" >
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
            <!-- formulario para añadir tramos -->
            <form id="form_add_tramo" action="{{ route('tramos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
                @csrf
                <a  id="esconder_form" style="color:red; cursor:pointer; " class="float-right pl-3" hidden >X</a><br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Añadir Tramo</label>
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
                    <input type="text" class="form-control" name="nom" placeholder="Nombre del Tramo ...">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Distancia km</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="distancia" placeholder="25 ...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Salida</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="sortida" placeholder="La Bisbal del Penedès ...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Final</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="final" placeholder="El Vendrell ...">
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

                <button class="btn btn-danger" >Submit</button>

            </form>
        </div>
    @endif
    <div class="p-6 bg-white border-b border-gray-200"> 
        <!-- mostrar listado de los tramos -->
        @foreach ($tramos as $tramo)
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- si el user esta logueado y es el dueño del tramo o tiene el rol de admin podra editar, eliminar... -->
                @if (Auth::user())
                    @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
                        <!-- editar tramo -->
                        <a id="edit_tramo{{$tramo->id}}" class="float-right pl-3 editButton" style="color:blue; cursor:pointer;" >Editar</a>
                        <!-- eliminar tramo -->
                        <form id="delete_tramo{{$tramo->id}}" class="float-right " style="color:red;" action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'tramos' ]) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button>Eliminar</button>
                        </form>
                    @endif
                @endif


                <table class="table table-hover ">
                <tbody>
                    <tr>
                        <th style="width: 30%; padding: 0;"rowspan="6" colspan="2">
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
                        <th rowspan="2" colspan="1">{{ $tramo->sortida}}-{{ $tramo->final}}</th>
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
                </table><br>
                
                <!-- formulario para editar tramos -->
                <form id="form_edit_tramo{{$tramo->id}}" action="{{ route('tramos.update',[ 'id' => $tramo->id,'location' => 'tramos' ] ) }}" method="POST" enctype="multipart/form-data" hidden>
                    @csrf
                    {{ method_field('PUT') }}
                    <a  id="esconder_form_edit{{$tramo->id}}" style="color:red; cursor:pointer; " class="float-right pl-3" hidden >X</a><br>
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
        @endforeach
        <div id='map' style='width: 800px; height: 500px;'></div>

        <div class="mt-2">
            SALIDA: <span readonly id="salidamapa"></span><br>
            FINAL: <span readonly id="finalmapa"></span>
            <pre id="coordinates" class="coordinates"></pre>

        </div>
    </div>


@stop

<script src="{{ url('/js/tramos.js') }}"></script>
<script src="{{ url('/js/mapbox.js') }}"></script>
