<!-- filtrado por el tipo de superficie -->
<div id="filtros" class="col-12 col-lg-2">
    <ul class="sidebar-nav navbar-nav ">
        <li class="nav-item border-b border-red-500">
          <div class="">
              <form action="{{ route('tramos.search') }}" method="GET">
                  @csrf
                  <input class="rounded" style="width:100%;" type="text" name="search" placeholder="Palabras clave...">
                  <button style="width:100%;" class="btn btn-danger" >Buscar</button>
              </form>
          </div>
          @isset($vacio)
              <div class="col-12">
                  <div class="alert alert-danger">No hay ninguna coincidencia</div>
              </div>
          @endisset
        </li>
        
        <li class="nav-item">
            <span class="navbar-brand">Filtros</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-fw fa-calculator"></i> Calculator</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-fw fa-battery-3"></i> Battery </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-fw fa-database"></i> Pancake Batter</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-fw fa-clock-o"></i> Marzipan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-fw fa-tags"></i> Cakes and Muffins</a>
        </li>
        <li class="nav-item">
            <span class="navbar-brand">Categories</span>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"><i class="fa fa-fw fa-flask"></i> Cars</a>
            <ul class="sidebar-second-level collapse" id="collapseComponents">
                <li>
                    <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">American</a>
                    <ul class="sidebar-third-level collapse" id="collapseMulti2">
                        <li>
                            <a href="#">Ford</a>
                        </li>
                        <li>
                            <a href="#">GMC</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3">European</a>
                    <ul class="sidebar-third-level collapse" id="collapseMulti3">
                      <li>
                        @foreach ($superficies as $superficie)
                          <div id="filtro_superficie" class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label id="{{$superficie->id}}" class="form-check-label" for="flexRadioDefault1">
                                {{$superficie->tipus}}
                            </label>
                          </div>
                        @endforeach
                      </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- <div class="dropdown">

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

</div> -->