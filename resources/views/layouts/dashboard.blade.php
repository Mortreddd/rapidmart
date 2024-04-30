

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/utils/sidebar.js'])

    </head>
    <body class=" font-sans antialiased transition-all duration-300 ease-out">

        {{-- ? UPDATE to <main id=content></main>
        *Implemented size limitation with max-w-screen-xl.
        *Aligned content to center using m-auto. --}}

        <main id="content" class="m-auto max-w-screen-xl h-full flex overflow-hidden">
            {{--  SIDE BAR --}}
            <aside id="sidebar" class="h-[100vh] width-transition grid-template-col-0 sticky top-0">
                @include('includes.sidebar')
            </aside>
            <div class="w-full min-h-full">
                @include('includes.header')
                <section class="w-full h-full bg-gray-300">
                    @yield('content')
                </section>
            </div>
            @yield('scripts')
        </main>
    </div>
    </body>
</html>
