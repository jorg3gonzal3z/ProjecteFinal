@if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
    @if ($auth_user->rol == 'admin' || $auth_user->id == $evento->id_usuari)
    <form id="delete_evento:{{$evento->id}}" class=" btn btn-danger" action="{{ route('eventos.destroy',['id' => $evento->id,'location' => 'eventos' ]) }}" method="POST">
        @csrf
        {{ method_field('DELETE') }}
        <button><i class="fa fa-trash-o"></i> Eliminar</button>
    </form>
    <!-- editar evento -->
    <a id="edit_evento:{{$evento->id}}" class="edit_btn pr-3 btn btn-secondary text-white" data-toggle="modal" data-target="#modal{{$evento->id}}" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
    <!-- eliminar evento -->

    
    @endif

    <div class="modal fade" id="modal{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="#modal{{$evento->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content " >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Recuerda aplicar los cambios!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">

                    <!-- formulario para editar eventos -->
                    <form id="form_edit_evento:{{$evento->id}}" action="{{ route('eventos.update',['id' => $evento->id,'location' => 'eventos' ] ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        
                        <div class="box form-group row mt-4 justify-content-center">
                            <input type="file" name="logo" id="file_evento-{{$evento->id}}" class="inputfile inputfile-1"  data-multiple-caption="{count} fotos seleccionadas" hidden />
                            <label for="file_evento-{{$evento->id}}"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tu Cartel&hellip;</span></label>
                            <span class="form-text text-white col-12 text-center">Si seleccionas otro cartel sobreescribiras el actual.</span>
                        </div>

                        <input name="old_logo" value="{{$evento->logo}}" hidden></input>

                        <div class="col-12 d-flex flex-wrap">

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white col-12 text-left p-0">Nombre</label>
                                <input type="text" class="form-control" name="Nombre" value="{{$evento->nom}}">
                            </div>
                            
                            <div class="form-group col-12 col-md-6">
                                <label class="text-white col-12 text-left p-0">Tipo de Evento</label>
                                <input type="text" class="form-control" name="Tipo" value="{{$evento->tipus}}">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white col-12 text-left p-0">Numero de plazas</label>
                                <input type="number" class="form-control" name="n-Plazas" value="{{$evento->numPlaces}}" disabled>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white col-12 text-left p-0">Localizacion</label>
                                <input type="text" class="form-control" name="Localizacion" value="{{$evento->localitzacio}}">
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

@endif