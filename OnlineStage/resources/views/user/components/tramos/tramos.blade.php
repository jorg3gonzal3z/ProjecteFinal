<!-- tramos compartidos por el usuario -->
<a data-toggle="collapse" href="#collapseTramos" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseTramos">
<br><div class="d-flex justify-content-between"><h4>Tramos Compartidos</h4><i class="fa fa-caret-down fa-2x"></i></div>
</a><br>

<section>
@if (count($tramos)>0)
    <div class="collapse" id="collapseTramos">
        @foreach ($tramos as $tramo)
        
            @include('user.components.tramos.edit_tramo')

            @include('user.components.tramos.mostrar_tramos')
        
        @endforeach
    </div>
@else
    <!-- si el user no ha compartido ningun tramo -->
    <div class="alert alert-danger">
        <p>No has añadido ningun tramo</p>
    </div>
@endif
</section>