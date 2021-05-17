<div class="col-md-12">
<!-- inscripciones del usuario -->
<a data-toggle="collapse" href="#collapseInscrits" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseInscrits">
    <div class="text-center"><h4>Todas mis Inscripciones <i class="fa fa-caret-down"></i></h4></div>
</a>

@if ( count($inscripciones_rallys)>0 || count($inscripciones_eventos)>0 )
    <div class="collapse row justify-content-center" id="collapseInscrits">
        @if (count($inscripciones_rallys)>0)
            <!-- inscripciones rallys -->
            <ul class="list-group col-md-2">
                <li class="list-group-item"  style="cursor:pointer;" ><b>Inscripciones Rallys:</b></li>
                @foreach($inscripciones_rallys as $inscripcione_rally)
                    @foreach($rallys as $rally)
                        @if($rally->id == $inscripcione_rally->id_rallys)                       
                            <li class="list-group-item">{{$rally->nom}}</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
            @endif
            @if (count($inscripciones_eventos)>0)
            <!-- inscripciones eventos -->
            <ul class="list-group col-md-2">
                <li class="list-group-item"  style="cursor:pointer;" ><b>Inscripciones Eventos:</b></li>
                @foreach($inscripciones_eventos as $inscripcion_evento)
                    @foreach($eventos as $evento)
                        @if($evento->id == $inscripcion_evento->id_events)                       
                            <li class="list-group-item">{{$evento->nom}}</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        @endif
    </div>
@else
    <div class="alert alert-danger">
        <p>No estas inscrito a ningun evento ni a ningun rally</p>
    </div>
@endif

</div>
