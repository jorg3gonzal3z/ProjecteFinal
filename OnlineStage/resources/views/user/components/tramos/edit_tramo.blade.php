<!-- editar tramo -->
<a id="edit_tramo:{{$tramo->id}}" class="btn float-right pl-3 editButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar tramo -->
<form id="delete_tramo:{{$tramo->id}}" class="mb-3 float-right " action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'user' ]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
</form>

<!-- formulario para editar tramos -->
<form id="form_edit_tramo:{{$tramo->id}}" action="{{ route('tramos.update',['id' => $tramo->id,'location' => 'user'] ) }}" method="POST" enctype="multipart/form-data" hidden>
    @csrf
    {{ method_field('PUT') }}
    <a  id="esconder_form_edit:{{$tramo->id}}" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Editar Tramo</label>
    </div>
    <div class="row">
    <!-- fotografia del tramo a editar -->
    @foreach ($fotos_tramos as $foto_tramo)
        @if ($foto_tramo->id_trams == $tramo->id)
            @foreach ($fotos as $foto)
                    @if($foto_tramo->id_fotos == $foto->id)
                    <div class="container_image_edit">
                        <img class="mr-5 image_edit" src="{{$foto->binari}}" alt="Foto tramo" width="200" height="200">
                        <div class="remove_img"><div class="x_img"><i class="fa fa-trash"></i></div></div>
                    </div>
                    @endif
            @endforeach
        @endif
    @endforeach
    </div><br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Imagenes</label>
        <div class="col-sm-10">
            <input type="file" name="fotos[]" multiple>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nom" value="{{$tramo->nom}}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Distancia km</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="distancia" value="{{$tramo->distancia}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Salida</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="sortida" value="{{$tramo->sortida}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Final</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="final" value="{{$tramo->final}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Superficie</label>
        <div class="col-sm-10">
            <select class="form-control" name="id_superficie" style="border-radius:10px">>
                @foreach ($superficies as $superficie)
                    @if ($tramo->id_superficie == $superficie->id)
                        <option selected value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                    @else
                        <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <button class="btn btn-danger" >Update</button>

</form>