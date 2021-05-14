<x-guest-layout>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ url('/css/hud.css') }}" /> 
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                <img src="{{ url('storage/logo.png') }}" width="200" height="200">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <x-slot name="carbg">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/car.css') }}" /> 
            <div class="car">
                <div class="body">
                    <div class="mirror-wrap">
                        <div class="mirror-inner">
                            <div class="mirror">
                                <div class="shine"></div>
                            </div>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="top">
                            <div class="line"></div>
                        </div>
                        <div class="bottom">
                            <div class="lights">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bumper">
                        <div class="top"></div>
                        <div class="middle" data-numb="&#2348;&#2366; &#2415;&#2411; &#2330; &#2415;&#2411;&#2415;&#2411;"></div>
                        <div class="bottom"></div>
                    </div>
                </div>
                <div class="tyres">
                    <div class="tyre back"></div>
                    <div class="tyre front"></div>
                </div>
            </div>
            <div class="road-wrap">
                <div class="road">
                    <div class="lane-wrap">
                        <div class="lane">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
