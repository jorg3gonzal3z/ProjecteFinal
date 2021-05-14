<!-- mostrar listado de los tramos -->
<div class="d-flex flex-wrap" >

    @foreach ($tramos as $tramo)
        <div class="tramoContainer text-danger col-12 col-md-6">

            @include('tramos.components.editar_tramo')
            @include('tramos.components.mostrar_tramos')
                
        </div> 
    @endforeach
</div>