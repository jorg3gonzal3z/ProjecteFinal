<!-- editar tramo -->
<a id="edit_evento:{{$evento->id}}" class=" edit-event-btn float-left pr-3 btn btn-secondary text-white" data-toggle="modal" data-target="#modal{{$evento->id}}" style=" cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar evento -->
<form id="delete_evento:{{$evento->id}}" class="float-right btn btn-danger" action="{{ route('eventos.destroy',['id' => $evento->id,'location' => 'user' ]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button><i class="fa fa-trash-o"></i> Eliminar</button>
</form>

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
                    <form id="form_edit_evento:{{$evento->id}}" action="{{ route('eventos.update',['id' => $evento->id,'location' => 'user' ] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        {{ method_field('PUT') }}
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Cartel</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo">
                            </div>
                            <small style="color:red;" class="col-sm-12">Si seleccionas otro logo cambiaras el actual</small>
                        </div>

                        <input name="old_logo" value="{{$evento->logo}}" hidden></input>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nom" value="{{$evento->nom}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Tipo de Evento</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="tipus" value="{{$evento->tipus}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Numero de plazas</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="numPlaces" value="{{$evento->numPlaces}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Localizacion</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="localitzacio" value="{{$evento->localitzacio}}">
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