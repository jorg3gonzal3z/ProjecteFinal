<!-- si el usuario esta logueado i es organizador o es admin puede añadir eventos, este boton abre un formulario -->
@if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
    <div class="p-6 bg-dark border-red-500 text-center">    
        <button id="add_event" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAddEvent">Añadir Evento</button>
    </div>

    <div class="modal fade" id="modalAddEvent" tabindex="-1" role="dialog" aria-labelledby="#modalAddEvent" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">¡Organizar Evento!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <!-- formulario para añadir eventos -->
                    <form id="form_add_event" action="{{ route('eventos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cartel</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nom" placeholder="Nombre del Evento ...">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tipo de Evento</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="tipus" placeholder="Fira del automovil ...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Numero de plazas</label>
                            <div class="col-sm-7">
                            <input type="number" class="form-control" name="numPlaces" placeholder="200 ...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Localizacion</label>
                            <div class="col-sm-7">
                            <input type="text" class="form-control" name="localitzacio" placeholder="El Vendrell ...">
                            </div>
                        </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" >Organizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif