<div class="col-md-12">

    <div class="card col-12 col-lg-12 mb-2">

        <div class="card-body">

            <!-- rallys del usuario -->
            <a data-toggle="collapse" href="#collapseRallys" style="color:black;" role="button" aria-expanded="false" aria-controls="collapseRallys">
                <h4 class="card-title text-center text-white">Todos mis Rallys<i class="fa fa-caret-down ml-2"></i></h4>
            </a>
            <div class="collapse" id="collapseRallys">
                <div class="d-flex flex-wrap">
                @if (count($rallys)>0)
                    @foreach($rallys as $rally)
                    <div class="col-12 col-md-6 col-lg-4 mt-4"> 

                        @include('user.components.rallys.edit_rally')

                        @include('user.components.rallys.mostrar_rallys')
                    </div>
                    @endforeach
                </div>
                @else
                    <!-- si el user no ha organizado ningun rally -->
                    <div class="alert alert-danger text-center">
                        <p>No has añadido ningun rally</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

</div>
