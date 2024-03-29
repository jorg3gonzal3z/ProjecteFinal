<form class="form-inline"  action="{{ route('tramos.search') }}" method="GET">
    @csrf
    <div class="input-group">
        <div class="input-group-prepend">
            <button class="btn btn-danger" id="search-input">Buscar</button>
        </div>
        <input type="text" class="" name="search" placeholder="Palabras clave..." aria-label="Username" aria-describedby="search-input">
    </div>
</form>

@isset($busqueda)
    <div class="mb-2">
        <a href="{{route('tramos.index')}}" class="btn btn-secondary text white">Volver</a>
    </div>
@endisset

@isset($vacio)
    <div class="">
        <div class="alert alert-danger">No hay ninguna coincidencia...</div>
    </div>
    <div class="mb-2">
        <a href="{{route('tramos.index')}}" class="btn btn-secondary text white">Volver</a>
    </div>
@endisset