<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
        <title>Rapid Mart</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased transition-all duration-300 ease-out">
        <main id="content" class="w-full h-[100vh] flex">
            <div class="flex w-full h-full justify-center items-center">
                <section class="mx-auto h-full flex justify-center flex-col w-full md:px-0 px-10 md:w-[50%] bg-contain bg-right bg-no-repeat">
                    <form action="{{ route('create.password.store') }}" method="post" class="w-full fade-in mx-auto space-y-6 rounded-lg md:p-7 bg-gray-100 md:w-96 xl:w-[26rem]">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        <div class="w-full space-y-3 h-fit">
                            <div class="flex items-center w-full h-fit">
                                @error('password')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                                <input type="text" id="password" name="password" placeholder="Password" @class(['text-input', 'rounded']) />
                                <button id="password" type="button" class="absolute text-sm translate-y-1 md:pr-3 right-5 md:right-10 text-secondary">
                                    {{-- open eye --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mx-auto md:w-6 md:h-6 password-open-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                    {{-- close eye --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mx-auto md:w-6 md:h-6 password-close-eye" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center w-full h-fit">
                                @error('password_confirmation')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" @class(['text-input', 'rounded']) />
                                <button id="confirm-password" type="button" class="absolute text-sm translate-y-1 md:pr-3 right-5 md:right-10 text-secondary">
                                    {{-- open eye --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mx-auto md:w-6 md:h-6 confirm-open-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                    {{-- close eye --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mx-auto md:w-6 md:h-6 confirm-close-eye" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                    </svg>
                                </button>
                            </div>
                            <button type="submit" class="w-full py-2 rounded text-white duration-300 ease-in-out bg-amber-500 transtiion-colors hover:bg-amber-600">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </main>
        <script>
            let passwordButton = document.getElementById("password");
            let passwordField = document.querySelector("#password");
            let confirmPasswordField = document.getElementById("password_confirmation");
            let confirmButton = document.getElementById("confirm-password");

            let passwordOpenEye = document.querySelector(".password-open-eye");
            let passwordCloseEye = document.querySelector(".password-close-eye");
            let confirmOpenEye = document.querySelector(".confirm-open-eye");
            let confirmCloseEye = document.querySelector(".confirm-close-eye");

            const checkPasswordVisibility = () => {
                if (passwordField.type !== "password") {
                    passwordField.type = "password";

                    passwordCloseEye.classList.add("hidden");
                    passwordOpenEye.classList.remove("hidden");
                }
                else {
                    passwordField.type = "text";

                    passwordOpenEye.classList.add("hidden");
                    passwordCloseEye.classList.remove("hidden");
                }
                
            }
            const checkConfirmPasswordVisibility = () => {

                if(confirmPasswordField.type !== "password") {
                    confirmPasswordField.type = "password";

                    confirmCloseEye.classList.add("hidden");
                    confirmOpenEye.classList.remove("hidden");
                } else {
                    confirmPasswordField.type = "text";

                    confirmOpenEye.classList.add("hidden");
                    confirmCloseEye.classList.remove("hidden");
                }
            }
            button.addEventListener("click", () => {
                checkPasswordVisibility();
            });
            confirmButton.addEventListener('click' () => {
                checkConfirmPasswordVisibility();
            })
            passwordButton.addEventListener('click', () => {
                checkPasswordVisibility();
            });

            checkPasswordVisibility()
            checkConfirmPasswordVisibility();
        </script>
    </body>
</html>
