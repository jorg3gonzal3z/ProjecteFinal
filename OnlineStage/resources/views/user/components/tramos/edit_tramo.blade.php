<!-- editar tramo -->
<a id="edit_tramo:{{$tramo->id}}" class="edit-tramo-btn btn btn-secondary float-right ml-3" data-toggle="modal" data-target="#modaltramo{{$tramo->id}}" style="cursor:pointer;bottom:0;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar tramo -->
<form id="delete_tramo:{{$tramo->id}}" class="mb-3 float-right " action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'user' ]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
</form>

<div class="modal fade" id="modaltramo{{$tramo->id}}" tabindex="-1" role="dialog" aria-labelledby="#modalmodaltramo{{$tramo->id}}" aria-hidden="true">
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
                    </div>
                    
                    <div class="box form-group row mt-4 justify-content-center">
                        <input type="file" name="fotos[]" id="file_tramo-{{$tramo->id}}" class="inputfile inputfile-1" data-multiple-caption="{count} fotos seleccionadas" multiple hidden />
                        <label for="file_tramo-{{$tramo->id}}"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tus fotos&hellip;</span></label>
                        <span class="form-text text-white col-12 text-center">*Mínimo una foto y máximo seis.</span>
                    </div>

                    <div class="col-12 d-flex flex-wrap">

                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Nombre</label>
                            <input type="text" class="form-control" name="nom" value="{{$tramo->nom}}">
                        </div>
                        
                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Distancia km</label>
                            <input type="number" class="form-control" name="distancia" value="{{$tramo->distancia}}">
                        </div>

                        <div class="form-group col-12 col-md-6" disabled>
                            <label class="text-white">Trayecto</label>
                            <input style="color:#343a40!important;box-shadow:2px 2px 5px red;" class="border rounded border-dark col-12 bg-white"type="text" value="{{$tramo->adressa}}" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Superficie</label>
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
    