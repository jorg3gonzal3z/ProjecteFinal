<!-- mostrar listado de los tramos -->
<div class="d-flex flex-wrap" >

    @foreach ($tramos as $tramo)
    <div  class="col-12 col-lg-6 p-3">
        <div class="tramoContainer  text-white bg-warning">

            @include('tramos.components.editar_tramo')
            @include('tramos.components.mostrar_tramos')
                
        </div> 
    </div>
    @endforeach
    
</div>

<div class="" id="pagination">
    {{ $tramos->links() }}
</div>