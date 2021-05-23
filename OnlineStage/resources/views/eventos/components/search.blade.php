<div class="col-12 mt-2">
    <form class="float-right" action="{{ route('eventos.search') }}" method="GET">
    @csrf
        <div class="input-group">
        <div class="input-group-prepend">
            <button class="btn btn-danger" id="search-input">Buscar</button>
        </div>
        <input type="text" class="" name="search" placeholder="Palabras clave..." aria-label="Username" aria-describedby="search-input">
    </div>
    </form>
</div>
@isset($vacio)
    <div class="col-12 mt-5">
        <div class="alert alert-danger">No hay ninguna coincidencia</div>
    </div>
@endisset