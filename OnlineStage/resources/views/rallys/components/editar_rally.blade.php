<!-- si eres admin o dueño del rally podra eliminar, editar etc... -->
@if ($auth_user->rol == 'admin' || $auth_user->id == $rally->id_usuari)
    <!-- editar rally -->
    <a id="edit_rally:{{$rally->id}}" class="float-right pl-3 btn editButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
    <!-- eliminar rally -->
    <form id="delete_rally:{{$rally->id}}" class="float-right" style="color:red;" action="{{ route('rallys.destroy',['id' => $rally->id,'location' => 'rallys' ]) }}" method="POST">
        @csrf
        {{ method_field('DELETE') }}
        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
    </form>

    
    <!-- formulario de edicion de rallys si eres el organizador del mismo -->
    <form id="form_edit_rally:{{$rally->id}}" action="{{ route('rally.update',['id' => $rally->id,'location' => 'rallys'] ) }}" method="POST" enctype="multipart/form-data" hidden>
        @csrf
        {{ method_field('PUT') }}

        <a  id="esconder_form_edit:{{$rally->id}}" style="cursor:pointer; " class="mt-3 float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br><br>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Editar Rally</label>
        </div>
        <div class="row">
            <!-- fotografia del rally a editar -->
            @foreach ($fotos_rallys as $foto_rally)
                @if ($foto_rally->id_rallys == $rally->id)
                    @foreach ($fotos as $key => $foto)
                        @if($foto_rally->id_fotos == $foto->id)
                            <img class="mr-5" src="{{$foto->binari}}" alt="Foto tramo" width="200" height="200">
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div><br>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagenes</label>
            <div class="col-sm-10">
                <input type="file" name="fotos[]" multiple>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nom" value="{{$rally->nom}}">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Distancia Total en km</label>
            <div class="col-sm-10">
                <input class="form-control" id="distancia" name="distancia" value="{{$rally->distancia}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Numero Tramos Cronometrados</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="numTC" name="numTC" value="{{$rally->numTC}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Numero de Assistencias</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="numAssistencies" name="numAssistencies" value="{{$rally->numAssistencies}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Localizacion</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="localitzacio" name="localitzacio" value="{{$rally->localitzacio}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Numero de Plazas</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="numPlaces" name="numPlaces" value="{{$rally->numPlaces}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Superficie</label>
            <div class="col-sm-10">
                <select class="form-control" name="id_superficie" style="border-radius:10px">>
                    @foreach ($superficies as $superficie)
                        @if ($rally->id_superficie == $superficie->id)
                            <option selected value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                        @else
                            <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Categorias de coches que pueden participar</label>
            <div class="col-sm-10">
                <select class="form-control" name="categorias[]" style="border-radius:10px" multiple>
                    @foreach ($categorias_rallys as $categoria_rally)
                        @if ( $categoria_rally->id_rallys == $rally->id )
                            @foreach ($categorias as $categoria)
                                @if($categoria->id == $categoria_rally->id_categories)
                                    <option selected value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                @else
                                    <option value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <button class="btn btn-danger" >Submit</button>

    </form>
@endif