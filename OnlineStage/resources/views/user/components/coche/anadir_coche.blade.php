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
            <input type="number" class="form-control" name="potencia" placeholder="103 ...">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Peso (kg)</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="peso" placeholder="890 ...">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Año</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="año" placeholder="1996 ...">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tren Motriz</label>
            <div class="col-sm-10">
                <select class="form-control" name="tren_motriz" style="border-radius:10px">>
                    <option value="FWD">FWD - Tracción Delantera</option>
                    <option value="RWD">RWD - Tracción Trasera</option>
                    <option value="4WD">4WD - Tracción Total</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
                <select class="form-control" name="id_categoria" style="border-radius:10px">>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button class="btn btn-danger" >Submit</button>

    </form>
</div>