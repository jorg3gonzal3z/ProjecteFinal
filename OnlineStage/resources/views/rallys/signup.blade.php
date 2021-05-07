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
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Selecciona el coche con el que quieres correr</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_superficie" style="border-radius:10px">>
                        @foreach ($coches as $coche)
                            <option value="{{$coche->id}}">{{$coche->model}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>No has añadido ningun coche</p>
            </div>
        @endif

    @endif

@stop