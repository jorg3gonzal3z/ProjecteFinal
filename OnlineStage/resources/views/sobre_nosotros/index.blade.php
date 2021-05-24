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
    <p>Me preguntan por qué yo cambié y mi trabajo
Y solo cambiaron la' manera' de verme con tus ojo'
En la calle no me aflojo, en la calle no me aflojo
Lo sé y bienvenido a la calle y su clase
Los duro' llevan Motorola, van con motora
La chulería no les mola y no hablan de pistola'
Palo' cotizado', dinero malo
Luego abogado' acaba' entre cerrado'
Hablan pero na'-na'-na'-na' y luego nadie tiene
(Manmare hasan na'-na'-na'-na')
Aquí se busca lana-lana, policía interviene
Viviendo como nada-nada y facturando ciene'
Se que esta' vece' para-para', pero porque vos quiere'
Viviendo con lo necesario, a vece' escenario'
Otra' con sicario', a diario
Viviendo en mi barrio, moviendo a diario
Hago avería' pero nunca he sido locario
Con nadie compito, me gustan lo' delito'
Ay,…</p>
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