@extends('layouts.layout')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/tramos.css') }}" /> 

@section('content')
        
        <div class="d-flex flex-wrap p-6 solo-blur justify-content-between">
            <div class="ml-3">
                @include('tramos.components.search')
            </div>
                
            @if (Auth::user())
                <div class="col-12 col-md-6 flex justify-content-md-end">@include('tramos.components.anadir_tramo')</div>

                <div id="containerErrorsAdd" class="mt-3 border-gray-200 col-12 col-md-6 offset-md-3" >
                    <!-- control de errores del formulario -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger text-center">
                            <h3>Corrige los siguientes errores:</h3>
                            <hr>
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>· {{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

            @else 
                <div class="p-3 text-white col-12 col-sm-6 flex justify-content-end"><a class="text-danger font-weight-bold mr-1" href="{{ route('login') }}">Inicia Sesión </a> para compartir tus tramos.</div>
            @endif
        </div>    

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
