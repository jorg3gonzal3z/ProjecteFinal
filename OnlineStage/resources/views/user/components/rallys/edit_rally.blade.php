<!-- editar rally -->
<a id="edit_rally:{{$rally->id}}" class=" edit-rally-btn float-left pr-3 btn btn-secondary" data-toggle="modal" data-target="#modalrally{{$rally->id}}" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar rally -->
<form id="delete_rally:{{$rally->id}}" class="float-right" action="{{ route('rallys.destroy',['id' => $rally->id,'location' => 'user' ]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
</form>

<div class="modal fade" id="modalrally{{$rally->id}}" tabindex="-1" role="dialog" aria-labelledby="#modalrally{{$rally->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content " >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Recuerda aplicar los cambios!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <!-- formulario de edicion de rallys si eres el organizador del mismo -->
                    <form id="form_edit_rally:{{$rally->id}}" action="{{ route('rally.update',['id' => $rally->id,'location' => 'user'] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="row">
                            <!-- fotografia del rally a editar -->
                            @foreach ($fotos_rallys as $foto_rally)
                                @if ($foto_rally->id_rallys == $rally->id)
                                    @foreach ($fotos as $key => $foto)
                                        @if($foto_rally->id_fotos == $foto->id)
                                        <div class="container_image_edit">
                                            <img class="mr-5 image_edit" src="{{$foto->binari}}" alt="Foto rally" width="200" height="200">
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
                            <input type="text" class="form-control" name="nom" value="{{$rally->nom}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Distancia Total en km</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="distancia" value="{{$rally->distancia}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Numero Tramos Cronometrados</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="numTC" value="{{$rally->numTC}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Numero de Assistencias</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control"  name="numAssistencies" value="{{$rally->numAssistencies}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Localizacion</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control"  name="localitzacio" value="{{$rally->localitzacio}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Numero de Plazas</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control"  name="numPlaces" value="{{$rally->numPlaces}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Superficie</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_superficie" style="border-radius:10px">>
                                    @foreach ($superficies as $superficie)
                                        @if ($rally->id_superficie == $superficie->id)
                                            <option selected value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                        @else
                                            <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Categorias de coches que pueden participar</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="categorias[]" style="border-radius:10px" multiple>
                                    @foreach ($categorias_rallys as $categoria_rally)
                                        @if ( $categoria_rally->id_rallys == $rally->id )
                                            @foreach ($categorias as $categoria)
                                                @if($categoria->id == $categoria_rally->id_categories)
                                                    <option selected value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                                @else
                                                    <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                                @endif
                                            @endforeach
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