<!-- rallys del usuario -->
<a data-toggle="collapse" href="#collapseRallys" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseRallys">
    <br><div class="d-flex justify-content-between"><h4>Todos mis Rallys</h4><i class="fa fa-caret-down fa-2x"></i></div>
</a><br>
@if (count($rallys)>0)
    <div class="collapse" id="collapseRallys">
        @foreach($rallys as $rally)

            @include('user.components.rallys.edit_rally')

            @include('user.components.rallys.mostrar_rallys')

        @endforeach
    </div>

@else
    <!-- si el user no ha organizado ningun rally -->
    <div class="alert alert-danger text-center">
        <p>No has añadido ningun rally</p>
    </div>
@endif