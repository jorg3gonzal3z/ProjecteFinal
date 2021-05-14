<!-- si el usuario esta logueado i es organizador o es admin puede añadir eventos, este boton abre un formulario -->
@if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
    <div class="p-6 bg-dark border-red-500 text-center">    
        <button id="add_event" type="button" class="btn btn-danger">Añadir Evento</button>
    </div>

    <div class="p-6 border-gray-200"> 

        <!-- formulario para añadir eventos -->
        <form id="form_add_event" action="{{ route('eventos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
            @csrf
            <a  id="esconder_form" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Añadir Evento</label>
            </div>
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
                <label class="col-sm-2 col-form-label">Tipo de Evento</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="tipus" placeholder="Fira del automovil ...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Numero de plazas</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="numPlaces" placeholder="200 ...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Localizacion</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="localitzacio" placeholder="El Vendrell ...">
                </div>
            </div>

            <button class="btn btn-danger" >Submit</button>

        </form>

    </div>
@endif