
<div class="card-container col-12 p-0 mb-3">
@include('user.components.tramos.edit_tramo')

  <div class="row no-gutters">
    <div class="col-lg-4">
        <div id="controlsCarousel{{$tramo->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
            <div class="carousel-inner">
            <!-- fotos del tramo -->
            @foreach ($fotos_tramos as $foto_tramo)
                @if ($foto_tramo->id_trams == $tramo->id)
                    @foreach ($fotos as $key => $foto)
                        @if($foto_tramo->id_fotos == $foto->id)
                        <div class="carousel-item">
                            <img src="{{ $foto->binari }}" class="d-block w-100 rounded-left" alt="...">
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
    </div>
    <div class="col-lg-8">
      <div class="card-body text-white">
        <h5 class="card-title">{{ $tramo->nom}}</h5>
        <hr>
        <p class="card-text">Salida-Final: <span style="color:red;">{{ $tramo->adressa}}</span></p>
        <p class="card-text">Distancia: <span style="color:red;">{{ $tramo->distancia}}km</span></p>
        <p class="card-text">Superficie: <span style="color:red;">
            <!-- informacion sobre la superficie del tramo -->
            @foreach ($superficies as $superficie)
                @if ( $tramo->id_superficie == $superficie->id )
                {{$superficie->tipus}}
                @endif
            @endforeach
        </span></p>
      </div>
    </div>
  </div>
</div>