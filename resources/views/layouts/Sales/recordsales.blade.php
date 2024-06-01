@extends('layouts.dashboard')
@section('title', 'Record Sales')

@section('content')
<div class="w-full px-5 h-full py-6">
    <form method="POST" action="{{ route('sales.store') }}" id="form" class="w-full max-w-s p-6 bg-white border border-gray-200 rounded-lg shadow-md">
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
        @if(session('success'))
            <div class="mt-4 bg-green-100 text-green-800 p-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-5 grid grid-cols-6">
                <label for="product" class="block text-gray-700">Product</label>
                <select name="product_id" id="product" class="mt-1 block w-full py-1 px-2 border border-blue-500 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Choose a Product </option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                            {{ $product->name }} - ₱{{ $product->price }}
                        </option>
                    @endforeach
                </select>
        </div>
        <div class="mb-5 grid grid-cols-6">
                <label for="quantity" class="block text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="mt-1 block w-full py-1 px-2 border border-blue-500 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-5 grid grid-cols-6">
        <label for="discount" class="block text-gray-700">Discount</label>
                <select name="discount_id" id="discount" class="mt-1 block w-full py-1 px-2 border border-blue-500 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" data-percent="0">No Discount</option>
                    @foreach($discounts as $discount)
                        <option value="{{ $discount->id }}" data-percent="{{ $discount->percent }}">
                            {{ $discount->type }} - {{ $discount->percent }}%
                        </option>
                    @endforeach
                </select>
        </div>

        <div class="mb-5 grid grid-cols-6">
        <label for="promo_id" class="text-gray-700 font-bold mb-5">Promo Code</label>
                <select name="promo_id" id="promo" class="mt-1 block w-full py-1 px-2 border border-blue-500 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" data-percent="0">No Promo</option>
                    @foreach($promo as $promos)
                        <option value="{{ $promos->id }}" data-percent="{{ $promos->percent }}">
                            {{ $promos->code }} - {{ $promos->percent }}%
                        </option>
                    @endforeach
                </select>
        </div> 
        <div class="mb-5 grid grid-cols-6">
                <label for="cash" class="block text-gray-700">Cash</label>
                <input type="number" name="cash" id="cash" class="mt-1 block w-full py-1 px-2 border border-blue-500 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="flex items-center justify-end">
            <div class="flex flex-col items-end">
                <p><strong>Total Amount:</strong> ₱<span id="total-amount">0.00</span></p>
                <p><strong>Discount Amount:</strong> ₱<span id="discount-amount">0.00</span></p>
                <p><strong>Promo Discount:</strong> ₱<span id="promo-amount">0.00</span></p>
                <p><strong>Final Amount:</strong> ₱<span id="final-amount">0.00</span></p>
                <p><strong>Change:</strong> ₱<span id="change-amount">0.00</span></p>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-2 py-1 px-7 rounded focus:outline-none focus:shadow-outline" type="submit" id="submit" name="submit">
                Record
                </button>
            </div>
            <br>
            
        </div>
        
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.getElementById('product');
            const quantityInput = document.getElementById('quantity');
            const discountSelect = document.getElementById('discount');
            const promoSelect = document.getElementById('promo');
            const cashInput = document.getElementById('cash');
            const totalAmount = document.getElementById('total-amount');
            const discountAmount = document.getElementById('discount-amount');
            const promoAmount = document.getElementById('promo-amount');
            const finalAmount = document.getElementById('final-amount');
            const changeAmount = document.getElementById('change-amount');

            function calculateAmounts() {
                const productPrice = productSelect.options[productSelect.selectedIndex].getAttribute('data-price');
                const quantity = quantityInput.value;
                const discountPercent = discountSelect.options[discountSelect.selectedIndex].getAttribute('data-percent');
                const promoPercent = promoSelect.options[promoSelect.selectedIndex].getAttribute('data-percent');
                const cash = cashInput.value;

                const total = productPrice * quantity;
                const discount = (discountPercent / 100) * total;
                const promo = (promoPercent / 100) * total;
                const final = total - discount - promo;
                const change = cash - final;

                totalAmount.innerText = total.toFixed(2);
                discountAmount.innerText = discount.toFixed(2);
                promoAmount.innerText = promo.toFixed(2);
                finalAmount.innerText = final.toFixed(2);
                changeAmount.innerText = change.toFixed(2);
            }

            productSelect.addEventListener('change', calculateAmounts);
            quantityInput.addEventListener('input', calculateAmounts);
            discountSelect.addEventListener('change', calculateAmounts);
            promoSelect.addEventListener('change', calculateAmounts);
            cashInput.addEventListener('input', calculateAmounts);
        });
</script>
@endsection