<div class="col-md-12">

<div class="mt-3 card col-12 col-mb-12 col-lg-6 offset-lg-3 mb-2">

    <div class="card-body">
        <!-- inscripciones del usuario -->
        <a data-toggle="collapse" href="#collapseInscrits" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseInscrits">
            <h4 class="card-title text-center text-white">Todas mis Inscripciones <i class="fa fa-caret-down"></i> </h4>
        </a>
        
        <div class=" collapse row justify-content-between" id="collapseInscrits">

        @if ( count($inscripciones_rallys)>0 || count($inscripciones_eventos)>0 )
                @if (count($inscripciones_rallys)>0)
                    <!-- inscripciones rallys -->
                    <ul class="mt-2 list-group col-md-6 p-2">
                        <li class="list-group-item text-center"  style="cursor:pointer;" ><b>Inscripciones Rallys:</b></li>
                        @foreach($inscripciones_rallys as $inscripcione_rally)
                            @foreach($rallys as $rally)
                                @if($rally->id == $inscripcione_rally->id_rallys)                       
                                    <li class="list-group-item text-center">{{$rally->nom}}</li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                    @endif
                    @if (count($inscripciones_eventos)>0)
                    <!-- inscripciones eventos -->
                    <ul class="mt-2 list-group col-md-6 p-2">
                        <li class="list-group-item text-center"  style="cursor:pointer;" ><b>Inscripciones Eventos:</b></li>
                        @foreach($inscripciones_eventos as $inscripcion_evento)
                            @foreach($eventos as $evento)
                                @if($evento->id == $inscripcion_evento->id_events)                       
                                    <li class="list-group-item text-center">{{$evento->nom}}</li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                @endif
        @else
            <div class="alert alert-danger">
                <p>No estas inscrito a ningun evento ni a ningun rally</p>
            </div>
        @endif
        </div>
    </div>
    
</div>

</div>
