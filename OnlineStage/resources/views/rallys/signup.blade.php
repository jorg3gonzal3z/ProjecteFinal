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

            @if (count($possibles_coches) > 0)
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Seleccoiona el coche para participar</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="coche" style="border-radius:10px">
                            @foreach ($possibles_coches as $possible_coche)
                                <option id="coche" value="{{$possible_coche->id}}">{{$possible_coche->model}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div id="id_user" hidden>{{$auth_user->id}}</div>
                <div id="id_rally" hidden>{{$rally->id}}</div>
                <button id="inscribirme" class="btn btn-danger"><i class=""></i>Inscribirme</button>
                
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
