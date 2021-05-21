@foreach ($eventos as $evento)

    <div class="col-12 col-md-6 col-lg-4 ">
        @if (Auth::user())
            @include('eventos.components.editar_evento')
        @endif
        
        @include('eventos.components.mostrar_evento')
    </div>
    
@endforeach

<div class="d-flex justify-content-center m-5 col-12" id="pagination">
    {{ $eventos->links() }}
</div>