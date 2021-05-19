<br><br>
<div class="mt-2 col-12" id="coche:{{$coche->id}}">
    <!-- modelo del coche -->
    <div class="text-center col-12"><h1>{{ $coche->model}}</h1></div>
    <!-- fotos del coche -->
    <div class="d-flex justify-content-center">
        <div class="row">
        @php
            $control_fotos = 0;
        @endphp
        @foreach ($fotos_coches as $foto_coche)
            @if ($foto_coche->id_cotxes == $coche->id)
                @php
                    $control_fotos ++ ;
                @endphp

                @foreach ($fotos as $foto)
                    @if($foto_coche->id_fotos == $foto->id)                       
                        <img class="mt-4 col-12 col-sm-6 col-md-4"  src="{{$foto->binari}}" alt="Foto coche" width="200" height="200">                        
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- imagenes vacias para tener siempre 6, que es el maximo -->
        @for ( $i = $control_fotos; $i < 6; $i ++ )           
            <div class="container_add_image mt-4 col-12 col-sm-6 col-md-4">
                <img class="add_image col-12 p-0" src="{{URL::asset('storage/assets/add_image.jpg')}}" alt="Foto vacia" width="200" height="200">
                <div class=" add_img"><div class="plus_img"><i class="fa fa-plus"></i></div></div>
            </div>                
        @endfor

        </div>
    </div>
</div>

<!-- informacion sobre el coche -->
<div id="coche_info:{{$coche->id}}"class="row mt-4 text-center">

    <div class="col-6 col-md-2 offset-md-1">
        <ul>
            <li><label>POTENCIA</label></li>
            <li><i class="fa fa-car"></i></li>
            <li><label>{{ $coche->potencia}}hp</label></li>
        </ul>
    </div>
    
    <div class="col-6 col-md-2 ">
        <ul>
            <li><label>TREN MOTRIZ</label></li>
            <!-- <li><i class="fa fa-circle"></i></li> -->
            <li><i class="fa fa-wrench"></i></li>
            <li><label>{{ $coche->trenMotriu}}</label></li>
        </ul>
    </div>

    <div class="col-6 col-md-2 ">
        <ul>
            <li><label>PESO</label></li>
            <li><i class="fa fa-balance-scale"></i></li>
            <li><label>{{ $coche->pes}}</label></li>
        </ul>
    </div>

    <div class="col-6 col-md-2 ">
        <ul>
            <li><label>AÑO</label></li>
            <li><i class="fa fa-birthday-cake"></i></li>
            <li><label>{{ $coche->any}}</label></li>
        </ul>
    </div>

    <!-- categoria del coche -->
    @foreach ($categorias as $categoria)
        @if ( $coche->id_categoria == $categoria->id )
        <div class="col-6 col-md-2">
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