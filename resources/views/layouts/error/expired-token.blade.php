<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
        <title>Token Expired</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased transition-all duration-300 ease-out">
        <main id="content" class="w-full h-[100vh] flex justify-center items-center bg-slate-300">
            <div class="w-fit h-fit text-center space-y-5 flex items-center flex-col gap-4">
                <div class="w-full h-fit space-y-6 rounded-lg p-7">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 mx-auto h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <h1 class="text-3xl font-bold text-center text-gray-800">Expired Token</h1>
                    <p class="text-lg text-center text-gray-600">The token has expired. Please request a new one.</p>
                </div>
                <a href="{{ route('login') }}" class="w-full py-2 px-5 transition-colors duration-200 esae-in-out bg-secondary hover:bg-secondary/80 text-center text-white rounded-md">Request New Token</a>
            </div>
        </main>
    </body>
</html>
