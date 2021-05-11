<div id="evento:{{$evento->id}}" >
    <!-- fotografia del evento -->
    <div class="b-game-card">
        <div class="b-game-card__cover" style="background-image: url({{ $evento->logo }});"></div>
    </div>
    <!-- informacion sobre el evento -->
    <table class="mt-3 table table-hover ">
        <tbody>
            <tr>
                <th>
                {{ $evento->nom}}
                </th>
            </tr>
            <tr>
                <th>
                {{ $evento->tipus}}
                </th>
            </tr>
            <tr>
                <th>
                {{ $evento->numPlaces}}
                </th>
            </tr>
            <tr>
                <th>
                {{ $evento->localitzacio}}
                </th>
            </tr>
            <!-- usuario que ha organizado el evento -->
            <tr>
                <th>
                @foreach ($users as $user)
                    @if ( $evento->id_usuari == $user->id )
                        {{$user->name}}<br>
                    @endif
                @endforeach
                </th>
            </tr>
        </tbody>
    </table>
</div>