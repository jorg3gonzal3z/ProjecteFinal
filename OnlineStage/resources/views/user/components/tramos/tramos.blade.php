<div class="col-md-12">
<!-- tramos compartidos por el usuario -->
<a data-toggle="collapse" href="#collapseTramos" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseTramos">
    <div class="text-center"><h4>Tramos Compartidos <i class="fa fa-caret-down"></i></h4></div>
</a>

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

</div>