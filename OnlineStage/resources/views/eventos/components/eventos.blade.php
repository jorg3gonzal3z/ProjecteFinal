@foreach ($eventos as $evento)

    <div class="col-12 col-md-4 col-lg-3 ">
        @if (Auth::user())
            @include('eventos.components.editar_evento')
        @endif
        
        @include('eventos.components.mostrar_evento')
   
        @include('eventos.components.participantes_evento')

        @include('eventos.components.inscripcion_evento')
    
    </div>
    
@endforeach