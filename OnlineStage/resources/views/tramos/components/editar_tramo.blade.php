<!-- si el user esta logueado y es el dueño del tramo o tiene el rol de admin podra editar, eliminar... -->
<nav>
    <div class="nav nav-tabs" id="nav-tab{{$tramo->id}}" role="tablist">
        <style>.nav-link{color: white; border: none!important;}.nav-link.active{background-color: #DC3545 !important;color: white !important;}.nav-link:hover{color:white;}</style>
        <a class="nav-item nav-link active" id="nav-home-tab{{$tramo->id}}" data-toggle="tab" href="#nav-fotos{{$tramo->id}}" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-picture-o" aria-hidden="true"></i><span class="d-none d-sm-inline">  Fotos</span></a>
        <a class="nav-item nav-link" id="nav-profile-tab{{$tramo->id}}" data-toggle="tab" href="#nav-info{{$tramo->id}}" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="d-none d-sm-inline">  Info</span></a>
        @if (Auth::user())
            @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
                <!-- editar tramo -->
                <a id="edit_tramo:{{$tramo->id}}" class="nav-item nav-link text-danger bg-white editButton" data-toggle="modal" data-target="#modal{{$tramo->id}}" style="cursor:pointer;" ><i class="fa fa-pencil"></i> <span class="d-none d-sm-inline">Editar</span></a>
                <!-- eliminar tramo -->
                <form id="delete_tramo:{{$tramo->id}}" class="nav-item nav-link bg-danger " style="color:red;" action="{{ route('tramos.destroy',['id' => $tramo->id,'location' => 'tramos' ]) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="text-white"><i class="fa fa-trash-o"></i> <span class="d-none d-sm-inline"> Eliminar</span></button>
                </form>
            @endif
        @endif
    </div>
</nav>

@if (Auth::user())
    @if ($tramo->id_usuari == $auth_user->id || $auth_user->rol == "admin")
    <div class="modal fade" id="modal{{$tramo->id}}" tabindex="-1" role="dialog" aria-labelledby="#modal{{$tramo->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Recuerda aplicar los cambios!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <h1 class="text-white fs-25" aria-hidden="true">&times;</h1>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <div id="container_edit:{{$tramo->id}}">
                        <!-- formulario para editar tramos -->
                        <form id="form_edit_tramo:{{$tramo->id}}" action="{{ route('tramos.update',[ 'id' => $tramo->id,'location' => 'tramos' ] ) }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            {{ method_field('PUT') }}
                            <!-- <a  id="esconder_form_edit:{{$tramo->id}}" style="cursor:pointer; " class="float-right pl-3" hidden >Volver <i class="fa fa-caret-up fa-2x"></i></a> -->

                            <div class="row justify-content-center">
                                <!-- fotografia del tramo a editar -->
                                @foreach ($fotos_tramos as $foto_tramo)
                                    @if ($foto_tramo->id_trams == $tramo->id)
                                        @foreach ($fotos as $foto)
                                                @if($foto_tramo->id_fotos == $foto->id)
                                                <div class="img_edit:{{$foto->id}} container_image_edit col-12 col-sm-6 col-md-4 mt-2">
                                                    <img class=" image_edit w-100 " src="{{$foto->binari}}" alt="Foto tramo" >
                                                    <div class="remove_img"><div class="x_img"><i class="fa fa-trash"></i></div></div>
                                                    <div id="tramo_id" hidden>{{$tramo->id}}</div>
                                                    <div id="foto_id" hidden>{{$foto->id}}</div>
                                                </div>
                                                @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            <div class="box form-group row mt-4 justify-content-center">
                                <input type="file" name="fotos[]" id="file_tramo-{{ $tramo->id }}" class="inputfile inputfile-1" data-multiple-caption="{count} fotos seleccionadas" multiple hidden/>
                                <label for="file_tramo-{{ $tramo->id }}"><i class="fa fa-upload" aria-hidden="true"></i> <span> Sube tus fotos&hellip;</span></label>
                            </div>
                            
                            <div class="col-12 d-flex flex-wrap">

                                <div class="form-group col-12 col-md-6">
                                    <label class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" name="Nombre" value="{{$tramo->nom}}">
                                </div>
                                
                                <div class="form-group col-12 col-md-6">
                                    <label class="col-form-label">Distancia (KM)</label>
                                    <input type="number" class="form-control" name="Distancia" value="{{$tramo->distancia}}">
                                </div>

                                <div class="form-group col-12 col-md-6" disabled>
                                    <label class="text-white">Trayecto</label>
                                    <input style="color:#343a40!important;box-shadow:2px 2px 5px red;" class="border rounded border-dark col-12 bg-white"type="text" value="{{$tramo->adressa}}" disabled>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="col-form-label">Superficie</label>
                                    <select class="form-control" name="Superficie" style="border-radius:10px">>
                                        @foreach ($superficies as $superficie)
                                            @if ($tramo->id_superficie == $superficie->id)
                                                <option selected value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                            @else
                                                <option value="{{$superficie->id}}">{{$superficie->tipus}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <input type="text" id="imagenes_a_eliminar:{{$tramo->id}}" class="form-control" name="imagenes_a_eliminar" value="null" hidden readonly>

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
    @endif
@endif
