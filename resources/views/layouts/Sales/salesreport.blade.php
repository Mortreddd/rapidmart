@extends('layouts.dashboard')

@section('title', 'Daily Sales Report')

@section('content')
<div class="w-full px-5 h-full py-6">
        <div class="pt-8 w-full flex justify-between items-center">
            <div class="w-fit mb-4 ml-auto">
                    <a href="{{ route('sales.create') }}" class="bg-secondary px-2 py-2 text-white rounded-md">Record Sale</a>
            </div>
        </div>
        <table id="default-sales-table" class="fade-in font-semibold text-md table-auto border text-white w-full shadow">
        <caption class="text-gray-800 text-center">Daily Sales Report</caption> 
        <thead class="bg-secondary ">
                <tr class=" rounded-lg">
                    <th class="px-4 py-4 rounded-tl-lg">Receipt #</th>
                    <th class="px-6 py-4 ">Date</th>
                    <th class="px-6 py-4">Product</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">Quantity Sold</th>
                    <th class="px-6 py-4">Unit Price</th>
                    <th class="px-6 py-4">Discount</th>
                    <th class="px-6 py-4">Promo</th>
                    <th class="px-6 py-4">Cash</th>
                    <th class="px-6 py-4">Change</th>
                    <th class="px-6 py-4">Total Sales</th>
                </tr>
            </thead>
            <tbody id="table-sales-body" class="bg-white text-center rounded-b-lg">
                
                @forelse($sales as $sale)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-4 py-4">{{ $sale->id }}</td>
                        <td class="px-6 py-2">{{ $sale->created_at->format('d-M-y') }}</td>
                        <td class="px-6 py-2">{{ $sale->product_name}}</td>
                        <td class="px-6 py-2">{{ $sale->category_name }}</td>
                        <td class="px-6 py-2">{{ $sale->quantity }}</td>
                        <td class="px-6 py-2">{{ $sale->price }}</td>
                        <td class="px-6 py-2">{{ $sale->discount ?? 0 }}</td>
                        <td class="px-6 py-2">{{ $sale->promo ?? 0 }}</td>
                        <td class="px-6 py-2">{{ $sale->cash }}</td>
                        <td class="px-6 py-2">{{ $sale->change }}</td>
                        <td class="px-6 py-2">{{ $sale->amount }}</td>
                </tr>

                @empty
                    @for ($i = 1; $i <= 10; $i++)
                        @if($i == 5)
                            <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                                <td class="w-full py-2 text-center">No Recorded Sales</td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                                <td class="px-6 py-2"></td>
                            </tr>
                            @continue
                        @endif
                    @endfor
                @endforelse
            </tbody>
        </table>
        @if($sales->hasPages())
        <div class="py-3 flex justify-center items-center gap-4 h-fit fade-in">
                @if($sales->previousPageUrl())
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
                @if($sales->nextPageUrl())
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
@endsection('content')