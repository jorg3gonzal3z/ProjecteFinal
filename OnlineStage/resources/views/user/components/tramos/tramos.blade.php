<div class="col-md-12">

<div class="card-container col-12 col-lg-12 mb-2">

    <div class="card-body">
        <!-- tramos compartidos por el usuario -->
        <a data-toggle="collapse" href="#collapseTramos" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseTramos">
            <h4 class="card-title text-center text-white">Tramos Compartidos <i class="fa fa-caret-down ml-2"></i></h4>
        </a>

        <section>
        <div class="collapse" id="collapseTramos">
            @if (count($tramos)>0)
                
                @foreach ($tramos as $tramo)
                
                    @include('user.components.tramos.mostrar_tramos')
                
                @endforeach
                
            @else
                <!-- si el user no ha compartido ningun tramo -->
                <div class="alert alert-danger text-center">
                    <p>No has añadido ningun tramo</p>
                </div>
            @endif
        </div>
        </section>
    </div>

</div>

</div>