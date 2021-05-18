<!-- mostrar rallys -->
<div id="rally:{{$rally->id}}">
    <div class="col-md-4">
        <div class="card mb-2">
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
        <div class="card-body">
            <h4 class="card-title text-center">{{ $rally->nom}}</h4><hr>
            <div class="d-flex flex-wrap">
                <div class="col-6 col-md-6 p-0">
                    <!-- usuario que ha organizado el rally -->
                    @foreach ($users as $user)
                        @if ( $rally->id_usuari == $user->id )
                        <p>Organizador: {{ $user->name}}</p>
                        @endif
                    @endforeach
                </div>
                <div class="col-6 col-md-6 p-0">
                    <!-- informacion sobre la superficie del rally -->
                    @foreach ($superficies as $superficie)
                        @if ( $rally->id_superficie == $superficie->id )
                            <p>
                            Superficie: 
                                @if ($superficie->tipus == 'Asfalto' )
                                    <i class="fa fa-road" aria-hidden="true"></i>
                                @elseif ($superficie->tipus == 'Tierra' )
                                    <i class="fa fa-tree" aria-hidden="true"></i>
                                @elseif ($superficie->tipus == 'Nieve' )
                                    <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                @endif
                            {{$superficie->tipus}}
                            <p>
                        @endif
                    @endforeach
                </div>
                <div class="col-6 col-md-6 p-0">
                    <p>Numero de TC: {{ $rally->numTC}}</p>
                </div>
                <div class="col-6 col-md-6 p-0">
                    <p>Numero de Assistencais: {{ $rally->numAssistencies}}</p>
                </div>
                <div class="col-12 col-md-12 p-0">
                    <p>Categorias: </p>
                    <div class="d-flex flex-wrap justify-content-center">
                    <!-- categorias que pueden correr este rally -->
                    @foreach ($categorias_rallys as $categoria_rally)
                        @if ( $categoria_rally->id_rallys == $rally->id )
                            @foreach ($categorias as $categoria)
                                @if($categoria->id == $categoria_rally->id_categories)
                                    <div class="col-4 col-md-4 p-1 text-center"><p class="border rounded border-dark col-12">{{$categoria->nomCategoria}}<p></div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 text-center">
                @include('rallys.components.participantes_rally')
            </div><hr>
            <div class="col-12 col-md-12 text-center">
                @include('rallys.components.inscripcion_rally')
            </div>

        </div>
    </div>
</div>