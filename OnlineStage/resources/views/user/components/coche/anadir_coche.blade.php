<!-- añadir coche -->
<!-- este boton abre el formulario para añadir coches -->
<button type="button" data-toggle="modal" data-target="#modalAddCar" class="btn btn-danger add_btn">Añadir Coche</button>

<div class="modal fade" id="modalAddCar" tabindex="-1" role="dialog" aria-labelledby="#modalAddCar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content " >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Añadir Coche!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <!-- formulario para añadir coches -->
                    
                    <form class="car_form" action="{{ route('user.add_car',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="box form-group row mt-4 justify-content-center">
                            <input type="file" name="fotos[]" id="file-addCar" class="inputfile inputfile-1"  data-multiple-caption="{count} fotos seleccionadas" multiple hidden />
                            <label for="file-addCar"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tus fotos&hellip;</span></label>
                            <span class="form-text text-white col-12 text-center">*Mínimo una foto y máximo seis.</span>
                        </div>

                        <div class="col-12 d-flex flex-wrap">

                            <div class="form-group col-12 col-md-6">
                                <label class="float-left text-white">Modelo</label>
                                <input type="text" class="form-control" name="modelo" placeholder="Peugeot 106 rally ...">
                            </div>
                            
                            <div class="form-group col-12 col-md-6">
                                <label class="float-left text-white">Potencia (hp)</label>
                                <input type="number" class="form-control potencia" name="potencia" placeholder="103 ...">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="float-left text-white">Peso (kg)</label>
                                <input type="number" class="form-control peso" name="peso" placeholder="890 ...">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="float-left text-white">Año</label>
                                <input type="number" class="form-control año" name="año" placeholder="1996 ...">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="float-left text-white">Tren Motriz</label>
                                <select class="form-control tr" name="tren_motriz" style="border-radius:10px">>
                                    <option value="FWD">FWD - Tracción Delantera</option>
                                    <option value="RWD">RWD - Tracción Trasera</option>
                                    <option value="4WD">4WD - Tracción Total</option>
                                </select>
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label class="float-left text-white">Categoria</label>
                                <select class="form-control cat" name="id_categoria" style="border-radius:10px">
                                    <option name="-- Selecciona una Categoria --" value="null">-- Selecciona una Categoria --</option>
                                    @foreach ($categorias as $categoria)
                                        <option name="{{$categoria->nomCategoria}}" value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- boton para mostrar las caraacteristicas de cada categoria -->
                            <div class="col-12 text-center text-white" id="ver_categorias" style="cursor:pointer;">
                                <p><u>Ver Caracteristicas de las Categorias</u></p>
                            </div>
                            
                            <div class="col-12 mt-3 text-left text-white"id="categorias" style="cursor:pointer;" hidden><b><u>Categorias:</u></b></div>

                            <div id="caracteristicas_categorias" class="row mt-3" hidden>
                                <div class="col-md-4 col-12">
                                    <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach ($categorias as $categoria)
                                        <a class="nav-link" id="v-pills-{{$categoria->id}}-tab" data-toggle="pill" href="#v-pills-{{$categoria->id}}" role="tab" aria-controls="v-pills-{{$categoria->id}}" aria-selected="true">{{$categoria->nomCategoria}}</a>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @foreach ($categorias as $categoria)
                                            <div class="tab-pane fade text-white text-left" id="v-pills-{{$categoria->id}}" role="tabpanel" aria-labelledby="v-pills-{{$categoria->id}}-tab">
                                                <ul>
                                                    @if($categoria->potenciaMax != null)<li>- Potencia Maxima: {{$categoria->potenciaMax}}hp</li>@endif
                                                    @if($categoria->trenMotriu != null)<li>- Tren Motriz: {{$categoria->trenMotriu}}</li>@endif
                                                    @if($categoria->pesMin != null)<li>- Peso Minimo: {{$categoria->pesMin}}kg</li>@endif
                                                    @if($categoria->any != null)<li>- El año de fabricacion ha de ser anterior a {{$categoria->any}}</li>@endif
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 col-12 ">
                                <div class="col-12 text-center alert alert-danger error_cat" hidden>
                                    La categoria seleccionada es incorrecta
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger submit_car" disabled>Añadir Coche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>