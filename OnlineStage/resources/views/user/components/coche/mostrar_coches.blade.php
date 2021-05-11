<div id="coche:{{$coche->id}}">
    <!-- informacion sobre el coche -->
    {{ $coche->model}}<br>
    {{ $coche->potencia}}hp<br>
    {{ $coche->trenMotriu}}<br>
    {{ $coche->pes}}<br>
    {{ $coche->any}}<br>
    <!-- categoria del coche -->
    @foreach ($categorias as $categoria)
        @if ( $coche->id_categoria == $categoria->id )
            {{$categoria->nomCategoria}}<br>
        @endif
    @endforeach
    <!-- fotos del coche -->
    <div class="row">
    @foreach ($fotos_coches as $foto_coche)
        @if ($foto_coche->id_cotxes == $coche->id)
            @foreach ($fotos as $foto)
                    @if($foto_coche->id_fotos == $foto->id)
                    <img class="mr-5" src="{{$foto->binari}}" alt="Foto coche" width="200" height="200"><br><br>
                    @endif
            @endforeach
        @endif
    @endforeach
    </div>
</div>
