@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/eventos.css') }}" />

@section('content')

    @if (Auth::user())
        <div class="d-flex flex-wrap p-6 solo-blur justify-content-between">
            <div class="">
                @include('eventos.components.search')
            </div>
            <div class="col-12 mt-2 col-md-6 flex justify-content-md-end">@include('eventos.components.organizar_evento') </div>
        </div>

        <!-- control de errores del formulario -->
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
        
    @endif


    <!-- div para mostrar los eventos -->
    <div class="p-6"> 
        <div class="row">
            @include('eventos.components.eventos')
        </div>
    </div>
    
@stop
<script src="{{ url('/js/eventos.js') }}"></script>