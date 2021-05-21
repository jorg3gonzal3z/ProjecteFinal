<div class="col-md-12">

    <div class="card col-12 col-lg-12 mb-2">

        <div class="card-body">
            <!-- eventos del usuario -->
            <a data-toggle="collapse" href="#collapseEvents" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseEvents">
                <h4 class="card-title text-center text-white">Todos mis Eventos<i class="fa fa-caret-down ml-2"></i></h4>
            </a>

            <div class="collapse" id="collapseEvents">
                @if (count($eventos)>0)
                
                        @foreach ($eventos as $evento)
                            <div class="col-6 col-md-6 col-lg-4">

                                @include('user.components.eventos.mostrar_eventos')
                                
                            </div>
                        @endforeach
                    
                @else
                    <!-- si el user no ha organizado ningun evento -->
                    <div class="alert alert-danger text-center">
                        <p>No has añadido ningun evento</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>