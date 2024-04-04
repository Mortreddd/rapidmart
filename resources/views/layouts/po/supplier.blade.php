@extends('layouts.dashboard')
@section('content')

<div class="sm:p-1 min-w-[]">
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

{{-- Supplier Main Container --}}
<div class="sm:p-4 grid place-items-center h-fit w-full sm:bg-white sm:border-4 border-solid border-gray-500">
    {{-- Suppliers Cards Container --}}
<div class=" bg-blue-500 w-full h-fit sm:rounded-3xl p-2 sm:p-6" >
    {{-- Cards --}}
    @include('includes.PO.AddSupplier')
    <div class="flex flex-wrap justify-around">
    @include('includes.PO.Suppliercards')
    </div>

</div>
</div>
</div>

@endsection

@section('scripts')




@endsection

