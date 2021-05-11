@foreach ($rallys as $rally)

    @if (Auth::user())

        @include('rallys.components.editar_rally')

    @endif

    @include('rallys.components.mostrar_rally')

    @include('rallys.components.participantes_rally')

    @include('rallys.components.inscripcion_rally')


@endforeach