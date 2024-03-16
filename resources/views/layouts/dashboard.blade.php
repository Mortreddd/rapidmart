<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapid Mart</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/utils/sidebar.js'])
    </head>
    <body class="font-sans antialiased transition-all duration-300 ease-out">
        <main id="content" class="relative flex w-full h-[100vh]">
            {{--  SIDE BAR --}}
                <aside id="sidebar" class="h-full width-transition grid-template-col-0">
                    <div class="flex flex-col items-start w-full h-full overflow-x-hidden">
                        <div class="flex flex-col flex-wrap items-center h-full px-5 space-y-8 bg-white w-72">
                            <div class="flex items-center justify-center w-full h-20 py-3">
                                <img src="{{ asset('images/rapidmart-text.png') }}" alt="rapidmart" class="w-full h-fit mix-blend-multiply">
                            </div>
                            <div class="flex flex-col items-center w-full">
                                <img src="{{ asset('images/sample-image.jpg') }}" alt="" class="object-cover w-32 h-32 border-2 rounded-full border-secondary">
                            <h3 class="text-lg text-gray-700">Emmanuel Male</h3>
                        </div>
                        <ul class="flex flex-col w-full h-fit">
                            <li class="justify-between w-full">
                                <a href="" class="text-lg text-black">
                                    Dashboard
                                </a>
                            </li>
                            <li class="justify-between w-full">
                                <a href="" class="text-lg text-black">
                                    Dashboard
                                </a>
                            </li>
                            <li class="justify-between w-full">
                                <a href="" class="text-lg text-black">
                                    Dashboard
                                </a>
                            </li>
                            <li class="justify-between w-full">
                                <a href="" class="text-lg text-black">
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
            {{-- SIDE BAR --}}
            </div>
            <div class="w-full">
                <nav class="flex items-center justify-between w-full px-3 py-5 bg-secondary h-fit">
                    <button id="burger-button" class="inline-block cursor-pointer">
                        <div class='bar1'></div>
                        <div class='bar2'></div>
                        <div class='bar3'></div>
                    </button>
                    <ul class="flex items-center justify-end h-auto gap-5 w-fit">
                        <li>
                            <a href="">Hello</a>
                            <a href="">Hello</a>
                            <a href="">Hello</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>
    </body>
</html>
