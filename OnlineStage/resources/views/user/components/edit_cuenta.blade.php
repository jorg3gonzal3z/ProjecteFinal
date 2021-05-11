<!-- si el user esta logueado se mostraran sus datos -->
<h4>Datos de la Cuenta</h4><br>
        
<!-- formulario edicion de cuenta usuario -->

<form class="" action="{{ route('user.update_user',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}

    <a  id="esconder_form" style="cursor:pointer; " class="float-right pl-3" hidden ><i class="fa fa-caret-up fa-2x"></i></i></a><br><br>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input id="name_user" type="text" name="name" value="{{$auth_user->name}}" style="border-radius:10px" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input id="email_user" type="email" name="email" value="{{$auth_user->email}}" style="border-radius:10px" disabled>
        </div>
    </div>
    <!-- solo se muestra si el usuario decide editar la cuenta -->
    <div class="form-group row" id="pass_user" hidden>
        <label class="col-sm-2 col-form-label">Contraseña</label>
        <div class="col-sm-10">
            <input type="password" name="pass" style="border-radius:10px" placeholder="12345678CR ...">
        </div>
    </div>
    <div class="form-group row" id="rpass_user" hidden>
        <label class="col-sm-2 col-form-label">Repite la Contraseña</label>
        <div class="col-sm-10">
            <input type="password" name="rpass" style="border-radius:10px" placeholder="12345678CR ...">
        </div>
    </div>
    <button id="update_cuenta" class="btn btn-danger" hidden>Update</button>
</form>

<button id="editar_cuenta" class="btn btn-danger">Editar Cuenta</button><br>
