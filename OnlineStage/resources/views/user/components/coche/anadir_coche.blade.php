<!-- añadir coche -->
<!-- este boton abre el formulario para añadir coches -->
<div id="add_car" class="p-6 bg-white border-b border-gray-200">    
    <button type="button" class="btn btn-danger">Añadir Coche</button>
</div>
<!-- formulario para añadir coches -->
<div class="p-6 bg-white border-b border-gray-200">
    
    <!-- formulario para añadir coches -->
    
    <form id="car_form" action="{{ route('user.add_car',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data" hidden>
        @csrf
        <a  id="esconder_form_coche" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagenes</label>
            <div class="col-sm-10">
                <input type="file" name="fotos[]" multiple>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="modelo" placeholder="Peugeot 106 rally ...">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Potencia (hp)</label>
            <div class="col-sm-10">
            <input id="potencia" type="number" class="form-control" name="potencia" placeholder="103 ...">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Peso (kg)</label>
            <div class="col-sm-10">
            <input id="peso" type="number" class="form-control" name="peso" placeholder="890 ...">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Año</label>
            <div class="col-sm-10">
            <input id="año" type="number" class="form-control" name="año" placeholder="1996 ...">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tren Motriz</label>
            <div class="col-sm-10">
                <select id="tr" class="form-control" name="tren_motriz" style="border-radius:10px">>
                    <option value="FWD">FWD - Tracción Delantera</option>
                    <option value="RWD">RWD - Tracción Trasera</option>
                    <option value="4WD">4WD - Tracción Total</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
                <select id="cat" class="form-control" name="id_categoria" style="border-radius:10px">
                    @foreach ($categorias as $categoria)
                        <option name="{{$categoria->nomCategoria}}" value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                    @endforeach
                </select>
            </div>
            <small id="error_cat" class="alert alert-danger" hidden>La categoria seleccionada es incorrecta</small>
        </div>

        <!-- boton para mostrar las caraacteristicas de cada categoria -->
        <div id="ver_categorias" style="cursor:pointer;color:blue;">
            <p>Ver Caracteristicas de las Categorias</p>
        </div>

        
        <div id="categorias" style="cursor:pointer;" hidden><b>Categorias:</b></div>

        <div id="caracteristicas_categorias" class="row mt-3" hidden>
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($categorias as $categoria)
                    <a class="nav-link" id="v-pills-{{$categoria->id}}-tab" data-toggle="pill" href="#v-pills-{{$categoria->id}}" role="tab" aria-controls="v-pills-{{$categoria->id}}" aria-selected="true">{{$categoria->nomCategoria}}</a>
                    @endforeach

                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach ($categorias as $categoria)
                        <div class="tab-pane fade " id="v-pills-{{$categoria->id}}" role="tabpanel" aria-labelledby="v-pills-{{$categoria->id}}-tab">
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

        <button id="submit_car" class="btn btn-danger mt-3" disabled>Submit</button>

    </form>
</div>