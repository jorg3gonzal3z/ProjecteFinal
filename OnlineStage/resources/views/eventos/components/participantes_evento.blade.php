 <!-- listado de participantes -->
 <div class="d-flex justify-content-center p-0 m-0">
    <div id="listadoParticipantes:{{$evento->id}}" class="p-6 Participantes text-white" style="cursor:pointer;">
        <p><u>Ver listado de participantes</u></p>
    </div>
    <div id="lista:{{$evento->id}}" hidden>
        <ul class="list-group">
            <li id="participantes:{{$evento->id}}"class="list-group-item"  style="cursor:pointer;" hidden><b>Listado de Participantes:</b></li>

            @php
                $inscritos = false;
            @endphp

            @foreach ($inscritos_eventos as $inscrito_evento)

                @if ($inscrito_evento->id_events == $evento->id)
                    
                    @foreach ($users as $user)
                        @if ( $inscrito_evento->id_usuari == $user->id )
                            <li class="list-group-item">{{$user->name}}</li>
                            @php
                                $inscritos = true;
                            @endphp
                        @endif
                    @endforeach

                @endif

            @endforeach

            @if ($inscritos == false)
                <li class="list-group-item">No hay inscritos</li>
            @endif

        </ul>                   
    </div>
</div>