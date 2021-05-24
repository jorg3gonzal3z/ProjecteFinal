<!-- mostrar listado de los tramos -->
<div class="d-flex flex-wrap" >

    @foreach ($tramos as $tramo)
    <div  class="col-12 col-lg-6 p-4">
        <div class="tramoContainer p-3 text-white card">

            @include('tramos.components.editar_tramo')
            @include('tramos.components.mostrar_tramos')
                
        </div> 
    </div>
    @endforeach
    
</div>

{{ $tramos->links() }}
