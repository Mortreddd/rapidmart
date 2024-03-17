<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapid Mart</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/utils/sidebar.js'])
    </head>
    <body class="font-sans antialiased transition-all duration-300 ease-out">
        <div id="loading" class="fixed top-0 left-0 items-center justify-center hidden w-full h-full">
            <div class='flex items-center justify-center w-full h-full space-x-2 bg-black dark:invert'>
                <span class='sr-only'>Loading...</span>
                <div class='h-8 w-8 bg-primary rounded-full animate-bounce [animation-delay:-0.3s]'></div>
                <div class='h-8 w-8 bg-primary rounded-full animate-bounce [animation-delay:-0.15s]'></div>
                <div class='w-8 h-8 rounded-full bg-primary animate-bounce'></div>
            </div>
        </div>
        <main id="content" class="flex w-full h-[100vh]">
            {{--  SIDE BAR --}}
            <aside id="sidebar" class="h-full width-transition grid-template-col-0">
                @include('includes.sidebar')
            </aside>
            {{-- SIDE BAR --}}
            <div class="w-full h-full">
                <nav class="flex items-center justify-between w-full px-3 py-5 bg-secondary h-fit">
                    <button id="burger-button" class="inline-block cursor-pointer">
                        <div class='bar1'></div>
                        <div class='bar2'></div>
                        <div class='bar3'></div>
                    </button>
                    <ul class="flex items-center justify-end h-auto gap-5 w-fit">
                    </ul>
                </nav>
            </div>
        </main>
    </body>
</html>
