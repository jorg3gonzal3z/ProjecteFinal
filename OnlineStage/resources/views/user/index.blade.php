@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('header')
    Mi Cuenta 
@stop

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/eventos.css') }}" />

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
        <!-- formulario edicion de cuenta usuario -->
        
        <form class="" action="{{ route('user.update_user',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <a  id="esconder_form" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></i></a><br><br>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input id="name_user" type="text" name="name" value="{{$auth_user->name}}" style="border-radius:10px" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input id="email_user" type="email" name="email" value="{{$auth_user->email}}" style="border-radius:10px" disabled>
                </div>
            </div>
            <!-- solo se muestra si el usuario decide editar la cuenta -->
            <div class="form-group row" id="pass_user" hidden>
                <label class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" name="pass" style="border-radius:10px" placeholder="12345678CR ...">
                </div>
            </div>
            <div class="form-group row" id="rpass_user" hidden>
                <label class="col-sm-2 col-form-label">Repite la Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" name="rpass" style="border-radius:10px" placeholder="12345678CR ...">
                </div>
            </div>
            <button id="update_cuenta" class="btn btn-danger" hidden>Update</button>
        </form>

        <button id="editar_cuenta" class="btn btn-danger">Editar Cuenta</button><br>
        
        <!-- coches del usuario -->
        <a data-toggle="collapse" href="#collapseCars" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseCars">
            <br><div class="d-flex justify-content-between"><h4>Todos mis Coches</h4><i class="fa fa-caret-down fa-2x"></i></div>
        </a>

        <div class="p-6 bg-white border-b border-gray-200">
            <!-- variable para controlar si el user ha añadido coches -->
            @php
                $have_cars=false;
            @endphp
            <div class="collapse" id="collapseCars">
            <!-- recorrer todos los coches -->
            @foreach ($coches as $coche)
                <!-- si el id del user coincide con el id_usuari de algun coche -->
                @if ($coche->id_usuari == $auth_user->id)
                    <!-- el user ha añadido coches -->
                    @php
                        $have_cars=true;
                    @endphp

                    <!-- editar coche -->
                    <a id="edit_coche{{$coche->id}}" class="btn float-right pl-3 editCarButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
                    <!-- eliminar coche -->
                    <form id="delete_coche{{$coche->id}}" class="float-right " action="{{ route('user.destroy_car',['id' => $coche->id]) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                    </form>

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
                    <div class="row">
                    @foreach ($fotos_coches as $foto_coche)
                        @if ($foto_coche->id_cotxes == $coche->id)
                            @foreach ($fotos as $foto)
                                    @if($foto_coche->id_fotos == $foto->id)
                                    <img class="mr-5" src="{{$foto->binari}}" alt="Foto coche" width="200" height="200"><br><br>
                                    @endif
                            @endforeach
                        @endif
                    @endforeach
                    </div><br>

                    <!-- formulario para editar coches -->
        
                    <form id="car_form_edit{{$coche->id}}" action="{{ route('user.update_car',['id' => $coche->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="row">
                        <!-- fotografia del coche a editar -->
                        @foreach ($fotos_coches as $foto_coche)
                            @if ($foto_coche->id_cotxes == $coche->id)
                                @foreach ($fotos as $foto)
                                        @if($foto_coche->id_fotos == $foto->id)
                                        <img class="mr-5" src="{{$foto->binari}}" alt="Foto coche" width="200" height="200"><br><br>
                                        @endif
                                @endforeach
                            @endif
                        @endforeach
                        </div><br>

                        <a  id="esconder_form_edit_coche{{$coche->id}}" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Imagenes</label>
                            <div class="col-sm-10">
                                <input type="file" name="fotos[]" multiple>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="modelo" value="{{$coche->model}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Potencia (hp)</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="potencia"  value="{{$coche->potencia}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Peso (kg)</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="peso"  value="{{$coche->pes}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Año</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="año"  value="{{$coche->any}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tren Motriz</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tren_motriz" style="border-radius:10px">
                                    @if ($coche->trenMotriu == "FWD")
                                    <option value="FWD" selected>FWD - Tracción Delantera</option>
                                    @else
                                    <option value="FWD">FWD - Tracción Delantera</option>
                                    @endif
                                    @if ($coche->trenMotriu == "RWD")
                                    <option value="RWD" selected>RWD - Tracción Trasera</option>
                                    @else
                                    <option value="RWD">RWD - Tracción Trasera</option>
                                    @endif
                                    @if ($coche->trenMotriu == "4WD")
                                    <option value="4WD" selected>4WD - Tracción Total</option>
                                    @else
                                    <option value="4WD">4WD - Tracción Total</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Categoria</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_categoria" style="border-radius:10px">>
                                    @foreach ($categorias as $categoria)
                                        @if ( $coche->id_categoria == $categoria->id )
                                            <option value="{{$categoria->id}}" selected>{{$categoria->nomCategoria}}</option>
                                        @else
                                            <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-danger" >Submit</button>

                    </form>
                
                @endif
            @endforeach
            </div>
            <!-- si el user no ha añadido coches -->
            @if($have_cars == false)
            <div class="alert alert-danger">
                <p>No has añadido ningun coche</p>
            </div>
            @endif    
        </div>

        <!-- añadir coche -->
        <!-- este boton abre el formulario para añadir coches -->
        <div id="add_car" class="p-6 bg-white border-b border-gray-200">    
            <button type="button" class="btn btn-danger">Añadir Coche</button>
        </div>
        <!-- formulario para añadir coches -->
        <div class="p-6 bg-white border-b border-gray-200">
            
            <!-- formulario para añadir coches -->
          
            <form id="car_form" action="{{ route('user.add_car',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
                @csrf
                <a  id="esconder_form_coche" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
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
        <a data-toggle="collapse" href="#collapseTramos" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseTramos">
        <br><div class="d-flex justify-content-between"><h4>Tramos Compartidos</h4><i class="fa fa-caret-down fa-2x"></i></div>
        </a><br>

        <section>
        @if (count($tramos)>0)
            <div class="collapse" id="collapseTramos">
                @foreach ($tramos as $tramo)
                <!-- editar tramo -->
                <a id="edit_tramo{{$tramo->id}}" class="btn float-right pl-3 editButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
                <!-- eliminar tramo -->
                <form id="delete_tramo{{$tramo->id}}" class="mb-3 float-right " action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'user' ]) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                </form>
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
                        <tr><th colspan="2">{{ $tramo->nom}}</th></tr>
                        <tr><th rowspan="2">{{ $tramo->sortida}}-{{ $tramo->final}}</th></tr>
                        <tr><th>{{ $tramo->distancia}}km</th></tr>
                        <tr>
                            <th>
                            <!-- informacion sobre la superficie del tramo -->
                            @foreach ($superficies as $superficie)
                                @if ( $tramo->id_superficie == $superficie->id )
                                {{$superficie->tipus}}
                                @endif
                            @endforeach
                            <th>
                        </tr>

                    </tbody>

                </table><br>

                <!-- formulario para editar tramos -->
                <form id="form_edit_tramo{{$tramo->id}}" action="{{ route('tramos.update',['id' => $tramo->id,'location' => 'user'] ) }}" method="POST" enctype="multipart/form-data" hidden>
                    @csrf
                    {{ method_field('PUT') }}
                    <a  id="esconder_form_edit{{$tramo->id}}" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
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
                @endforeach
            </div>
        @else
            <!-- si el user no ha compartido ningun tramo -->
            <div class="alert alert-danger">
                <p>No has añadido ningun tramo</p>
            </div>
        @endif
        </section>

        @if ($auth_user->rol == 'organitzador')
            <!-- eventos del usuario -->
            <a data-toggle="collapse" href="#collapseEvents" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseEvents">
                <br><div class="d-flex justify-content-between"><h4>Todos mis Eventos</h4><i class="fa fa-caret-down"></i></div>
            </a><br>
            @if (count($eventos)>0)
                <div class="collapse" id="collapseEvents">
                    @foreach ($eventos as $evento)
                        <div class="col-6 col-md-4 col-lg-3 ">

                            <!-- editar tramo -->
                            <a id="edit_evento{{$evento->id}}" class="btn float-right pr-3 editButton btn" style=" cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
                            <!-- eliminar evento -->
                            <form id="delete_evento{{$evento->id}}" class="float-right btn btn-danger" action="{{ route('eventos.destroy',['id' => $evento->id,'location' => 'user' ]) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                            </form><br><br>

                            <!-- formulario para editar eventos -->
                            <form id="form_edit_evento{{$evento->id}}" action="{{ route('eventos.update',['id' => $evento->id,'location' => 'user' ] ) }}" method="POST" enctype="multipart/form-data" hidden>
                                @csrf
                                {{ method_field('PUT') }}
                                <a  id="esconder_form_edit{{$evento->id}}" style="color:red; cursor:pointer; " class="float-right pl-3" hidden >X</a><br>
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
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- si el user no ha organizado ningun evento -->
                <div class="alert alert-danger">
                    <p>No has añadido ningun evento</p>
                </div>
            @endif
        @endif

    @endif
@stop
<script src="{{ url('/js/user.js') }}"></script>
