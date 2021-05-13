<div  id="tramo:{{$tramo->id}}" class="tab-content text-danger" id="nav-tabContent{{$tramo->id}}">
    <div class="tab-pane fade show active" id="nav-fotos{{$tramo->id}}" role="tabpanel" aria-labelledby="nav-fotos-tab">
        <div id="controlsCarousel{{$tramo->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
            <div class="carousel-inner">
                <!-- fotos del tramo -->
                @foreach ($fotos_tramos as $foto_tramo)
                    @if ($foto_tramo->id_trams == $tramo->id)
                    
                        @foreach ($fotos as $key => $foto)
                            @if($foto_tramo->id_fotos == $foto->id)
                            <div class="carousel-item">
                                <img src="{{ $foto->binari }}" class="d-block " alt="...">
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
    <div class="tab-pane fade " id="nav-info{{$tramo->id}}" role="tabpanel" aria-labelledby="nav-info-tab">
            <table class="table text-danger table-hover ">
                <tbody>
                    <tr>
                        <th style="width: 30%; padding: 0;"rowspan="6" colspan="2">
                            
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="2">{{ $tramo->nom}}</th>
                    </tr>
                    <tr>
                    <!-- usuario que ha compartido el tramo -->
                    @foreach ($users as $user)
                        @if ( $tramo->id_usuari == $user->id )
                        <td>{{ $user->name}}</td>
                        @endif
                    @endforeach
                    </tr>
                    <tr>
                        <th rowspan="2" colspan="1" class="mostraAdressa">{{$tramo->adressa}}</th>
                    </tr>
                    <tr>
                        <th>{{ $tramo->distancia}}km</th>
                    </tr>
                    <tr>
                        <!-- informacion sobre la superficie del tramo -->
                        @foreach ($superficies as $superficie)
                            @if ( $tramo->id_superficie == $superficie->id )
                                <th>{{$superficie->tipus}}<th>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
        </table>   
    </div>
</div>