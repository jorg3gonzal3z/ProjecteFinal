<div class="col-12">
    <form class="float-right" action="{{ route('rallys.search') }}" method="GET">
        @csrf
        <div class="input-group">
        <div class="input-group-prepend">
            <button class="btn btn-danger" id="search-input">Buscar</button>
        </div>
        <input type="text" class="" name="search" placeholder="Palabras clave..." aria-label="Username" aria-describedby="search-input">
    </div>
    </form>
</div>

@isset($busqueda)
    <div class="col-12 ">
        <a href="{{route('rallys.index')}}" class="btn btn-secondary text white">Volver</a>
    </div>
@endisset

@isset($vacio)
    <div class="col-12 mt-5">
        <div class="alert alert-danger">No hay ninguna coincidencia</div>
    </div>
    <div class="col-12 ">
        <a href="{{route('rallys.index')}}" class="btn btn-secondary text white">Volver</a>
    </div>
@endisset