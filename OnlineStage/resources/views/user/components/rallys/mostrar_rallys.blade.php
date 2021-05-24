<!-- mostrar rallys -->
<div id="rally:{{$rally->id}}" class="float-right">

    <div class="card-container mb-2 mt-2">
        <div id="controlsCarousel{{$rally->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
            <div class="carousel-inner">
            <!-- fotos del rally -->
            @foreach ($fotos_rallys as $foto_rally)
                @if ($foto_rally->id_rallys == $rally->id)
                    @foreach ($fotos as $key => $foto)
                        @if($foto_rally->id_fotos == $foto->id)
                        <div class="carousel-item ">
                            <img src="{{ $foto->binari }}" class="d-block img-fluid rounded-top" alt="...">
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
            <h4 class="card-title text-center text-white">{{ $rally->nom}}</h4><hr>
            <div class="d-flex flex-wrap text-white">
                <div class="col-12 col-md-6 p-0">
                    <!-- informacion sobre la superficie del rally -->
                    @foreach ($superficies as $superficie)
                        @if ( $rally->id_superficie == $superficie->id )
                            <p>
                            Superficie: 
                                @if ($superficie->tipus == 'Asfalto' )
                                    <i class="fa fa-road text-danger pl-1" aria-hidden="true"></i>
                                @elseif ($superficie->tipus == 'Tierra' )
                                    <i class="fa fa-tree text-danger pl-1" aria-hidden="true"></i>
                                @elseif ($superficie->tipus == 'Nieve' )
                                    <i class="fa fa-snowflake-o text-danger pl-1" aria-hidden="true"></i>
                                @endif
                            <span class="text-danger pl-1">{{$superficie->tipus}}</span>
                            <p>
                        @endif
                    @endforeach
                </div>
                <div class="col-12 col-md-6 p-0">
                    <p>Numero de TC: <span class="text-danger pl-1">{{ $rally->numTC}}</span></p>
                </div>
                <div class="col-12 p-0">
                    <p>Numero de Assistencais: <span class="text-danger pl-1">{{ $rally->numAssistencies}}</span></p>
                </div>
                <div class="col-12 p-0">
                    <p>Categorias: </p>
                    <div class="d-flex flex-wrap justify-content-center">
                    <!-- categorias que pueden correr este rally -->
                    @foreach ($categorias_rallys as $categoria_rally)
                        @if ( $categoria_rally->id_rallys == $rally->id )
                            @foreach ($categorias as $categoria)
                                @if($categoria->id == $categoria_rally->id_categories)
                                    <div class="col-12 col-md-5 p-1 text-center"><p style="box-shadow:2px 2px 5px red;   word-wrap: break-word; "  class="border rounded border-dark col-12">{{$categoria->nomCategoria}}<p></div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </div>
                </div>
                <div class="col-12 p-0 mt-3">
                    @include('user.components.rallys.edit_rally')
                </div>
            </div>
        </div>
    </div>
</div>