<x-guest-layout>
    @section('title', 'Cart')
    <x-header />

    {{-- Frontend calculate total price & Qty --}}
    @php $total_price=0; $total_qty=0;  @endphp
    <div class="container mx-auto mt-10 cartRefresh"> {{-- cartRefresh for refresh in jquery --}}
        <div class="flex shadow-md my-10">
            <div class="w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">Items</h2>
                </div>
                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Price (RM)</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Total (RM)</h3>
                </div>
                <!-- Product -->
                @foreach ($cartItems as $item)
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 product_data">
                        {{-- Product Quantity Availabe --}}
                        <input class="max_product_qty" type="hidden" value="{{ $item->products->qty }}">
                        <div class="flex w-2/5">
                            <div class="w-30">
                                <img class="h-24" src="{{ asset('assets/uploads/product/' . $item->products->image) }}" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm">{{ $item->products->name }}</span>
                                <span class=" text-s">{{ $item->products->small_description }}</span>
                                <a class="delete-cart-item font-semibold hover:text-red-500 text-gray-500 text-xs cursor-pointer">Remove</a>
                            </div>
                        </div>
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        {{-- If product_ qty >= card_qty then not OUT OF STOCK --}}
                        @if ( $item->products->qty >= $item->prod_qty)
                            <!-- Quantity -->
                            <div class="flex justify-center w-1/5">
                                <!-- Decrement-btn -->
                                <button
                                    class="decrement-btn changeQty form-control text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800"
                                    type="button">-</button>
                                <input name="quantity" class="qty-input w-full px-5 py-2.5 text-center mr-2 mb-2" value="{{ $item->prod_qty }}">
                                <!-- Increment-btn -->
                                <button
                                    class="increment-btn changeQty text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800"
                                    type="button">+</button>                           
                            </div>
                            @else
                            <!-- Disabled Quantity -->
                            <div class="flex justify-center w-1/5">
                                <!-- Decrement-btn -->
                                <button
                                    class="hidden form-control text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800"
                                    type="button">-</button>
                                <input name="quantity" class="qty-input w-full px-5 py-2.5 text-center mr-2 mb-2" value="Out Of Stock">
                                <!-- Increment-btn -->
                                <button
                                    class="hidden text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800"
                                    type="button">+</button>                        
                            </div>
                        @endif
                        <span class="text-center w-1/5 font-semibold text-sm">{{ $item->products->selling_price }}</span>
                        <span class="text-center w-1/5 font-semibold text-sm">{{ $item->products->selling_price }}</span>
                    </div>
                        @php 
                            $total_price += $item->products->selling_price * $item->prod_qty; 
                            $total_qty += $item->prod_qty;  
                        @endphp
                @endforeach
                <!-- Product End -->

                <!-- Continue Shopping -->
                <a href="{{ route('homepage') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                        <path
                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                    </svg>
                    Continue Shopping
                </a>
            </div>
            <!-- Order Summary -->
            <div id="summary" class="w-1/4 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Items {{$total_qty}}</span>
                    <span class="font-semibold text-sm">RM {{$total_price}}</span>
                </div>
                <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
                    <select class="block p-2 text-gray-600 w-full text-sm rounded-md shadow-sm">
                        <option>Standard shipping - RM 10.00</option>
                    </select>
                </div>
                <div class="py-10">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
                    <input type="text" id="promo" placeholder="Enter your code"
                        class="p-2 text-sm w-full rounded-md shadow-sm">
                </div>
                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase rounded-md shadow-sm">Apply</button>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>RM  {{$total_price+10}} </span>
                    </div>
                    {{-- CheckOut Button --}}
                    @if (!$cartItems->first())
                        <button disabled onclick="location.href='{{ url('checkout') }}'" class="disabled:bg-slate-300 disabled:text-slate-500 disabled:border-slate-400 bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full rounded-md shadow-sm">
                            Checkout
                        </button>
                    @else
                        <button onclick="location.href='{{ url('checkout') }}'" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full rounded-md shadow-sm">
                            Checkout
                        </button>
                @endif
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-guest-layout>
