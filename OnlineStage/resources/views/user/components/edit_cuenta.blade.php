
    
    <div class="mt-3 card-container  mb-2">

        <div class="card-body">
            
            <h4 class="card-title text-center text-white">Datos de la Cuenta</h4><hr>
            
            <div class="col-12 d-flex flex-wrap text-center">
                <div class="form-group col-12 col-md-6">
                    <label class="text-white ">Nombre</label>
                    <input class="form-control rounded text-center"type="text"value="{{$auth_user->name}}"  >
                </div>
                <div class="form-group col-12 col-md-6">
                    <label class="text-white">Email</label>
                    <input class="form-control rounded text-center" type="email"value="{{$auth_user->email}}" >
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-secondary edit-btn-cuenta" data-toggle="modal" data-target="#modalEditUser"><i class="fa fa-pencil"></i> Editar</button>
                <!-- eliminar user -->
                <form class="ml-2" action="{{ route('user.destroy',['id' => $auth_user->id, 'location' => 'user_view' ]) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar Cuenta</button>
                </form>
            </div>

        </div>
    
    </div>      
    
    <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="#modalEditUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark" >
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">¡Recuerda aplicar los cambios!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <!-- formulario edicion de cuenta usuario -->
                    <form action="{{ route('user.update_user',['id' => $auth_user->id] ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="col-12 d-flex flex-wrap">

                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Nombre</label>
                                <input class="form-control rounded" id="name_user" type="text" name="name" value="{{$auth_user->name}}"  >
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class="text-white">Email</label>
                                <input class="form-control rounded" id="email_user" type="email" name="email" value="{{$auth_user->email}}" >
                            </div>
                            <div class="form-group col-12 col-md-6" id="pass_user" >
                                <label class="text-white">Contraseña</label>
                                <input class="form-control rounded" type="password" name="pass" placeholder="12345678CR ...">
                            </div>
                            <div class="form-group col-12 col-md-6" id="rpass_user" >
                                <label class="text-white">Repite la Contraseña</label>
                                <input class="form-control rounded" type="password" name="rpass" placeholder="12345678CR ...">
                            </div>

                        </div>
                </div>
                
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" >Aplicar Cmabios</button>
                    </form>   
                </div>
            </div>
        </div>
    </div>
    


