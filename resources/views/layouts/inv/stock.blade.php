@extends('layouts.dashboard')
@section('content')
    <div class=" h-fit  p-2">
        <nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 bg-gray-50 rounded-md ">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center font-medium text-[12px] sm:text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400  " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('stock.index') }}"
                            class="ms-1 text-lg text-gray-700 text-[12px] sm:text-lghover:text-secondary transition-colors duration-200 ease-in-out font-medium">Inventory</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Product
                            Stock</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div>
            <div class=" flex justify-between items-center w-full mb-4">
                <h1
                    class="text-sm font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">
                    Product Stock</h1>
                <div class="flex items-center">
                    <form class="flex items-center" action="{{ route('stock.index') }}" method="GET">
                        <div class="mr-2">
                            <select id="stock-filter" name="stock_filter"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-50 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Filter by: Stock</option>
                                <option value="low-stocks"
                                    {{ Request::get('stock_filter') == 'low-stocks' ? 'selected' : '' }}>Low Stocks</option>
                                <option value="out-of-stock"
                                    {{ Request::get('stock_filter') == 'out-of-stock' ? 'selected' : '' }}>Out of Stock
                                </option>
                                <option value="overstocked"
                                    {{ Request::get('stock_filter') == 'overstocked' ? 'selected' : '' }}>Overstocked
                                </option>
                            </select>
                        </div>

                        <div class="mr-2">
                            <select id="price-filter" name="price_filter"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-50 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Filter by: Price Range</option>
                                <option value="high-price"
                                    {{ Request::get('price_filter') == 'high-price' ? 'selected' : '' }}>High</option>
                                <option value="low-price"
                                    {{ Request::get('price_filter') == 'low-price' ? 'selected' : '' }}>Low</option>
                            </select>
                        </div>

                        <div class="mr-2">
                            <select id="category_filter" name="category_filter"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-50 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Filter by: Categories</option>

                                @forelse ($categories as $c)
                                <option value="{{ $c->id }}"
                                    {{ Request::get('category_filter') == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}</option>
                                @empty
                                    <option value="">Empty</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mr-2">
                            <select id="supplier_filter" name="supplier_filter"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-50 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Filter by: Suppliers</option>
                                @forelse ($suppliers as $s)
                                    <option value="{{ $s->id }}"  {{ Request::get('supplier_filter') == $s->id ? 'selected' : '' }}>{{ $s->company_name }}</option>
                                @empty
                                    <option value="">Empty</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" name="datasearch"
                                class="block p-2.5 w-64 z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Search..." value="{{ Request::get('datasearch') }}" />
                            <button type="submit"
                                class="absolute top-0 flex justify-center items-center end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>

                                <span class="ml-2">Filter</span>
                            </button>
                        </div>
                </div>
                </form>
            </div>



            <div class=" rounded-lg relative overflow-x-auto">

                <table class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class=" rounded-lg text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class=" border-b-2 border-blue-950">
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Picture
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Barcode ID
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4">
                                    <h6 class="action text-gray-900 whitespace-nowrap dark:text-white hover:text-blue-600 font-bold cursor-pointer w-fit "
                                        data-id='{{ $product->id }}'>{{ $product->product_name }}</h6>
                                </th>
                                <td class="mx-6 py-4">
                                    <img class=" w-[100px] h-[100px] border border-solid rounded-lg"
                                        src="{{ asset('storage/' . $product->image) }}" alt="">
                                </td>
                                <td class="px-6 py-4">


                                    <form class="max-w-xs mx-auto">
                                        <div class="relative flex items-center max-w-[8rem]">
                                            <button type="button" id="decrement-button{{ $product->id }}"
                                                data-input-counter-decrement="quantity-input{{ $product->id }}"
                                                data-id='{{ $product->id }}'
                                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="number" id="quantity-input{{ $product->id }}"
                                                data-input-counter data-input-counter-min="0" data-input-counter-max="999"
                                                min="0" max="999" aria-describedby="helper-text-explanation"
                                                class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="999" value="{{ $product->stocks }}" required disabled/>
                                            <button type="button" id="increment-button{{ $product->id }}"
                                                data-input-counter-increment="quantity-input{{ $product->id }}"
                                                data-id='{{ $product->id }}'
                                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>


                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->unit }}
                                </td>
                                <td class="px-6 py-4">
                                    ₱{{ $product->selling_price }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->barcode }}
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 text-center" colspan="6">Empty Data Set</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $products->onEachSide(4)->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(document).ready(function() {
            $('button[id^="decrement-button"]').click(function() {
                updateQuantity($(this));

            });

            $('button[id^="increment-button"]').click(function() {
                updateQuantity($(this));
            });

            function updateQuantity(button) {
                let inputField = button.attr('data-id');
                let stockInput = $('#quantity-input' + inputField);
                let newValue = parseInt(stockInput.val())
                let minValue = parseInt(stockInput.attr('data-input-counter-min'));
                let maxValue = parseInt(stockInput.attr('data-input-counter-max'));

                if (newValue >= minValue && newValue <= maxValue) {
                    stockInput.val(newValue);
                    updateDatabase(button.attr('data-id'), newValue);
                }
            }

            function updateDatabase(productId, quantity) {
                $.ajax({
                    url: '{{ route('stock.updateStock') }}',
                    type: 'POST',
                    data: {
                        pid: productId,
                        quantity: quantity
                    },
                    error: function(result) {
                        console.log(result)
                    },
                });
            }
        });
    </script>
@endsection
