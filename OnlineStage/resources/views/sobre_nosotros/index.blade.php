@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('header')
    Sobre Nosotros
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/sobre_nosotros.css') }}" />

<div class="card-container m-5">
  <h1 class="mt-5 card-title text-center text-white">Estamos aqui para que disfrutes de tu <span style="color:red;">PASIÓN</span></h1>
  <div class="mt-3 col-12 text-white text-center">
    <p>Aqui va algo</p>
  </div>
  <div>
    <img src="{{ asset('/storage/assets/jorgejuli.jpg')}}" alt="fotojorgejuli">
  </div>

  <div class="d-flex flex-wrap justify-content-center mb-3">

    <div class="text-center col-12 col-md-6 p-3">
      <div class=" btn btn-light p-4">
        <div class="">Juli Lechuga</div>
        <div class="title text-danger">Desarrollador Fullstack y Empresario</div>
      </div>
    </div>
    <div class="text-center col-12 col-md-6 p-3">
      <div class=" btn btn-light p-4">
        <div class="">Jorge Gonzalez</div>
        <div class="title text-danger">Desarrollador Fullstack y Calle</div>
      </div>
    </div>
  </div>
</div>


<script src="{{ url('/js/sobre_nosotros.js') }}"></script>

@stop