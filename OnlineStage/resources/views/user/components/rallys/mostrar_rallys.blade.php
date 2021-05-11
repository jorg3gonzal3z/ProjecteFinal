<!-- mostrar rallys -->
<table id="rally:{{$rally->id}}" class="table table-hover">
    <tbody>
        <tr>
            <th style="width: 30%; padding: 0;"rowspan="6" colspan="2">
                <div id="controlsCarousel{{$rally->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
                    <div class="carousel-inner">
                    <!-- fotos del rally -->
                    @foreach ($fotos_rallys as $foto_rally)
                        @if ($foto_rally->id_rallys == $rally->id)
                            @foreach ($fotos as $key => $foto)
                                @if($foto_rally->id_fotos == $foto->id)
                                <div class="carousel-item">
                                    <img src="{{ $foto->binari }}" class="d-block img-fluid" alt="...">
                                </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#controlsCarousel{{$rally->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#controlsCarousel{{$rally->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </th>
        </tr>
        <tr>
            <th rowspan="2">{{ $rally->nom}}</th>
        </tr>
        <tr>
            <th rowspan="2" colspan="1">{{ $rally->numTC}}-{{ $rally->numAssistencies}}</th>
        </tr>
        <tr>
            <th>{{ $rally->distancia}}km</th>
        </tr>
        <tr>
            <!-- informacion sobre la superficie del rally -->
            @foreach ($superficies as $superficie)
                @if ( $rally->id_superficie == $superficie->id )
                    <th>{{$superficie->tipus}}<th>
                @endif
            @endforeach
        </tr>
        <tr>
            <th>{{$rally->localitzacio}}<th>    
        </tr>
        <tr>
            <th>{{$rally->numPlaces}}<th>
        </tr>
        <tr>
        <!-- categorias que pueden correr este rally -->
        @foreach ($categorias_rallys as $categoria_rally)
            @if ( $categoria_rally->id_rallys == $rally->id )
                @foreach ($categorias as $categoria)
                    @if($categoria->id == $categoria_rally->id_categories)
                        <th>{{$categoria->nomCategoria}}<th> 
                    @endif
                @endforeach
            @endif
        @endforeach
        </tr>
    </tbody>
</table><br>