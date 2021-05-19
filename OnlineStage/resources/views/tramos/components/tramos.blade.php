<!-- mostrar listado de los tramos -->
<div class="d-flex flex-wrap" >

    @foreach ($tramos as $tramo)
        <div class="tramoContainer text-white col-12 col-lg-6" data-category=
        @foreach ($superficies as $superficie)
            @if ( $tramo->id_superficie == $superficie->id )
                "{{$superficie->tipus}}">
            @endif
        @endforeach

            @include('tramos.components.editar_tramo')
            @include('tramos.components.mostrar_tramos')
                
        </div> 
    @endforeach
    
</div>

<div class="" id="pagination">
    {{ $tramos->links() }}
</div>