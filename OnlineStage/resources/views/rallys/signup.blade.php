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

    @if (Auth::user())

        <div class="p-6 bg-white border-b border-gray-200">    
            <h1>Inscripcion al Rally {{$rally->nom}}</h1>
        </div>
        
        @if (count($coches) > 0)

            @php
                $puede_correr = false;
            @endphp

            <!-- @foreach ($categorias_rally as $categoria_rally)           
                @foreach ($coches as $coche)
                    @if ($coche->id_categoria == $categoria_rally->id_categories)                           
                        @php
                            $puede_correr = true;
                        @endphp                       
                    @endif                           
                @endforeach       
            @endforeach -->

            @if ($puede_correr == false)

                <div class="alert alert-danger">
                    <p>No has añadido ningun coche que pueda correr este rally</p>
                </div>

                <form action="{{ route('user.index') }}" method="GET" >
                    @csrf
                    <button class="btn btn-danger"><i class=""></i> Añadir un Coche</button>
                </form>

            @endif

        @else

            <div class="alert alert-danger">
                <p>No has añadido ningun coche</p>
            </div>

            <form action="{{ route('user.index') }}" method="GET" >
                @csrf
                <button class="btn btn-danger"><i class=""></i> Añadir un Coche</button>
            </form>

        @endif

    @endif

@stop
<script src="{{ url('/js/signup.js') }}"></script>
