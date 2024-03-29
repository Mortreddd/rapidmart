<div id="success-toast" class="gap-5 bg-green-500 bottom-5 left-5 sticky flex items-center w-fit border-green-600 text-md text-white rounded-lg  py-3 px-5">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
      
    {{ $slot }}    
    <button type="button" id="created-toast" class="bg-transparent hover:text-gray-300 rounded-lg text-white transition-colors duration-200 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>

@section('scripts')
    @parent
    @vite(['resources/js/utils/toast/success.js'])
@endsection