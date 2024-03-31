@extends('layouts.dashboard')

@section('title', 'Promo Information')

@section('content')
<div class="w-full px-5 h-full py-6">
        <div class="pt-8 w-full flex justify-between items-center">
            <div class="w-fit mb-4 ml-auto">
                    <a href="" class="bg-secondary px-2 py-2 text-white rounded-md">Add Promo</a>
            </div>
        </div>
        <table id="default-promo-table" class="fade-in font-semibold text-md table-auto border text-white w-full shadow">
        @forelse($promo as $promos)
        <caption class="text-gray-800 text-center">Promo Information</caption> 
        <thead class="bg-secondary ">
                <tr class=" rounded-lg">
                    @if($promo->count()>1)
                        <th class="px-6 py-4">No Promo Available</th>
                    @else 
                        <th class="px-6 py-4 rounded-tl-lg">Promo Code</th>
                        <th class="px-6 py-4">Discount (%)</th>
                        <th class="px-6 py-4">Duration Start</th>
                        <th class="px-6 py-4">Valid Until</th>
                        <th class="px-6 py-4">Product</th>
                    @endif
                </tr>
            </thead>
            <tbody id="table-promo-body" class="bg-white text-center rounded-b-lg">
                
                
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-6 py-2">{{ $promos->code }}</td>
                        <td class="px-6 py-2">{{ $promos->discount }}</td>
                        <td class="px-6 py-2">{{ $promos->start ? \Carbon\Carbon::parse($promos->start)->format('d-M-y') : '' }}</td>
                        <td class="px-6 py-2">{{ $promos->end ? \Carbon\Carbon::parse($promos->end)->format('d-M-y') : '' }}</td>
                        <td class="px-6 py-2">{{ $promos->product }}</td>
                </tr>

                @empty
                    @for ($i = 1; $i <= 10; $i++)
                        @if($i == 5)
                            <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                                <td class="w-full py-2 text-center">No Promo Available</td>
                            </tr>
                            @continue
                        @endif
                        <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                        </tr>
                    @endfor
                @endforelse
            </tbody>
        </table>
        @if($promo->hasPages())
        <div class="py-3 flex justify-center items-center gap-4 h-fit fade-in">
                @if($promo->previousPageUrl())
                    <a href="{{ $sales->previousPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
                        Prev
                    </a>
                @else
                    <a href="" class="rounded hover:cursor-not-allowed px-4 py-2 pointer-events-none border-gray-700 bg-gray-100 hover:bg-gray-200 font-sans transition-colors duration-300 ease-in-out">
                        Prev
                    </a>
                @endif
                <div class="w-auto px-2 h-fit">
                    <span class="text-sm text-gray-700 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-900">{{ $sales->firstItem() }}</span> to <span class="font-semibold text-gray-900">{{ $sales->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $sales->total() }}</span> Entries
                    </span>
                </div>
                @if($promo->nextPageUrl())
                    <a href="{{ $sales->nextPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
                        Next
                    </a>
                @else
                    <a href="" class="rounded hover:cursor-not-allowed px-4 py-2 pointer-events-none border-gray-700 bg-gray-100 hover:bg-gray-200 font-sans transition-colors duration-300 ease-in-out">
                        Next
                    </a>
                @endif
            </div>
        @endif
    </div>
<div>
@endsection