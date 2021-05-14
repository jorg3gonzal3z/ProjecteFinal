<!-- filtrado por el tipo de superficie -->
<div class="dropdown">

  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tipo de superficies
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

    <a class="dropdown-item" href="#">Tipo de superficie:</a>
    @foreach ($superficies as $superficie)
        <div id="filtro_superficie" class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label id="{{$superficie->id}}" class="form-check-label" for="flexRadioDefault1">
                {{$superficie->tipus}}
            </label>
        </div>
    @endforeach
    <button class="btn btn-danger mt-3" style="cursor:pointer;" id="eliminar_filtro">Eliminar filtros</button>

  </div>

</div>