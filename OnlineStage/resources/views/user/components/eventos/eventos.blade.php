<!-- eventos del usuario -->
<a data-toggle="collapse" href="#collapseEvents" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseEvents">
    <br><div class="d-flex justify-content-between"><h4>Todos mis Eventos</h4><i class="fa fa-caret-down fa-2x"></i></div>
</a><br>
@if (count($eventos)>0)
    <div class="collapse" id="collapseEvents">
        @foreach ($eventos as $evento)
            <div class="col-6 col-md-4 col-lg-3 ">

                @include('user.components.eventos.edit_evento')
                @include('user.components.eventos.mostrar_eventos')
                
            </div>
        @endforeach
    </div>
@else
    <!-- si el user no ha organizado ningun evento -->
    <div class="alert alert-danger">
        <p>No has añadido ningun evento</p>
    </div>
@endif