<div id="evento:{{$evento->id}}" >
    <div class="card-container mb-2 col-12 px-0 mt-3">

        <!-- fotografia del evento -->
        <div class="b-game-card">
            <div class="b-game-card__cover rounded-top" style="background-image: url({{ $evento->logo }});"></div>
        </div>
        <div class="card-body">
            <!-- informacion sobre el tramo -->
            <h4 class="card-title text-center text-white">{{ $evento->nom}}</h4><hr>
            <div class="d-flex flex-wrap text-center">
                <div class="col-12 col-md-12 p-0 text-white mt-2">
                    Tipo de evento:<span class="text-danger pl-1">{{ $evento->tipus}}</span>
                </div>
                <div class="col-12 col-md-12 p-0 text-white mt-2">
                    Numero de Plazas:<span class="text-danger pl-1">{{ $evento->numPlaces}}</span>
                </div>
                <div class="col-12 col-md-12 p-0 text-white mt-2">
                    Localizacion:<span class="text-danger pl-1">{{ $evento->localitzacio}}</span>
                </div>
                <div class="col-12 col-md-12 p-0 mt-3">
                    @include('user.components.eventos.edit_evento')
                </div>      

            </div>
        </div>
    </div>
</div>
