@if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
    <div class="p-6 bg-dark border-red-500 text-center">    
        <button id="add_rally" type="button" class="btn btn-danger">Organizar Rally</button>
    </div>

    <!-- formulario para añadir rallys -->
    <div id="container_animacion" style="display:none;">

        <form id="form_add_rally" action="{{ route('rallys.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
            @csrf
            <a  id="esconder_form" style="cursor:pointer; " class="mt-3 float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Organizar Rally</label>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Imagenes</label>
                <div class="col-sm-10">
                    <input type="file" name="fotos[]" multiple>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="nom" placeholder="Nombre del Rally ...">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Distancia Total en km</label>
                <div class="col-sm-10">
                    <input class="form-control" id="distancia" name="distancia" placeholder="25 Km">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Numero Tramos Cronometrados</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="numTC" name="numTC" placeholder="8 ...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Numero de Assistencias</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="numAssistencies" name="numAssistencies" placeholder="3 ...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Localizacion</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="localitzacio" name="localitzacio" placeholder="Vilafranca ...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Numero de Plazas</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="numPlaces" name="numPlaces" placeholder="150 ...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Superficie</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_superficie" style="border-radius:10px">>
                        @foreach ($superficies as $superficie)
                            <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Categorias de coches que pueden participar</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categorias[]" style="border-radius:10px" multiple>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn btn-danger" >Submit</button>

        </form>
    </div>
    
@endif