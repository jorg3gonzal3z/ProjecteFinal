<div id="evento:{{$evento->id}}" >
<div class="card-container mb-4 col-12 px-0 ">
    <!-- fotografia del evento -->
    <div class="b-game-card ">
        <div class="b-game-card__cover rounded-top" style="background-image: url({{ $evento->logo }});"></div>
    </div>

    <div class="card-body">
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
            <div class="col-12 col-md-12 p-0 text-white mt-2">
                <!-- usuario que ha organizado el evento -->
                @foreach ($users as $user)
                    @if ( $evento->id_usuari == $user->id )
                        Organizador:<span class="text-danger pl-1">{{$user->name}}</span>
                    @endif
                @endforeach
            </div>
            <div class="col-12 col-md-12 p-0 mt-3">
            @include('eventos.components.participantes_evento')
            </div>
            <div class="col-12 col-md-12 p-0">
            @include('eventos.components.inscripcion_evento')
            </div>
            <div class="col-12 col-md-12 p-0 d-flex flex-wrap justify-content-between">
                @if (Auth::user())
                    @include('eventos.components.editar_evento')
                @endif
            </div>
        </div>
    </div>
        
</div>
</div>