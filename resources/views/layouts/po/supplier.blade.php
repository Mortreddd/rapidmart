@extends('layouts.dashboard')
@section('content')

<div class="sm:p-1 relative">


  <!-- Main modal -->
  <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden mt-16 fixed  z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-blue-400 rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Success
                  </h3>
                  <button id="close-s-Modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4">
                  <p class="text-base leading-relaxed text-black dark:text-gray-400">
                    New Supplier is Succesfully Added!
                  </p>
              </div>

          </div>
      </div>
  </div>

{{-- Form modall --}}
  <div id="form-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden mt-16 fixed  z-50 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full ">
    @include('includes.PO.AddSupplier')
   </div>


{{-- BreadCrumbs --}}
<nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 bg-gray-50 rounded-md ">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="inline-flex items-center font-medium text-[12px] sm:text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('supplier.index') }}" class="ms-1 text-lg text-gray-700 text-[12px] sm:text-lghover:text-secondary transition-colors duration-200 ease-in-out font-medium">Purchase Order</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
                <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Suppliers</span>
            </div>
        </li>
    </ol>
</nav>
{{-- Action button --}}
<div class="flex justify-end">

<button id="open-form" type="button" class="flex justify-center items-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
    <svg class="w-6 h-6 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
  </svg>
  Add Supplier</button>
</div>

{{-- Supplier Main Container --}}
<div class="sm:p-4 grid place-items-center h-fit w-full sm:bg-white sm:border-4 border-solid border-gray-500">
    {{-- Suppliers Cards Container --}}
<div class=" bg-blue-500 w-full h-fit sm:rounded-3xl p-2 sm:p-6" >
    {{-- Cards --}}

    <div class="flex flex-wrap justify-around">
    @include('includes.PO.Suppliercards')
    </div>

</div>
</div>
</div>

@endsection

@section('scripts')
@parent
@vite(['resources/js/Pojs/MainSupplier'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="module">
$(document).ready(() => {
    $('#open-form').on("click",() =>{

        new ms.openModal("form-modal");

    })

    $('#close-form').on("click",() =>{
        new ms.closeModal("form-modal");
    })





    $("#close-s-Modal").on("click", () => {
        new ms.closeModal("static-modal");
    });

    $("#storeSupplier").on("submit", (e) => {
        e.preventDefault();
        let formData = new FormData($("#storeSupplier")[0]);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

         new ms.hello('{{ route('supplier.store') }}',formData)
    });
});

</script>



@endsection

