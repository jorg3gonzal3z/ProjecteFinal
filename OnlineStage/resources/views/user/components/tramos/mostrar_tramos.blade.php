<table id="tramo:{{$tramo->id}}" class="table table-hover ">

<tbody>

    <tr>
        <th style="width: 30%; padding: 0;"rowspan="6" colspan="2">
            <div id="controlsCarousel{{$tramo->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                <!-- fotos del tramo -->
                @foreach ($fotos_tramos as $foto_tramo)
                    @if ($foto_tramo->id_trams == $tramo->id)
                        @foreach ($fotos as $key => $foto)
                            @if($foto_tramo->id_fotos == $foto->id)
                            <div class="carousel-item">
                                <img src="{{ $foto->binari }}" class="d-block w-100" alt="...">
                            </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                </div>
                <a class="carousel-control-prev" href="#controlsCarousel{{$tramo->id}}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#controlsCarousel{{$tramo->id}}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </th>
    </tr>
    <tr><th colspan="2">{{ $tramo->nom}}</th></tr>
    <tr><th rowspan="2">{{ $tramo->sortida}}-{{ $tramo->final}}</th></tr>
    <tr><th>{{ $tramo->distancia}}km</th></tr>
    <tr>
        <th>
        <!-- informacion sobre la superficie del tramo -->
        @foreach ($superficies as $superficie)
            @if ( $tramo->id_superficie == $superficie->id )
            {{$superficie->tipus}}
            @endif
        @endforeach
        <th>
    </tr>

</tbody>

</table><br>