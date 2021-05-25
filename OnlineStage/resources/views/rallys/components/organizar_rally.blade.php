@if ($auth_user->rol == 'admin' || $auth_user->rol == 'organitzador')

    <div class="text-center">    
        <button id="add_rally" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAddRally">Organizar Rally  <i class="fa fa-plus"></i></button>
    </div>
    <div class="modal fade" id="modalAddRally" tabindex="-1" role="dialog" aria-labelledby="#modalAddRally" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content " >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Organizar Rally!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <!-- formulario para añadir rallys -->

                    <form id="form_add_rally" action="{{ route('rallys.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        
                        <div class="box form-group row mt-4 justify-content-center">
                            <input type="file" name="fotos[]" id="file-newRally" class="inputfile inputfile-1" data-multiple-caption="{count} fotos seleccionadas" multiple hidden />
                            <label for="file-newRally"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tus fotos&hellip;</span></label>
                            <span class="form-text text-white col-12 text-center">*Mínimo una foto y máximo seis.</span>
                        </div>

                        <div class="col-12 d-flex flex-wrap">

                            <div class="form-group col-12 col-md-6 ">
                                <label class=" text-center text-white">Nombre *</label>
                                <input type="text" class="form-control text-center" name="Nombre" placeholder="Nombre del Rally ...">                               
                            </div>
                            
                            <div class="form-group col-12 col-md-6">
                                <label class=" text-center text-white">Distancia Total en km *</label>                             
                                    <input type="number" class="form-control text-center" id="distancia" name="Distancia" placeholder="25 Km">
                            </div>

                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-center text-white">Numero Tramos Cronometrados *</label>
                                <input type="number" class="form-control text-center" id="numTC" name="n-TC" placeholder="8 ...">
                            </div>
                        
                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-center text-white">Numero de Assistencias *</label>
                                <input type="number" class="form-control  text-center" id="numAssistencies" name="n-Assistencias" placeholder="3 ...">
                            </div>

                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-center text-white">Localizacion *</label>
                                <input type="text" class="form-control text-center" id="localitzacio" name="Localizacion" placeholder="Vilafranca ...">
                            </div>

                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-center text-white">Numero de Plazas *</label>
                                <input type="number" class="form-control text-center" id="numPlaces" name="n-Plazas" placeholder="150 ...">
                            </div>

                            <div class="form-group col-12 col-md-6 ">
                                <label class="text-center text-white">Superficie *</label>         
                                <select class="form-control" name="Superficie" style="border-radius:10px">>
                                    @foreach ($superficies as $superficie)
                                        <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-12 text-center text-white">Categorias de coches que pueden participar *</label>
                            <div class="col-12 col-md-6 offset-md-3">
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