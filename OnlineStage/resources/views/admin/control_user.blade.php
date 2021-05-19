@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/admin.css') }}" />
@section('content')

<div class="col-12">
    
    <div class="mt-3 card col-12 col-mb-12 col-lg-6 offset-lg-3 mb-2">

        <div class="card-body">
            <h4 class="card-title text-center text-white">Control de Usuarios</h4>
            @foreach ($users as $user)
            <div class="mt-2 rounded col-12" style="box-shadow:2px 2px 5px red;">
                <div class="col-12 col-md-5 col-lg-5 text-white ">{{$user->name}}</div>
                <div class="col-12 col-md-3 col-lg-3 text-white ">Rol :<span class="ml-2" style="color:red;"> {{$user->rol}}</span></div>
                <div class="col-12 col-md-4 col-lg-4 p-0 mt-1">
                    <!-- eliminar user -->
                    <form action="{{ route('user.destroy',['id' => $user->id, 'location' => 'admin_view' ]) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i>Eliminar</button>
                    </form>
                </div>
            </div>   
            @endforeach
        </div>
    
    </div> 

</div>  

@stop