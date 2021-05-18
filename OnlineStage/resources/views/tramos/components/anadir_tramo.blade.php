<!-- si el usuario esta logueado o es admin puede añadir tramos, este boton abre un formulario -->
<div class="p-6 bg-dark border-red-500 text-center">    
    <button id="add_tramo" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAfegir">Compartir Tramo</button>
</div>

<div class="modal fade" id="modalAfegir" tabindex="-1" role="dialog" aria-labelledby="#modalAfegir" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Recuerda aplicar los cambios!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <h1 class="text-white fs-25" aria-hidden="true">&times;</h1>
                    </button>
                </div>
                <div class="modal-body p-5 d-flex flex-wrap">
                    <div id='map' class="col-12 col-md-6" style='' ></div>

                    <!-- formulario para añadir tramos -->
                    
                    <form id="form_add_tramo" class="text-danger col-12 col-md-6" action="{{ route('tramos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Añadir Tramo</label>
                        </div>

                        <div class="box form-group row mt-4">
                            <input type="file" name="fotos[]" id="file-newTramo" class="inputfile inputfile-1" data-multiple-caption="{count} fotos seleccionadas" multiple />
                            <label for="file-newTramo"><i class="fa fa-upload" aria-hidden="true"></i> <span> Sube tus fotos&hellip;</span></label>
                        </div>

                        <div class="form-group">
                            <label class="">Nombre</label>
                            <input type="text" class="form-control" name="nom" placeholder="Nombre del Tramo ...">
                            <small id="nombreHelp" class="form-text text-muted">Describe el tramo en unas pocas palabras.</small>
                        </div>
                        
                        <div class="form-group " >
                            <label class="col-sm-2 col-form-label">Distancia km</label>
                            <div class="col-sm-10">
                                <input readonly class="form-control" id="distancia" name="distancia" placeholder="25 Km">
                            </div>
                        </div>

                        <div class="form-group" hidden>
                            <label class="col-sm-2 col-form-label">Salida</label>
                            <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="sortida" name="sortida" placeholder="La Bisbal del Penedès ...">
                            </div>
                        </div>

                        <div class="form-group" hidden>
                            <label class="col-sm-2 col-form-label">Final</label>
                            <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="final" name="final" placeholder="El Vendrell ...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Trayecto</label>
                            <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="adressa" name="adressa">
                            </div>
                        </div>

                        <div class="form-group">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Superficie</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_superficie" style="border-radius:10px">>
                                    @foreach ($superficies as $superficie)
                                        <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-danger" >Submit</button>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" >Aplicar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>