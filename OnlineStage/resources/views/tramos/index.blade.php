@extends('layouts.layout')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/tramos.css') }}" /> 

@section('content')
        
        @if (Auth::user())

            <div id="containerErrorsAdd" class="m-4 bg-dark" >
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


            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-filtros-tab" data-toggle="tab" href="#nav-filtros" role="tab" aria-controls="nav-filtros" aria-selected="true">Filtrar</a>
                    <div class="nav-item nav-link" >@include('tramos.components.anadir_tramo')</div>
                </div>

            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-filtros" role="tabpanel" aria-labelledby="nav-filtros-tab">
                    <div class="d-flex flex-wrap">
                        <div class="d-flex col-12  p-3">
                            @include('tramos.components.filter')
                            <div>
                                @include('tramos.components.search')
                            </div>
                        </div>
                        <div class="col-12 text-center p-3">
                            <div class="text-white">
                                Aun no has aplicado ningun filtro...
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

        <div class="d-flex flex-wrap">

            @include('tramos.components.tramos')
        </div>


@stop

<script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<script src="{{ url('/js/tramos.js') }}"></script>
<script src="{{ url('/js/mapbox.js') }}"></script>
