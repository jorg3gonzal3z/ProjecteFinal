@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/rallys.css') }}" />

@section('content')

    @include('rallys.components.search')

    @if (Auth::user())

        <!-- control de errores de los formulario -->
        @if (count($errors) > 0)
            <div class="p-6 border-gray-200 col-12 col-md-6 offset-md-3">
                <div class="alert alert-danger text-center">
                    <h3>Corrige los siguientes errores:</h3>
                    <hr>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>· {{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- si el usuario esta logueado i es organizador o es admin puede añadir rallys -->
    
        
        @include('rallys.components.organizar_rally')

    @endif

    @include('rallys.components.rally')

@stop

<script src="{{ url('/js/rallys.js') }}"></script>
