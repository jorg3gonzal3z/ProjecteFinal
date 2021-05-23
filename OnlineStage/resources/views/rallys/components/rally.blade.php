<div class="d-flex flex-wrap">
@foreach ($rallys as $rally)
    <div class="col-12 col-md-6 col-lg-4 mt-4"> 


        @include('rallys.components.mostrar_rally')
    </div>  
@endforeach
</div>

<div class="d-flex justify-content-center m-5 col-12" id="pagination">
    {{ $rallys->links() }}
</div>