<div class="d-flex flex-wrap p-6 solo-blur justify-content-between">
        <div class="">
            @include('eventos.components.search')
        </div>
@if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')

        <div class="text-center">    
            <button id="add_rally" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAddEvent">Organizar Evento  <i class="fa fa-plus"></i></button>
        </div>
    </div>    

    <div class="modal fade" id="modalAddEvent" tabindex="-1" role="dialog" aria-labelledby="#modalAddEvent" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Organizar Evento!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <!-- formulario para añadir eventos -->
                    <form id="form_add_event" action="{{ route('eventos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="box form-group row mt-4 justify-content-center">
                            <input type="file" name="logo" id="file-newEvent" class="inputfile inputfile-1"  hidden />
                            <label for="file-newEvent"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tu Cartel&hellip;</span></label>
                            <span class="form-text text-white col-12 text-center">Cartel del Evento.</span>
                        </div>

                        <div class="col-12 d-flex flex-wrap">

                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-white">Nombre *</label>
                               
                                <input type="text" class="form-control" name="nom" placeholder="Nombre del Evento ...">
                                
                            </div>
                            
                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-white">Tipo de Evento *</label>
                                
                                <input type="text" class="form-control" name="tipus" placeholder="Fira del automovil ...">
                               
                            </div>

                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-white">Numero de plazas *</label>
                               
                                <input type="number" class="form-control" name="numPlaces" placeholder="200 ...">
                               
                            </div>

                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-white">Localizacion *</label>
                               
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