<br><br>
<div class="mt-2 col-12" id="coche:{{$coche->id}}">
    <!-- modelo del coche -->
    <div class="text-center"><h1>{{ $coche->model}}</h1></div>
    <!-- fotos del coche -->
    <div class="d-flex justify-content-center">
        <div class="row mt-3">
        @foreach ($fotos_coches as $foto_coche)
            @if ($foto_coche->id_cotxes == $coche->id)
                @foreach ($fotos as $foto)
                        @if($foto_coche->id_fotos == $foto->id)                       
                            <img class="mr-5" src="{{$foto->binari}}" alt="Foto coche" width="200" height="200">                        
                        @endif
                @endforeach
            @endif
        @endforeach
        </div>
    </div>
</div>

<!-- informacion sobre el coche -->
<div class="row mt-4">

    <div class="col-2 text-center offset-1">
        <ul>
            <li><label>POTENCIA</label></li>
            <li><i class="fa fa-car"></i></li>
            <li><label>{{ $coche->potencia}}hp</label></li>
        </ul>
    </div>
    
    <div class="col-2 text-center">
        <ul>
            <li><label>TREN MOTRIZ</label></li>
            <!-- <li><i class="fa fa-circle"></i></li> -->
            <li><i class="fa fa-wrench"></i></li>
            <li><label>{{ $coche->trenMotriu}}</label></li>
        </ul>
    </div>

    <div class="col-2 text-center">
        <ul>
            <li><label>PESO</label></li>
            <li><i class="fa fa-balance-scale"></i></li>
            <li><label>{{ $coche->pes}}</label></li>
        </ul>
    </div>

    <div class="col-2 text-center">
        <ul>
            <li><label>AÑO</label></li>
            <li><i class="fa fa-birthday-cake"></i></li>
            <li><label>{{ $coche->any}}</label></li>
        </ul>
    </div>

    <!-- categoria del coche -->
    @foreach ($categorias as $categoria)
        @if ( $coche->id_categoria == $categoria->id )
        <div class="col-2 text-center">
            <ul>
                <li><label>CATEGORIA</label></li>
                <li><i class="fa fa-tag"></i></li>
                <li><label>{{$categoria->nomCategoria}}</label></li>
            </ul>
        </div>
        @endif
    @endforeach

</div>
<hr>