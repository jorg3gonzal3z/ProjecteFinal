<!-- editar coche -->
<a id="edit_coche:{{$coche->id}}" class="btn float-right pl-3 editCarButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar coche -->
<form id="delete_coche:{{$coche->id}}" class="float-right" action="{{ route('user.destroy_car',['id' => $coche->id]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
</form>

<!-- formulario para editar coches -->

<form id="car_form_edit:{{$coche->id}}" action="{{ route('user.update_car',['id' => $coche->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
    @csrf
    {{ method_field('PUT') }}

    <div class="d-flex flex-wrap">
        <!-- fotografia del coche a editar -->
        @foreach ($fotos_coches as $foto_coche)
            @if ($foto_coche->id_cotxes == $coche->id)
                @foreach ($fotos as $foto)
                        @if($foto_coche->id_fotos == $foto->id)
                        <!-- las imagenes no se muestran todas de la misma medida juli ayuda :( -->
                        <div class="mt-4 container_image_edit col-12 col-md-2">
                            <img class=" image_edit" src="{{$foto->binari}}" alt="Foto coche" width="200" height="200">
                            <div class=" remove_img"><div class="x_img"><i class="fa fa-trash"></i></div></div>
                        </div>
                        @endif
                @endforeach
            @endif
        @endforeach

        <!-- imagenes vacias si hay menos de 5 fotos del coche -->
        @for ( $i = count($fotos_coches); $i < 6; $i ++ )
            <img class="mt-4 col-12 col-md-2 " src="{{URL::asset('storage/assets/add_image.jpg')}}" alt="Foto vacia" >
        @endfor
    </div>

    <a  id="esconder_form_edit_coche:{{$coche->id}}" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Imagenes</label>
        <div class="col-sm-10">
            <input type="file" name="fotos[]" multiple>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Modelo</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="modelo" value="{{$coche->model}}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Potencia (hp)</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="potencia"  value="{{$coche->potencia}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Peso (kg)</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="peso"  value="{{$coche->pes}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Año</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="año"  value="{{$coche->any}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tren Motriz</label>
        <div class="col-sm-10">
            <select class="form-control" name="tren_motriz" style="border-radius:10px">
                @if ($coche->trenMotriu == "FWD")
                <option value="FWD" selected>FWD - Tracción Delantera</option>
                @else
                <option value="FWD">FWD - Tracción Delantera</option>
                @endif
                @if ($coche->trenMotriu == "RWD")
                <option value="RWD" selected>RWD - Tracción Trasera</option>
                @else
                <option value="RWD">RWD - Tracción Trasera</option>
                @endif
                @if ($coche->trenMotriu == "4WD")
                <option value="4WD" selected>4WD - Tracción Total</option>
                @else
                <option value="4WD">4WD - Tracción Total</option>
                @endif
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Categoria</label>
        <div class="col-sm-10">
            <select class="form-control" name="id_categoria" style="border-radius:10px">>
                @foreach ($categorias as $categoria)
                    @if ( $coche->id_categoria == $categoria->id )
                        <option value="{{$categoria->id}}" selected>{{$categoria->nomCategoria}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <button class="btn btn-danger" >Submit</button>

</form>