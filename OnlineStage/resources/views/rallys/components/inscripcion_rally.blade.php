<!-- si el user esta logueado podrá incribirse al rally siempre que queden plazas... -->
@if (Auth::user())

@if ($rally->numPlaces >= 1)

    @php
        $inscrit = false;
    @endphp

    @foreach($inscripciones as $inscripcion)
        @if($inscripcion->id_rallys == $rally->id &&  $inscripcion->id_usuari == $auth_user->id)
            @php
                $inscrit = true;
            @endphp 
        @endif
    @endforeach

    @if ($inscrit == false)
        <form action="{{ route('rally.signup',['id_user' => $auth_user->id,'id_rally' => $rally->id ] ) }}" method="GET" >
            @csrf
            <button class="btn btn-danger"><i class=""></i> Inscribirme</button>
        </form>
    @elseif($inscrit == true)
        <form action="{{ route('rally.quit',['id_user' => $auth_user->id,'id_rally' => $rally->id ] ) }}" method="POST" >
            @csrf
            <button class="btn btn-danger">DesInscribirme</button>
        </form>
    @endif

@else
    <button class="btn btn-danger" disabled><i class=""></i> No quedan plazas</button>
@endif
@endif