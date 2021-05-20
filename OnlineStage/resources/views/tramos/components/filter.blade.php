<!-- filtrado por el tipo de superficie -->
<div class="d-block ">
    @foreach ($superficies as $superficie)
        <div id="filtro_superficie " class="form-check">
            <input class="form-check-input" type="checkBox" name="flex{{$superficie->id}}" id="flexcheck{{$superficie->id}}">
            <label id="{{$superficie->id}}" class="form-check-label text-white" for="flexcheck{{$superficie->id}}">
                {{$superficie->tipus}}
            </label>
        </div>
    @endforeach
</div>
