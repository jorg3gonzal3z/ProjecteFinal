@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/eventos.css') }}" />

@section('content')

    <div class="col-12 mt-2">
        <form class="float-right" action="{{ route('eventos.search') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search..">
            <button class="btn btn-danger" >Search</button>
        </form>
    </div><br><br>

    @if (Auth::user())

        <!-- control de errores del formulario -->
        @if (count($errors) > 0)
        <div class="p-6 border-gray-200"> 
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
        
        @include('eventos.components.organizar_evento')

    @endif


    <!-- div para mostrar los eventos -->
    <div class="p-6"> 
        <div class="row">
            @include('eventos.components.eventos')
        </div>
    </div>
    
@stop
<script src="{{ url('/js/eventos.js') }}"></script>