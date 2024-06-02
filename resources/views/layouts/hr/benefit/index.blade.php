@extends('layouts.dashboard')


@section('title', 'Deductions')


@section('content')


<div class="w-full h-full p-5">
    <nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="inline-flex items-center font-medium text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                    <svg class="w- h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('payroll.index', ['department_id' => 1]) }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Payroll Management</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('payroll.index', ['department_id' => 1]) }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Payrolls</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Benefits</span>
                </div>
            </li>
        </ol>
    </nav>  

    @foreach($benefits as $benefit)
    <form action="{{ route('benefit.update', ['benefit_id' => $benefit->id]) }}" method="post" id="{{$benefit->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        @csrf
        @method('PUT')
        <div  class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $benefit->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Update {{ $benefit->description }}</h3>
                
                    <div class="w-full my-3 text-left">
                        @error('description')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="description" class="block">Description</label>
                        <input type="text" name="description" autocomplete="off" value="{{ $benefit->description }}" id="description" placeholder="Description" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    <div class="w-full my-3 text-left">
                        @error('amount')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="amount" class="block">Amount</label>
                        <input type="number" name="amount" id="amount" value="{{ $benefit->amount }}" autocomplete="off" placeholder="Amount" class="w-auto outline-none focus:ring-1 focus:ring-secondary focus:border-none border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    <button data-modal-hide="{{$benefit->id}}" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </form>
@endforeach

    <div class="w-full p-4 h-fit bg-white rounded">
        <form action="{{ route('benefit.store') }}" method="post">
            @csrf
            <h3 class="mb-2 text-lg font-normal text-gray-500 dark:text-gray-400">Create new benefit</h3>
            <div class="w-full my-3 text-left">
                @error('description')
                    <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                @enderror
                <label for="description" class="block">Description</label>
                <input type="text" name="description" autocomplete="off" value="{{ old('description') }}" id="description" placeholder="Description" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
            </div>
            <div class="w-full my-3 text-left">
                @error('amount')
                    <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                @enderror
                <label for="amount" class="block">Amount</label>
                <input type="number" name="amount" id="amount" value="{{ old('amount') }}" autocomplete="off" placeholder="Amount" class="w-auto outline-none focus:ring-1 focus:ring-secondary focus:border-none border border-gray-500 placeholder:text-gray-700 rounded p-2">
            </div>
            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                Save
            </button>
        </form>
    </div>
    <table id="default-applicant-table" class="fade-in font-semibold text-md table-auto border text-white w-fit shadow">
        <caption class="text-gray-800 text-center">Benefits</caption>
        <thead class="bg-secondary">
            <tr class=" rounded-lg">
                <th class="px-3 py-2 rounded-tl-lg">Description</th>
                <th class="px-3 py-2">Amount</th>
                <th class="px-3 py-2 rounded-tr-lg">Action</th>
            </tr>
        </thead>
        <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
            @forelse($benefits as $benefit)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-3 py-2">{{ $benefit->description }}</td>
                        <td class="px-1 py-2 text-center">&#8369; {{ $benefit->amount }}</td>
                        <td class="px-3 py-2 font-bold text-center">
                            <button data-modal-target="{{$benefit->id}}" data-modal-toggle="{{$benefit->id}}" class="block m-auto text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg> 
                            </button> 
                        </td>
                    </tr>
            @empty
                <td colspan="3" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                    No benefits found
                </td>
            @endforelse
        </tbody>
    </table>
    

</div>

@if ( Session::has('created') )
    <x-toast.success>
        {{ Session::get('created') }}
    </x-toast.success>
    @elseif( Session::has('deleted') )
    <x-toast.success>
        {{ Session::get('deleted') }}
    </x-toast.success>
    @elseif( Session::has('rejected') )
    <x-toast.success>
        {{ Session::get('rejected') }}
    </x-toast.success>
    @elseif( Session::has('error') )
    <x-toast.danger>
        {{ Session::get('error') }}
    </x-toast.danger>
    @elseif( Session::has('success') )
    <x-toast.success>
        {{ Session::get('success') }}
    </x-toast.success>
    @endif


@endsection


@section('scripts')
    @parent
@endsection