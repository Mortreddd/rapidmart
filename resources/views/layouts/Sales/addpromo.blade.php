
@extends('layouts.dashboard')
@section('title', 'Add Promo')

@section('content')
<div class="w-full px-5 h-full py-6">
<form method="POST" action="{{ route('sales.addpromo.index') }}" id="form" class="w-full max-w-s p-6 bg-white border border-gray-200 rounded-lg shadow-md">
    @csrf
    @if($errors->any())
            <div class="mb-5 text-red-600 bg-red-100 border border-red-400 p-4 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="mb-5 grid grid-cols-6">
        <label class="text-gray-700 font-bold mb-5" for="code">
            Promo Code:
        </label>
        <input class="appearance-none border border-blue-500 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline col-span-5" id="code" name="code" type="text" placeholder="code can be mixed number and letters">
    </div> 

    <div class="mb-5 grid grid-cols-6">
        <label class="text-gray-700 font-bold mb-5 col-span-1" for="discount">
            Discount(%):
        </label>
        <input class="appearance-none border border-blue-500 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline col-span-5" id="discount" name="discount" type="text">
    </div>

    <div class="mb-5 grid grid-cols-6">
        <label class="text-gray-700 font-bold mb-5" for="product_name">
        Product:
        </label>
        <input class="appearance-none border border-blue-500 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline col-span-5" id="product_name" name="product_name" type="text">
    </div>


    <div class="mb-5 grid grid-cols-6">
        <label class="text-gray-700 font-bold mb-5" for="date_start">
        Duration Start:
        </label>
        <input class="appearance-none border border-blue-500 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline col-span-5" id="date_start" name="date_start" type="date">    
    </div>

    <div class="mb-5 grid grid-cols-6">
        <label class="text-gray-700 font-bold mb-5" for="valid_until">
            Valid Until:
        </label>
        <input class="appearance-none border border-blue-500 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline col-span-5" id="valid_until" name="valid_until" type="date">
    </div>

    <div class="flex items-center justify-end">
        <button class="bg-gray-700 hover:bg-red-900 text-white font-bold py-1 px-7 rounded focus:outline-none focus:shadow-outline mr-2" type="button" id="cancel">
        Cancel
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-7 rounded focus:outline-none focus:shadow-outline" type="submit" id="submit" name="submit">
        Save
        </button>
    </div>
    
</form>
</div>
@endsection
@section('scripts')
    <script>
        document.getElementById('submit').addEventListener('click', function(event) {
            document.getElementById('form').submit();
        });
        document.getElementById('cancel').addEventListener('click', function(event) {
            window.location.reload();
        });
    </script>
@endsection