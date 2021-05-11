<!-- editar tramo -->
<a id="edit_evento:{{$evento->id}}" class="btn float-right pr-3 editButton btn" style=" cursor:pointer;" ><i class="fa fa-pencil"></i> Editar</a>
<!-- eliminar evento -->
<form id="delete_evento:{{$evento->id}}" class="float-right btn btn-danger" action="{{ route('eventos.destroy',['id' => $evento->id,'location' => 'user' ]) }}" method="POST">
    @csrf
    {{ method_field('DELETE') }}
    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
</form><br><br>

<!-- formulario para editar eventos -->
<form id="form_edit_evento:{{$evento->id}}" action="{{ route('eventos.update',['id' => $evento->id,'location' => 'user' ] ) }}" method="POST" enctype="multipart/form-data" hidden>
    @csrf
    {{ method_field('PUT') }}
    <a  id="esconder_form_edit:{{$evento->id}}" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></a><br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Editar Evento</label>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Cartel</label>
        <div class="col-sm-10">
            <input type="file" name="logo">
        </div>
    </div>

    <input name="old_logo" value="{{$evento->logo}}" hidden></input>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nom" value="{{$evento->nom}}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tipo de Evento</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="tipus" value="{{$evento->tipus}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Numero de plazas</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="numPlaces" value="{{$evento->numPlaces}}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Localizacion</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="localitzacio" value="{{$evento->localitzacio}}">
        </div>
    </div>

    <button class="btn btn-danger" >Submit</button>

</form>