<!-- coches del usuario -->
<a data-toggle="collapse" href="#collapseCars" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseCars">
    <br><div class="d-flex justify-content-between"><h4>Todos mis Coches</h4><i class="fa fa-caret-down fa-2x"></i></div>
</a>

<div class="p-6 border-gray-200">

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

    </div>

    <!-- si el user no ha añadido coches -->
    @if($have_cars == false)
    <div class="alert alert-danger">
        <p>No has añadido ningun coche</p>
    </div>
    @endif 

</div>

@include('user.components.coche.anadir_coche')