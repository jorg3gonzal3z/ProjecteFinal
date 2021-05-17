<x-app-layout>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/hud.css') }}" /> 
<link rel="stylesheet" href="{{ url('/fontawesome4/css/font-awesome.min.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('header')
        </h2>
    </x-slot>
    <div id="loading">
        <!-- <img  src="{{ asset('/storage/assets/loading.gif')}}" alt="Loading..." /> -->
        <img id="loading-image" src="{{ asset('/storage/assets/loading.svg')}}" aria-label="loading">
    </div>  
    <div>
            <div class="bg-dark shadow-sm sm:lg">
                @yield('content')
            </div>
    </div>

    <footer>
        <div class="wrapper">
            <div class="icon facebook">
                <div class="tooltip">Facebook</div>
                <span><i class="fa fa-facebook" aria-hidden="true"></i></span>
            </div>
            <div class="icon twitter">
                <div class="tooltip">Twitter</div>
                <span><i class="fa fa-twitter" aria-hidden="true"></i></span>
            </div>
            <div class="icon instagram">
                <div class="tooltip">Instagram</div>
                <span><i class="fa fa-instagram" aria-hidden="true"></i></span>
            </div>
            <div class="icon github">
                <div class="tooltip">Github</div>
                <span><i class="fa fa-github" aria-hidden="true"></i></span>
            </div>
            <div class="icon youtube">
                <div class="tooltip">Youtube</div>
                <span><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
            </div>
        </div>
    </footer>


    <button style="z-index: 10;" id="back-to-top" type="button">
        <img class="img-fluid d-none d-md-block" src="{{ url('/storage/assets/up-arrow.png')}}">
    </button>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{ url('/js/hud.js') }}"></script>

</x-app-layout>

