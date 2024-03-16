
@extends('layouts.dashboard')

@section('loading')

    <div class='flex items-center justify-center w-full h-full space-x-2 bg-black dark:invert'>
        <span class='sr-only'>Loading...</span>
        <div class='h-8 w-8 bg-primary rounded-full animate-bounce [animation-delay:-0.3s]'></div>
        <div class='h-8 w-8 bg-primary rounded-full animate-bounce [animation-delay:-0.15s]'></div>
        <div class='w-8 h-8 rounded-full bg-primary animate-bounce'></div>
    </div>
@endsection