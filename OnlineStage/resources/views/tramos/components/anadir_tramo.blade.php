<!-- si el usuario esta logueado o es admin puede añadir tramos, este boton abre un formulario -->
<div>
    <button id="add_tramo" class="add_btn btn btn-danger text-white" data-toggle="modal" data-target="#modalAfegir">Comparte un tramo <i class="fa fa-plus"></i></button>
</div>
<div class="modal fade" id="modalAfegir" tabindex="-1" role="dialog" aria-labelledby="#modalAfegir" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title text-white" style="font-size: 28px;" id="exampleModalCenterTitle">Compartir tramo</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <h1 class="text-white fs-25" aria-hidden="true">&times;</h1>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <div class="d-flex flex-wrap">
                        <div id='map' class="col-12 col-lg-6" style='height: 600px;' ></div>

                        <!-- formulario para añadir tramos -->
                        
                        <form id="form_add_tramo" class="text-white col-12 col-lg-6" action="{{ route('tramos.store',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="box form-group row mt-4 justify-content-center">
                                <input type="file" name="fotos[]" id="file-newTramo" class="inputfile inputfile-1" data-multiple-caption="{count} fotos seleccionadas" multiple hidden />
                                <label for="file-newTramo"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tus fotos&hellip;</span></label>
                                <span class="form-text text-white col-12 text-center">*Mínimo una foto y máximo seis.</span>
                            </div>  

                            <div class="form-group">
                                <label class="">Nombre *</label>
                                <input type="text" class="form-control" name="nom" placeholder="Nombre del Tramo ...">
                                <span class="form-text text-white">Describe el tramo en unas pocas palabras.</span>
                            </div>

                            <div class="form-group">
                                <label class="text-white">Superficie *</label>
                                    <select class="form-control" name="id_superficie" style="border-radius:10px">
                                        @foreach ($superficies as $superficie)
                                            <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-white ">Selecciona la superfície en la que se disfruta mas este tramo.</span>

                            </div>
                            
                            <hr>
                            <div class="d-flex ">
                                <span class="form-text text-center col-12 text-white">Usa el mapa interactivo para definir los parametros de tu tramo.</span>
                            </div>
                            <div class="form-group" >
                                <label class="">Distancia (Km)</label>
                                <div class="">
                                    <input readonly class="form-control" id="distancia" name="distancia" placeholder="Kilometros...">
                                </div>
                            </div>

                            <div class="form-group" hidden>
                                <label class="">Salida</label>
                                <div class="">
                                <input readonly type="text" class="form-control" id="sortida" name="sortida" >
                                </div>
                            </div>

                            <div class="form-group" hidden>
                                <label class="col-sm-2 col-form-label">Final</label>
                                <div class="col-sm-10">
                                <input readonly type="text" class="form-control" id="final" name="final" placeholder="El Vendrell ...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">Trayecto</label>
                                <div class="">
                                <input readonly type="text" class="form-control" id="adressa" name="adressa">
                                </div>
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
</div>