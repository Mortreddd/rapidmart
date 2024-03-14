<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapid Mart</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/utils/eye-password.js', 'resources/js/utils/fade-in.js'])
    </head>
    <body id="body" class="font-sans antialiased transition-all duration-300 ease-out">
        <main class="w-full h-[100vh] md:flex block">
            <section class="md:flex h-full hidden md:w-[50%]">
                {{-- Logo image here if big size screen else hide on mobile--}}
            </section>
            <section class="mx-auto h-full flex justify-center flex-col w-full md:px-0 px-10 md:w-[50%]">
                <form id="form" action="{{ route('login.verify') }}" method="post" class="w-full p-3 mx-auto space-y-6 md:w-96">
                    @csrf
                    <h2 class="text-3xl font-bold text-center ">LOGIN</h2>
                    <div class="w-full space-y-3 h-fit">
                        <input type="email" value="" placeholder="Email" @class(['text-input', 'normal-input' => ! Session::has('email'), 'error-input' => Session::has('email') ]) />
                        <div class="flex items-center w-full">
                            <input type="password" value="" id="password" placeholder="Password" @class(['text-input', 'normal-input' => ! Session::has('password'), 'error-input' => Session::has('password') ])/>
                            <button id="eye-password" type="button" class="absolute right-0 p-2 text-gray-500 transition-colors ease-in-out -translate-x-4 bg-transparent rounded-full w-7 h-7 duration-colors">
                                {{-- open eye --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-auto open-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg>
                                {{-- close eye --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash close-eye" viewBox="0 0 16 16">
                                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                    <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                  </svg>
                            </button>
                        </div>
                        <div class="flex items-center justify-between w-full py-2">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" id="remember" name="remember" id="" class="w-4 h-4 rounded border-primary hover:shadow-lg border-1 hover:p-3">
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
        </main>
    </body>
</html>
