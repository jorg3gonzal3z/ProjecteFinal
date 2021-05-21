<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/storage/assets/flag.png')}}" />
        <title>{{'TC-1 Online Rallys'}}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    <style>
        .demo_wrap img {
            position: fixed;
            left: 15%;
            top: 30%;
            width: 70%;
            opacity: 0.6;
            z-index: -1;
            padding: 0;
            margin: 0;
        }
        
        .bg-1-dark{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #343a40;
            z-index: -2;
        }
    </style>
    <div class="demo_wrap">
        <img src="{{ url('storage/assets/logo.png') }}">
    </div>
    <div class="bg-1-dark"></div>
    </body>

</html>
