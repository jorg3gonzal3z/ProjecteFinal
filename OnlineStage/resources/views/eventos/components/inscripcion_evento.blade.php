<!-- si el user esta logueado podrá incribirse al evento siempre que queden plazas... -->
@if (Auth::user())
    @if ($evento->numPlaces >= 1)
        @php
            $inscrit = false;
        @endphp

        @foreach($inscripciones as $inscripcion)
            @if($inscripcion->id_events == $evento->id &&  $inscripcion->id_usuari == $auth_user->id)
                @php
                    $inscrit = true;
                @endphp 
            @endif
        @endforeach

        @if ($inscrit == false)
            <div class="p-6 d-flex justify-content-center">
            <form action="{{ route('evento.signup',['id_user' => $auth_user->id,'id_event' => $evento->id ] ) }}" method="POST" >
                @csrf 
                <button class="btn btn-danger">Inscribirme</button>
            </form>
            </div>
        @elseif ($inscrit == true)
            <div class="p-6 d-flex justify-content-center">
            <form action="{{ route('evento.quit',['id_user' => $auth_user->id,'id_event' => $evento->id ] ) }}" method="POST" >
                @csrf
                <button class="btn btn-danger">DesInscribirme</button>
            </form>
            </div>
        @endif
    @else
        <div class="p-6 d-flex justify-content-center">
            <button class="btn btn-danger" disabled><i class=""></i> No quedan plazas</button>
        </div>
    @endif
@endif