<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ url('/css/hud.css') }}" />

<nav x-data="{ open: false }" style="opacity: .95;" class="sticky-top bg-dark border-b-2 border-red-600 p-3">
    <!-- Primary Navigation Menu -->
    <div class="topvar max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('tramos.index') }}">
                    <img class="logo" src="{{ url('storage/assets/logo.png') }}" width="150" height="150">
                </a>
            </div>
            <div class="flex justify-content-between">
                    <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                        <x-nav-link :href="route('tramos.index')" :active="request()->routeIs('tramos.index')">
                            {{ __('TRAMOS') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                        <x-nav-link :href="route('rallys.index')" :active="request()->routeIs('rallys.index')">
                            {{ __('RALLYS') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                        <x-nav-link :href="route('eventos.index')" :active="request()->routeIs('eventos.index')">
                            {{ __('EVENTOS') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                        <x-nav-link :href="route('sobre_nosotros.index')" :active="request()->routeIs('sobre_nosotros.index')">
                            {{ __('SOBRE NOSOTROS') }}
                        </x-nav-link>
                    </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center md:ml-6">
                @if (Auth::user())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                        
                            <button class="flex items-center text-sm font-medium text-red-500 hover:text-red-700 hover:border-gray-300 focus:outline-none focus:text-red-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        
                        </x-slot>
                        <x-slot name="content">

                            <!-- User Page -->
                            <form method="GET" action="{{ route('user.index') }}">
                                @csrf
                                <x-dropdown-link :href="route('user.index')">
                                    {{ __('Mi Cuenta') }}
                                </x-dropdown-link>
                            </form>

                            <!-- Admin Page -->
                            @if (Auth::user()->rol == "admin")
                            <form method="GET" action="{{ route('user.control') }}">
                                @csrf
                                <x-dropdown-link :href="route('user.control')">
                                    {{ __('Admin Control') }}
                                </x-dropdown-link>
                            </form>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log out') }}
                                </x-dropdown-link>
                            </form>


                        
                        </x-slot>

                    </x-dropdown>
                @else
                    <button class="flex items-center text-sm font-medium hover:text-red-700 hover:border-gray-300 focus:outline-none focus:text-red-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div><a class="text-white font-weight-bold" href="{{ route('login') }}">Inicia Sesión</a></div>
                        <div class="ml-3 btn btn-danger"><a class="text-decoration-none font-weight-bold" style="color:white;" href="{{ route('register') }}">Únete</a></div>
                    </button>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="col-mr-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-red-400 hover:text-red-500 hover:bg-dark-100 focus:outline-none focus:bg-dark-100 focus:text-red-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <!-- <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('INICIO') }}
            </x-responsive-nav-link>
        </div> -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('tramos.index')" :active="request()->routeIs('tramos.index')">
                {{ __('TRAMOS') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('rallys.index')" :active="request()->routeIs('rallys.index')">
                {{ __('RALLYS') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('eventos.index')" :active="request()->routeIs('eventos.index')">
                {{ __('EVENTOS') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('sobre_nosotros.index')" :active="request()->routeIs('sobre_nosotros.index')">
                {{ __('SOBRE NOSOTROS') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @if (Auth::user())
            <div class="pt-4 pb-1 border-t border-red-200">
                <div class="mt-3 space-y-1">
                    <!-- User Cars -->
                    <div class="flex justify-content-center">
                        <span class="font-medium text-center text-red-600">¡Hola {{ Auth::user()->name }}!</span>
                    </div>
                    <x-responsive-nav-link :href="route('user.index')">
                        <div class="block items-center pr-4">
                            <div class="font-medium text-sm text-red-500 ">Mi cuenta, {{ Auth::user()->email }}</div>
                        </div>
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-responsive-nav-link>
                    </form>



                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                            {{ __('Inicia Sesión') }}
                    </x-responsive-nav-link>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('register')">
                            {{ __('Únete') }}
                    </x-responsive-nav-link>
                </div>
            </div>
            
        @endif
    </div>
</nav>
