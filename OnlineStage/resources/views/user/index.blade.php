@extends('layouts.layout')

@section('header')
    Mi Cuenta 
@stop

@section('content')
    <!-- si el user esta logeado -->
    @if (Auth::user())
        <!-- si el user esta logueado se mostraran sus datos -->
        <h4>Datos de la Cuenta</h4><br>
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
        <form class="" action="{{ route('user.update_user',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{$auth_user->name}}" style="border-radius:10px" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" value="{{$auth_user->email}}" style="border-radius:10px" disabled>
                </div>
            </div>
            <button class="btn btn-danger" hidden>Update</button>
        </form>

        <button class="btn btn-danger">Editar Cuenta</button><br>
        
        <!-- coches del usuario -->
        <br><h4>Todos mis coches</h4>
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- variable para controlar si el user ha añadido coches -->
            @php
                $have_cars=false;
            @endphp
            <!-- recorrer todos los coches -->
            @foreach ($coches as $coche)
                <!-- si el id del user coincide con el id_usuari de algun coche -->
                @if ($coche->id_usuari == $auth_user->id)
                    <!-- el user ha añadido coches -->
                    @php
                        $have_cars=true;
                    @endphp
                    <!-- informacion sobre el coche -->
                    {{ $coche->model}}<br>
                    {{ $coche->potencia}}hp<br>
                    {{ $coche->trenMotriu}}<br>
                    {{ $coche->pes}}<br>
                    {{ $coche->any}}<br>
                    <!-- categoria del coche -->
                    @foreach ($categorias as $categoria)
                        @if ( $coche->id_categoria == $categoria->id )
                            {{$categoria->nomCategoria}}<br>
                        @endif
                    @endforeach
                    <!-- fotos del coche -->
                    @foreach ($fotos_coches as $foto_coche)
                        @if ($foto_coche->id_cotxes == $coche->id)
                            @foreach ($fotos as $foto)
                                    @if($foto_coche->id_fotos == $foto->id)
                                    <img src="{{$foto->binari}}" alt="Foto coche" width="200" height="200"><br>
                                    @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
            <!-- si el user no ha añadido coches -->
            @if($have_cars == false)
            <div class="alert alert-danger">
                <p>No has añadido ningun coche</p>
            </div>
            @endif
        </div>
        <!-- añadir coche -->
        <!-- este boton abre el formulario para añadir coches -->
        <div class="p-6 bg-white border-b border-gray-200">    
            <button type="button" class="btn btn-danger">Añadir Coche</button>
        </div>
        <!-- formulario para añadir coches -->
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
            </div>
            @endif
            <!-- formulario para añadir coches -->
            <form class="" action="{{ route('user.add_car',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Imagenes</label>
                    <div class="col-sm-10">
                        <input type="file" name="fotos[]" multiple>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Modelo</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="modelo" placeholder="Peugeot 106 rally ...">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Potencia (hp)</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="potencia" placeholder="103 ...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Peso (kg)</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="peso" placeholder="890 ...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Año</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="año" placeholder="1996 ...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tren Motriz</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tren_motriz" style="border-radius:10px">>
                            <option value="FWD">FWD - Tracción Delantera</option>
                            <option value="RWD">RWD - Tracción Trasera</option>
                            <option value="4WD">4WD - Tracción Total</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Categoria</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_categoria" style="border-radius:10px">>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-danger" >Submit</button>

            </form>
        </div>
        <!-- tramos compartidos por el usuario -->
        <br><h4>Tramos compartidos</h4>
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- si el user ha añadido algun tramo -->
            @if (count($tramos)>0)
                @foreach ($tramos as $tramo)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- fotos del tramo -->
                        @foreach ($fotos_tramos as $foto_tramo)
                            @if ($foto_tramo->id_trams == $tramo->id)
                                @foreach ($fotos as $foto)
                                        @if($foto_tramo->id_fotos == $foto->id)
                                        <img src="{{$foto->binari}}" alt="Foto tramo" width="200" height="200"><br>
                                        @endif
                                @endforeach
                            @endif
                        @endforeach
                        <!-- información del tramo -->
                        {{ $tramo->nom}}<br>
                        {{ $tramo->distancia}}km<br>
                        {{ $tramo->sortida}}<br>
                        {{ $tramo->final}}<br>
                    </div>
                @endforeach
            @else
            <!-- si el user no ha compartido ningun tramo -->
            <div class="alert alert-danger">
                <p>No has añadido ningun tramo</p>
            </div>
            @endif
        </div>
    @endif
@stop