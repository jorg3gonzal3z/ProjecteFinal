@extends('layouts.layout')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/tramos.css') }}" /> 

@section('content')
        
        @if (Auth::user())

            <div id="containerErrorsAdd" class="m-4 " >
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
        @endif
        <nav class="flex flex-wrap justify-content-between bg-gray-900">
            <div class="p-3 col-12 col-sm-6 flex justify-content-center">
                @include('tramos.components.search')
            </div>

            @if (Auth::user())<div class="p-3 col-12 col-sm-6 flex justify-content-center">@include('tramos.components.anadir_tramo')</div>
            @else <div class="p-3 text-white col-12 col-sm-6 flex justify-content-center"><a class="text-danger font-weight-bold" href="{{ route('login') }}">Inicia Sesión</a> para compartir tus tramos.</div>
            @endif
        </nav>

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
