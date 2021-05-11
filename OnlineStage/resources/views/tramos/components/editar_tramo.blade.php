<!-- si el user esta logueado y es el dueño del tramo o tiene el rol de admin podra editar, eliminar... -->
<nav>
    <div class="nav nav-tabs" id="nav-tab{{$tramo->id}}" role="tablist">
        <style>.nav-link{color: white;}.nav-link.active{background-color: #DC3545 !important;color: white !important;}.nav-link:hover{color:white;}</style>
        <a class="nav-item nav-link active" id="nav-home-tab{{$tramo->id}}" data-toggle="tab" href="#nav-fotos{{$tramo->id}}" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-picture-o" aria-hidden="true"></i>  Fotos</a>
        <a class="nav-item nav-link" id="nav-profile-tab{{$tramo->id}}" data-toggle="tab" href="#nav-info{{$tramo->id}}" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-info-circle" aria-hidden="true"></i>  Info</a>
        @if (Auth::user())
            @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
                <!-- editar tramo -->
                <a id="edit_tramo:{{$tramo->id}}" class="nav-item nav-link text-danger bg-white editButton" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
                <!-- eliminar tramo -->
                <form id="delete_tramo:{{$tramo->id}}" class="nav-item nav-link bg-danger " style="color:red;" action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'tramos' ]) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="text-white"><i class="fa fa-trash-o"></i> Eliminar</button>
                </form>
            @endif
        @endif
    </div>
</nav>

@if (Auth::user())
    @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
    <div id="container_edit:{{$tramo->id}}" style="display:none;">
        <!-- formulario para editar tramos -->
        <form id="form_edit_tramo:{{$tramo->id}}" action="{{ route('tramos.update',[ 'id' => $tramo->id,'location' => 'tramos' ] ) }}" method="POST" enctype="multipart/form-data" hidden>
            @csrf
            {{ method_field('PUT') }}
            <a  id="esconder_form_edit:{{$tramo->id}}" style="cursor:pointer; " class="float-right pl-3" hidden >Volver <i class="fa fa-caret-up fa-2x"></i></a>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Editar Tramo</label>
            </div>
            <div class="row">
            <!-- fotografia del tramo a editar -->
            @foreach ($fotos_tramos as $foto_tramo)
                @if ($foto_tramo->id_trams == $tramo->id)
                    @foreach ($fotos as $foto)
                            @if($foto_tramo->id_fotos == $foto->id)
                            <div class="img_edit:{{$foto->id}} container_image_edit">
                                <img class="mr-5 image_edit" src="{{$foto->binari}}" alt="Foto tramo" width="200" height="200">
                                <div class="remove_img"><div class="x_img"><i class="fa fa-trash"></i></div></div>
                                <div id="tramo_id" hidden>{{$tramo->id}}</div>
                                <div id="foto_id" hidden>{{$foto->id}}</div>
                            </div>
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
                <input type="text" class="form-control" name="nom" value="{{$tramo->nom}}">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Distancia km</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="distancia" value="{{$tramo->distancia}}">
                </div>
            </div>

            <div class="form-group row" hidden>
                <label class="col-sm-2 col-form-label">Salida</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="sortida" value="{{$tramo->sortida}}">
                </div>
            </div>

            <div class="form-group row" hidden>
                <label class="col-sm-2 col-form-label">Final</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="final" value="{{$tramo->final}}">
                </div>
            </div>

            <div class="form-group row" >
                <label class="col-sm-2 col-form-label">Trayecto</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="adressa" value="{{$tramo->adressa}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Superficie</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_superficie" style="border-radius:10px">>
                        @foreach ($superficies as $superficie)
                            @if ($tramo->id_superficie == $superficie->id)
                                <option selected value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                            @else
                                <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <input type="text" id="imagenes_a_eliminar:{{$tramo->id}}" class="form-control" name="imagenes_a_eliminar[]" value="null" hidden readonly>

            <button class="btn btn-danger" >Update</button>

        </form>
    </div>
    @endif
@endif