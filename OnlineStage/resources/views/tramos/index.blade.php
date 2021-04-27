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
        <!-- formualrio para añadir tramos -->
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
            <form class="" action="{{ route('tramos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data">
                @csrf
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
<<<<<<< Updated upstream
=======
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
        <section>
            <table class="table table-hover ">
                <tbody>
                    <tr>
                        <th style="width: 250px; padding: 0;"rowspan="6" colspan="2">
                        <div id="controlsCarousel" class="carousel slide" data-interval="false" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://www.semana.com/resizer/j42cYUvr34aLn13_CqxlysNH4fM=/1200x675/filters:format(jpg):quality(70)//cloudfront-us-east-1.images.arcpublishing.com/semana/V3EVP6ZUEZFY7AIGESM76I43GE.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://www.semana.com/resizer/j42cYUvr34aLn13_CqxlysNH4fM=/1200x675/filters:format(jpg):quality(70)//cloudfront-us-east-1.images.arcpublishing.com/semana/V3EVP6ZUEZFY7AIGESM76I43GE.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://mario.nintendo.com/static/e402ed3ea161d06bbd6d250f3462e2d4/8c3c2/video-button.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#controlsCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#controlsCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </th>
                    </tr>
                        <tr>
                            <th rowspan="2">nom</th>
                        </tr>
                        <tr>
                            <td>user</td>
                        </tr>
                            <tr>
                                <th rowspan="2" colspan="1">tramos->sortida}}->tramos->final}}</th>
                            </tr>
                                <tr>
                                    <th>tamos->distancia}}</th>
                                </tr>
                                <tr>
                                    <th>tramos->superficie}}</th>
                                </tr>
                </tbody>
            </table>
        </section>
        <!-- mostrar listado de los tramos 
        <div class="clearfix"></div>
        <section class="search-box">
            <div class="container-fluid">
	            <div class="row">
		            <div class="col-md-12 listing-block">
                        <div class="media">
                            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://www.semana.com/resizer/j42cYUvr34aLn13_CqxlysNH4fM=/1200x675/filters:format(jpg):quality(70)//cloudfront-us-east-1.images.arcpublishing.com/semana/V3EVP6ZUEZFY7AIGESM76I43GE.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://www.semana.com/resizer/j42cYUvr34aLn13_CqxlysNH4fM=/1200x675/filters:format(jpg):quality(70)//cloudfront-us-east-1.images.arcpublishing.com/semana/V3EVP6ZUEZFY7AIGESM76I43GE.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://mario.nintendo.com/static/e402ed3ea161d06bbd6d250f3462e2d4/8c3c2/video-button.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="media-body pl-3">
                                <div class="nom"> $tramo->nom}}</div>
                                <div class="poblacio">
                                    <span><i class="fa fa-arrows-alt"></i> $tramo->sortida}}</span>
                                    ->
                                    <span><i class="fa fa-bath"></i> $tramo->final}}</span>
                                </div>
                                <div class="d-flex">
                                    <div class="address"> $tramo->distancia}}</div>
                                    <div class="propietari "> $tramo->user}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
>>>>>>> Stashed changes
        @foreach ($tramos as $tramo)
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- si el user esta logueado y es el dueño del tramo o tiene el rol de admin podra editar, eliminar... -->
                @if (Auth::user())
                    @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
                        <a class="float-right pl-3" style="color:blue;" href="">Editar</a>
                        <form class="float-right" style="color:red;" action="" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button>Eliminar</button>
                        </form>
                    @endif
                @endif
                <!-- fotografia del tram -->
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