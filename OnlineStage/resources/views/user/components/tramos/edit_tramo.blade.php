<!-- editar tramo -->
<a id="edit_tramo:{{$tramo->id}}" class="edit-tramo-btn btn btn-secondary float-right ml-3" data-toggle="modal" data-target="#modal{{$tramo->id}}" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar tramo -->
<form id="delete_tramo:{{$tramo->id}}" class="mb-3 float-right " action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'user' ]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
</form>

<div class="modal fade" id="modal{{$tramo->id}}" tabindex="-1" role="dialog" aria-labelledby="#modal{{$tramo->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content " >
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Recuerda aplicar los cambios!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-danger" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <!-- formulario para editar tramos -->
                <form id="form_edit_tramo:{{$tramo->id}}" action="{{ route('tramos.update',['id' => $tramo->id,'location' => 'user'] ) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{ method_field('PUT') }}
                    
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
                        <label class="col-sm-2 col-form-label text-white">Imagenes</label>
                        <div class="col-sm-10">
                            <input type="file" name="fotos[]" multiple>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-white">Nombre</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" value="{{$tramo->nom}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-white">Distancia km</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" name="distancia" value="{{$tramo->distancia}}">
                        </div>
                    </div>

                    <div class="form-group row" hidden>
                        <label class="col-sm-2 col-form-label text-white">Salida</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="sortida" value="{{$tramo->sortida}}">
                        </div>
                    </div>

                    <div class="form-group row" hidden>
                        <label class="col-sm-2 col-form-label text-white">Final</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="final" value="{{$tramo->final}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-white">Adressa</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="adressa" value="{{$tramo->adressa}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-white">Superficie</label>
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
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" >Aplicar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
    