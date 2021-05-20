<div class="col-md-12">

    <div class="mt-3 card col-12 col-mb-12 col-lg-12  mb-2">

        <div class="card-body">
            <!-- coches del usuario -->
            <a data-toggle="collapse" href="#collapseCars" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseCars">
                <h4 class="card-title text-center text-white">Todos mis Coches <i class="fa fa-caret-down"></i></h4>
            </a>

            <div class="border-gray-200">

                <!-- variable para controlar si el user ha añadido coches -->
                @php
                    $have_cars=false;
                @endphp

                <div class="collapse" id="collapseCars">

                    <!-- recorrer todos los coches -->
                    @foreach ($coches as $coche)
                        <!-- si el id del user coincide con el id_usuari de algun coche -->
                        @if ($coche->id_usuari == $auth_user->id)
                            <!-- el user ha añadido coches -->
                            @php
                                $have_cars=true;
                            @endphp

                            @include('user.components.coche.edit_coches')

                            @include('user.components.coche.mostrar_coches')
                            
                        @endif
                    @endforeach

                    

                    <!-- si el user no ha añadido coches -->
                    @if($have_cars == false)
                    <div class="alert alert-danger">
                        <p>No has añadido ningun coche</p>
                    </div>
                    @endif 
                    
                </div>

            </div>
        </div>
    </div>
</div>

@include('user.components.coche.anadir_coche')