<!-- editar coche -->
<a id="edit_coche:{{$coche->id}} " class=" edit-btn btn btn-secondary float-right ml-3 text-white" data-toggle="modal" data-target="#modalcar{{$coche->id}}" style="cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar coche -->
<form id="delete_coche:{{$coche->id}}" class="float-right" action="{{ route('user.destroy_car',['id' => $coche->id]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
</form>

<div class="modal fade" id="modalcar{{$coche->id}}" tabindex="-1" role="dialog" aria-labelledby="#modal{{$coche->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content " >
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Recuerda aplicar los cambios!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-danger" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">

                <!-- formulario para editar coches -->
                <form id="car_form_edit:{{$coche->id}}" class="edit_car_button" action="{{ route('user.update_car',['id' => $coche->id] ) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="d-flex flex-wrap">
                        @php
                            $control_fotos = 0;
                        @endphp
                        <!-- fotografia del coche a editar -->
                        @foreach ($fotos_coches as $foto_coche)
                            @if ($foto_coche->id_cotxes == $coche->id)
                                @php
                                    $control_fotos ++ ;
                                @endphp
                                @foreach ($fotos as $foto)
                                        @if($foto_coche->id_fotos == $foto->id)
                                        <!-- las imagenes no se muestran todas de la misma medida juli ayuda :( -->
                                        <div class="mt-4 container_image_edit col-12 col-md-2">
                                            <img class=" image_edit" src="{{$foto->binari}}" alt="Foto coche" width="200" height="200">
                                            <div class=" remove_img"><div class="x_img"><i class="fa fa-trash"></i></div></div>
                                        </div>
                                        @endif
                                @endforeach
                            @endif
                        @endforeach

                        <!-- imagenes vacias si hay menos de 5 fotos del coche -->
                        @for ( $i = $control_fotos; $i < 6; $i ++ )
                            <img class="mt-4 col-12 col-md-2 " src="{{URL::asset('storage/assets/add_image.jpg')}}" alt="Foto vacia" >
                        @endfor
                    </div>

                    <div class="box form-group row mt-4 justify-content-center">
                        <input type="file" name="fotos[]" id="file_coche-{{$coche->id}}" class="inputfile inputfile-1" data-multiple-caption="{count} fotos seleccionadas" multiple hidden />
                        <label for="file_coche-{{$coche->id}}"><i class="fa fa-upload" aria-hidden="true"></i> <span class="text-white"> Sube tus fotos&hellip;</span></label>
                    </div>

                    <div class="col-12 d-flex flex-wrap">

                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Modelo</label>
                            <input type="text" class="form-control" name="modelo" value="{{$coche->model}}">
                        </div>
                        
                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Potencia (hp)</label>
                            <input id="potencia_edit:{{$coche->id}}" type="number" class="form-control " name="potencia"  value="{{$coche->potencia}}">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Peso (kg)</label>
                            <input id="peso_edit:{{$coche->id}}" type="number" class="form-control " name="peso"  value="{{$coche->pes}}">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Año</label>
                            <input id="año_edit:{{$coche->id}}" type="number" class="form-control " name="año"  value="{{$coche->any}}">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Tren Motriz</label>
                            <select id="tr_edit:{{$coche->id}}" class="form-control " name="tren_motriz" style="border-radius:10px">
                                @if ($coche->trenMotriu == "FWD")
                                <option value="FWD" selected>FWD - Tracción Delantera</option>
                                @else
                                <option value="FWD">FWD - Tracción Delantera</option>
                                @endif
                                @if ($coche->trenMotriu == "RWD")
                                <option value="RWD" selected>RWD - Tracción Trasera</option>
                                @else
                                <option value="RWD">RWD - Tracción Trasera</option>
                                @endif
                                @if ($coche->trenMotriu == "4WD")
                                <option value="4WD" selected>4WD - Tracción Total</option>
                                @else
                                <option value="4WD">4WD - Tracción Total</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="text-white">Categoria</label>
                            <select id="cat_edit:{{$coche->id}}" class="form-control " name="id_categoria" style="border-radius:10px">>
                                @foreach ($categorias as $categoria)
                                    @if ( $coche->id_categoria == $categoria->id )
                                        <option name="{{$categoria->nomCategoria}}" value="{{$categoria->id}}" selected>{{$categoria->nomCategoria}}</option>
                                    @else
                                        <option name="{{$categoria->nomCategoria}}" value="{{$categoria->id}}">{{$categoria->nomCategoria}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="mt-2 col-12 ">
                        <div id="error_cat_edit:{{$coche->id}}" class="col-12 text-center alert alert-danger" hidden>
                            La categoria seleccionada es incorrecta
                        </div>
                    </div>

            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="submit_car_edit:{{$coche->id}}" class="btn btn-danger ">Aplicar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>