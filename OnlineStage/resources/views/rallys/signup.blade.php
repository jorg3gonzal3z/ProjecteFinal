@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/rallys.css') }}" />

@section('header')
    Rallys
@stop

@section('content')

    <!-- control de errores de los formulario -->
    @if (count($errors) > 0)
        <div class="p-6 border-b border-gray-200"> 
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

        <div class="p-6 text-center border-gray-200">    
            <h1>Inscripcion al Rally {{$rally->nom}}</h1>
        </div>
        
        @if (count($coches) > 0)

            @if (count($possibles_coches) > 0)

                <div class="col-12">
        
                    <div class="mt-3 card col-12 col-mb-12 col-lg-6 offset-lg-3 mb-2">

                        <div class="card-body">
                            <h4 class="card-title text-center text-white">Seleccoiona el coche para participar</h4>
                            <hr>
                            <div class="col-12">
                                <select class="form-control" name="coche" style="border-radius:10px">
                                    @foreach ($possibles_coches as $possible_coche)
                                        <option id="coche" value="{{$possible_coche->id}}">{{$possible_coche->model}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="id_user" hidden>{{$auth_user->id}}</div>
                            <div id="id_rally" hidden>{{$rally->id}}</div>
                            <hr>
                            <div class="mt-3 d-flex flex-wrap justify-content-between">
                                <a href="{{route('rallys.index')}}" class="ml-3 btn btn-secondary"></i>Volver</a>
                                <button id="inscribirme" class="mr-3 btn btn-danger"></i>Inscribirme</button>
                            </div>
                        </div>
                    
                    </div> 

                </div>  

            @else
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
<script>
$(document).ready(function(){
    $('#inscribirme').click(function(e){
        let id_rally =  $('#id_rally').html();
        let coche_id = $('#coche').val();
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post( id_rally + '/' + coche_id, function(response) {
            // handle your response here
            console.log(response);
            window.location.href = "{{ route('rallys.index')}}";
        })
        e.preventDefault();
        return false;
    });
});
</script>
