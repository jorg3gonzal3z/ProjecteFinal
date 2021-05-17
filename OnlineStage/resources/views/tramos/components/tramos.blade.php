<!-- mostrar listado de los tramos -->
<div class="d-flex flex-wrap col-12 col-lg-10" >

    @foreach ($tramos as $tramo)
        <div class="tramoContainer text-danger col-12 col-lg-6">

            @include('tramos.components.editar_tramo')
            @include('tramos.components.mostrar_tramos')
                
        </div> 
    @endforeach
    
</div>

<div class="d-flex justify-content-center m-5 col-12" id="pagination">
    {{ $tramos->links() }}
</div>