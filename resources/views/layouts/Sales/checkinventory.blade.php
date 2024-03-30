@extends('layouts.dashboard')

@section('title', 'Product Availability')

@section('content')
<div class="w-full px-5 h-full py-6">
        <div class="pt-8 w-full flex justify-between items-center">
            <div class="w-fit">
                <form action="{{ route('sales.checkinventory.search') }}" method="get" class="flex w-96 items-center gap-3">
                <input type="search" name="search" value = "{{ request('search') }}" id="search-products-input" placeholder="Search Product..." class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-primary block w-full p-2.5" autocomplete="off"/>
                    @csrf
                    <button id="search-product-button" type="button" class="rounded-lg p-2 transition-colors duration-200 ease-in-out bg-secondary hover:bg-secondary/80 text-white ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <table id="default-inventory-table" class="fade-in font-semibold text-md table-auto border text-white w-full shadow">
        <caption class="text-gray-800 text-center">Product Availability</caption>
        @forelse($products as $product)
        <thead class="bg-secondary ">
                <tr class=" rounded-lg">
                    
                    @if($products->count()>1)
                        <th class="w-full py-2 text-center">Products search does not exist</td>
                    @else 
                        <th class="px-6 py-4 rounded-tl-lg">Product Code</th>
                        <th class="px-6 py-4">Product Name</th>
                        <th class="px-6 py-4">Product Category</th>
                        <th class="px-6 py-4">Unit Price</th>
                        <th class="px-6 py-4">Activity of Products</th>
                    @endif
                </tr>
            </thead>
            <tbody id="table-inventory-body" class="bg-white text-center rounded-b-lg">
                
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-6 py-2">{{ $product->product_id }}</td>
                        <td class="px-6 py-2">{{ $product->product_name}}</td>
                        <td class="px-6 py-2">{{ $product->category_name }}</td>
                        <td class="px-6 py-2">{{ $product->price }}</td>
                        <td class="px-6 py-2">
                            @if($product->stock > 0)
                                Active  
                            @else 
                                Out of Stock
                            @endif 
                        </td>
                </tr>
                @empty
                    @for ($i = 1; $i <= 10; $i++)
                        @if($i == 5)
                            <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                                <td class="w-full py-2 text-center">No available Products</td>
                                <td class="w-full py-2 text-center"></td>
                                <td class="w-full py-2 text-center"></td>
                                <td class="w-full py-2 text-center"></td>
                                <td class="w-full py-2 text-center"></td>
                            </tr>
                            @continue
                        @endif
                    @endfor
                
            </tbody>
            @endforelse
        </table>
        @if($products->hasPages())
        <div class="py-3 flex justify-center items-center gap-4 h-fit fade-in">
                @if($products->previousPageUrl())
                    <a href="{{ $products->previousPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
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
                @if($products->nextPageUrl())
                    <a href="{{ $products->nextPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-products-input')

        searchInput.addEventListener('input', function () {
            const searchValue = this.value
            const maxChars = 50
            
            if (searchValue.length > maxChars) {
                this.setCustomValidity(`Search term cannot exceed ${maxChars} characters.`)
            } else {
                this.setCustomValidity('')
            }
        })
    })
</script>
@endsection