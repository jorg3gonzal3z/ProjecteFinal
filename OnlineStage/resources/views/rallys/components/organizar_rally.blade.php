@if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')
    <div class="p-6 bg-dark border-red-500 text-center">    
        <button id="add_rally" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAddRally">Organizar Rally</button>
    </div>
    <hr>
    <div class="modal fade" id="modalAddRally" tabindex="-1" role="dialog" aria-labelledby="#modalAddRally" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">¡Organizar Rally!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <!-- formulario para añadir rallys -->

                    <form id="form_add_rally" action="{{ route('rallys.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        
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
                            <label class="col-sm-6 col-form-label">Distancia Total en km</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="distancia" name="distancia" placeholder="25 Km">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Numero Tramos Cronometrados</label>
                            <div class="col-sm-5">
                            <input type="number" class="form-control" id="numTC" name="numTC" placeholder="8 ...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Numero de Assistencias</label>
                            <div class="col-sm-5">
                            <input type="number" class="form-control" id="numAssistencies" name="numAssistencies" placeholder="3 ...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Localizacion</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="localitzacio" name="localitzacio" placeholder="Vilafranca ...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-7 col-form-label">Numero de Plazas</label>
                            <div class="col-sm-5">
                            <input type="number" class="form-control" id="numPlaces" name="numPlaces" placeholder="150 ...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Superficie</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_superficie" style="border-radius:10px">>
                                    @foreach ($superficies as $superficie)
                                        <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Categorias de coches que pueden participar</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="categorias[]" style="border-radius:10px" multiple>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                    @endforeach
                                </select>
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