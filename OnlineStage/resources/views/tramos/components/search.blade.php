<div class="col-12 mt-2">
    <form class="float-right" action="{{ route('tramos.search') }}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Search..">
        <button class="btn btn-danger" >Search</button>
    </form>
</div><br>

@isset($vacio)
    <div class="col-12 mt-5">
        <div class="alert alert-danger">No hay ninguna coincidencia</div>
    </div>
@endisset