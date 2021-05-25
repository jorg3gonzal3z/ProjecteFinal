<!-- editar rally -->
<a id="edit_rally:{{$rally->id}}" class=" edit-rally-btn edit_btn_modal float-left pr-3 btn btn-secondary" data-toggle="modal" data-target="#modalrally{{$rally->id}}" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
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
                                        <div class="img_edit:{{$foto->id}} container_image_edit col-12 col-sm-6 col-md-4 mt-2">
                                            <img class=" image_edit w-100 " src="{{$foto->binari}}" alt="Foto rally" >
                                            <div class="remove_img"><div class="x_img"><i class="fa fa-trash"></i></div></div>
                                            <div id="rally_id" hidden>{{$rally->id}}</div>
                                            <div id="foto_id" hidden>{{$foto->id}}</div>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                        <div class="box form-group row mt-4 justify-content-center">
                            <input type="file" name="fotos[]" id="file_rally-{{$rally->id}}" class="inputfile inputfile-1" data-multiple-caption="{count} fotos seleccionadas" multiple hidden />
                            <label for="file_rally-{{$rally->id}}"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tus fotos&hellip;</span></label>
                            <span class="form-text text-white col-12 text-center">*Mínimo una foto y máximo seis.</span>
                        </div>

                        <div class="col-12 d-flex flex-wrap">

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Nombre</label>
                                <input type="text" class="form-control" name="nom" value="{{$rally->nom}}">
                            </div>
                            
                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Distancia Total en km</label>
                                <input class="form-control" name="distancia" value="{{$rally->distancia}}">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Numero Tramos Cronometrados</label>
                                <input type="number" class="form-control" name="numTC" value="{{$rally->numTC}}">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Numero de Assistencias</label>
                                <input type="number" class="form-control"  name="numAssistencies" value="{{$rally->numAssistencies}}">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Localizacion</label>
                                <input type="text" class="form-control"  name="localitzacio" value="{{$rally->localitzacio}}">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Numero de Plazas</label>
                                <input type="number" class="form-control"  name="numPlaces" value="{{$rally->numPlaces}}" disabled>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Superficie</label>
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

                            <div class="form-group col-12 p-0">
                                <label class="col-12 text-white">Categorias de coches que pueden participar</label>
                                <div class="col-12">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <!-- categorias que pueden correr este rally -->
                                        @foreach ($categorias_rallys as $categoria_rally)
                                            @if ( $categoria_rally->id_rallys == $rally->id )
                                                @foreach ($categorias as $categoria)
                                                    @if($categoria->id == $categoria_rally->id_categories)
                                                        <div class="col-12 col-md-5 p-1 text-center"><p style="color:#343a40!important;box-shadow:2px 2px 5px red;" class="border rounded border-dark col-12 bg-white">{{$categoria->nomCategoria}}<p></div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="text" id="imagenes_a_eliminar_rally:{{$rally->id}}" class="form-control" name="imagenes_a_eliminar" value="null" hidden readonly>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" >Aplicar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>