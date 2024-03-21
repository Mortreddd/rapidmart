<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapid Mart</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/utils/eye-password.js'])
    </head>
    <body class="font-sans antialiased transition-all duration-300 ease-out">
        <main id="content" class="w-full h-[100vh] flex">
            <div class="flex w-full h-full">
                <section class="md:flex h-full hidden md:w-[50%] md:flex-col md:justify-center md:items-center">
                    {{-- Logo image here if big size screen else hide on mobile--}}
                    <div class="flex flex-col items-center w-auto login-house">
                        <img src="{{ asset('images/logo.png') }}" alt="Rapid Mart" class="object-cover xl:h-60 md:h-48 md:w-48 xl:w-60 mix-blend-multiply aspect-square" />
                        <img src="{{ asset('images/rapidmart-text.png') }}" alt="Rapid Mart" class="h-20 -translate-y-4 mix-blend-multiply" />
                        <img src="{{ asset('images/store-image.png') }}" alt="" class="object-contain xl:w-72 md:w-56 md:h-56 xl:h-72 bg-blend-multiply">
                    </div>
                </section>
                <section class="mx-auto h-full flex justify-center flex-col w-full md:px-0 px-10 md:w-[50%] bg-contain bg-right bg-no-repeat" style="background-image: url('{{ asset('images/bg-wave-login.png') }}')">
                    <form action="{{ route('login.verify') }}" method="post" class="w-full fade-in backdrop-blur-sm mx-auto space-y-6 rounded-lg md:p-10 md:w-96 xl:w-[26rem]">
                        @csrf
                        <img src="{{ asset('images/logo.png') }}" alt="logo" srcset="" class="object-cover mx-auto transition-all duration-300 ease-in-out bg-transparent min-h-36 max-h-44 lg:min-h-60 lg:max-h-72 xl:h-80 mix-blend-multiply aspect-square">
                        <div class="w-full space-y-3 h-fit">
                            <input type="email" name="email" placeholder="Email" @class(['text-input']) />
                            <div class="flex items-center w-full h-fit">
                                <input type="text" id="password" name="password" placeholder="Password" @class(['text-input']) />
                                <button id="eye-password" type="button" class="absolute text-sm translate-y-1 md:pr-3 right-5 md:right-10 text-secondary">
                                    {{-- open eye --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mx-auto md:w-6 md:h-6 open-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                    {{-- close eye --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mx-auto md:w-6 md:h-6 close-eye" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center justify-between w-full py-2">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" id="remember" name="remember" id="" class="w-4 h-4 rounded ring-1 ring-secondary accent-secondary border-primary hover:shadow-lg border-1 hover:p-3">
                                    <label for="remember" class="text-sm font-bold text-secondary">Remember Me</label>
                                </div>
                                <a href="#" class="text-sm font-bold transition-colors duration-300 ease-in-out text-secondary hover:text-secondary/80">
                                    Forgot Password?
                                </a>
                            </div>
                            <button type="submit" class="w-full py-2 text-white duration-300 ease-in-out bg-secondary transtiion-colors hover:bg-secondary/80">
                                Login
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </body>
</html>
