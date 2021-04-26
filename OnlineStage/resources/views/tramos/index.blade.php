@extends('layouts.layout')

@section('header')
    Tramos
@stop

@section('content')
    @if (Auth::user())
        <!-- si el usuario esta logueado o es admin puede añadir tramos, este boton abre un formulario -->
        <div class="p-6 bg-white border-b border-gray-200">    
            <button type="button" class="btn btn-danger">Compartir Tramo</button>
        </div>
        <div class="p-6 bg-white border-b border-gray-200" hidden>
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
            <form class="" action="{{ route('tramos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                @csrf
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
        </div><br>
        @endif
        <!-- mostrar listado de los tramos -->
        @foreach ($tramos as $tramo)
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- si el user esta logueado y es el dueño del tramo o tiene el rol de admin podra editar, eliminar... -->
                @if (Auth::user())
                    @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
                        <!-- editar tramo -->
                        <a class="float-right pl-3" style="color:blue;" href="">Editar</a>
                        <!-- formulario para editar tramos -->
                        <form class="" action="{{ route('tramos.update',['id' => $tramo->id] ) }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Editar Tramo</label>
                            </div>
                            <!-- fotografia del tramo a editar -->
                            @foreach ($fotos_tramos as $foto_tramo)
                                @if ($foto_tramo->id_trams == $tramo->id)
                                    @foreach ($fotos as $foto)
                                            @if($foto_tramo->id_fotos == $foto->id)
                                                <img src="{{$foto->binari}}" alt="Foto tramo" width="200" height="200"><br>
                                            @endif
                                    @endforeach
                                @endif
                            @endforeach
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
                        
                        <!-- eliminar tramo -->
                        <form class="float-right" style="color:red;" action="{{ route('tramos.destroy',['id' => $tramo->id]) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button>Eliminar</button>
                        </form>
                    @endif
                @endif
                <!-- fotografia del tramo -->
                @foreach ($fotos_tramos as $foto_tramo)
                    @if ($foto_tramo->id_trams == $tramo->id)
                        @foreach ($fotos as $foto)
                                @if($foto_tramo->id_fotos == $foto->id)
                                    <img src="{{$foto->binari}}" alt="Foto tramo" width="200" height="200"><br>
                                @endif
                        @endforeach
                    @endif
                @endforeach
                <!-- informacion sobre el tramo -->
                {{ $tramo->nom}}<br>
                {{ $tramo->distancia}}km<br>
                {{ $tramo->sortida}}<br>
                {{ $tramo->final}}<br>
                <!-- informacion sobre la superficie del tramo -->
                @foreach ($superficies as $superficie)
                    @if ( $tramo->id_superficie == $superficie->id )
                        {{$superficie->tipus}}<br>
                    @endif
                @endforeach
                <!-- usuario que ha compartido el tramo -->
                @foreach ($users as $user)
                    @if ( $tramo->id_usuari == $user->id )
                        {{$user->name}}<br>
                    @endif
                @endforeach
                
            </div> 
        @endforeach
    </div>

@stop