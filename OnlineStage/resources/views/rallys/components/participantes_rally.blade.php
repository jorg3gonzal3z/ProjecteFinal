<!-- listado de participantes -->
<div class="d-flex justify-content-center p-0 m-0">
    <div id="ver_listado:{{$rally->id}}">
        <div id="listadoParticipantes:{{$rally->id}}" class="p-6 Participantes" style="cursor:pointer;color:blue;">
            <p>Ver listado de participantes</p>
        </div>
        <div id="lista:{{$rally->id}}" hidden>
            <ul class="list-group">
                <li id="participantes:{{$rally->id}}"class="list-group-item"  style="cursor:pointer;" hidden><b>Listado de Participantes:</b></li>

                @php
                    $inscritos = false;
                @endphp

                @foreach ($inscritos_rallys as $inscrito_rally)

                    @if ($inscrito_rally->id_rallys == $rally->id)
                        
                        @foreach ($users as $user)
                        @foreach ($coches as $coche)
                            @if ( $inscrito_rally->id_usuari == $user->id && $inscrito_rally->id_cotxe == $coche->id)
                                <li class="list-group-item">{{$user->name}} <i class="fa fa-arrow-right"></i> {{$coche->model}}</li>
                                @php
                                    $inscritos = true;
                                @endphp
                            @endif
                        @endforeach
                        @endforeach

                    @endif

                @endforeach

                @if ($inscritos == false)
                    <li class="list-group-item">No hay inscritos</li>
                @endif

            </ul>                   
        </div>
    </div>
</div>