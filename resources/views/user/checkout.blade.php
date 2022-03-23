<x-guest-layout>
    @section('title', 'Checkout')
    <x-header />

    <section>
        <h1 class="sr-only">Checkout</h1>

        <div class="relative mx-auto max-w-screen-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="py-12 bg-gray-50 md:py-24">
                    <div class="max-w-lg px-4 mx-auto lg:px-8">
                        <!-- Breadcrumb -->
                        <div class="text-sm breadcrumbs">
                            <ul>
                            <li><a href="{{ route('homepage') }}">Home</a></li> 
                            <li><a href="{{ route('view.cart') }}">Cart </a></li> 
                            <li class="text-xl font-extrabold text-gray-900">Checkout</li>
                            </ul>
                        </div>
                        <div class="mt-8">
                            <p class="mt-1 text-sm text-gray-500">For the purchase of</p>
                        </div>

                        <div class="mt-12">
                            <div class="flow-root">
                                <ul class="-my-4 divide-y divide-gray-200">
                                    <!-- Product List -->
                                    @foreach ($cartItems as $item)
                                    <li class="flex items-center justify-between py-4">
                                        <div class="flex items-start">
                                            <img class="flex-shrink-0 object-cover w-16 h-16 rounded-lg" src="{{ asset('assets/uploads/product/' . $item->products->image) }}" alt="img" />

                                            <div class="ml-4">
                                                <p class="text-sm">{{ $item->products->name }}</p>

                                                <dl class="mt-1 space-y-1 text-xs text-gray-500">
                                                    <div>
                                                        <dt class="inline">Color:</dt>
                                                        <dd class="inline">X</dd>
                                                    </div>

                                                    <div>
                                                        <dt class="inline">Size:</dt>
                                                        <dd class="inline">X</dd>
                                                    </div>
                                                </dl>
                                            </div>
                                        </div>
                                        {{-- Price & Quantity --}}
                                        <div>
                                            <p class="text-sm">RM {{ $item->products->selling_price }}
                                                <small class="text-gray-500">x{{ $item->prod_qty }}</small>
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-12 bg-white md:py-24">
                    <div class="max-w-lg px-4 mx-auto lg:px-8">
                        <form class="grid grid-cols-6 gap-4" action="{{ url('place-order') }}" method="POST">
                            {{ csrf_field() }}
                            {{-- First Name --}}
                            <div class="col-span-3">
                                <label class="block mb-1 text-sm text-gray-600" for="first_name">First Name</label>
                                <input value="{{Auth::user()->name}}"  class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="text" name="fname" required/>
                            </div>
                            {{-- Last Name --}}
                            <div class="col-span-3">
                                <label class="block mb-1 text-sm text-gray-600" for="last_name">Last Name</label>
                                <input value="{{Auth::user()->lname}}" class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="text" name="lname" required/>
                            </div>
                            {{-- Email --}}
                            <div class="col-span-6">
                                <label class="block mb-1 text-sm text-gray-600" for="email">Email</label>
                                <input value="{{Auth::user()->email}}"  class="disabled:bg-slate-50 disabled:text-slate-500 rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="email" name="email" required/>
                            </div>
                            {{-- Phone --}}
                            <div class="col-span-6">
                                <label class="block mb-1 text-sm text-gray-600" for="phone">Phone</label>
                                <input value="{{Auth::user()->phone}}" class="rounded-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="tel" name="phone" required/>
                            </div>
                            {{-- Address --}}
                            <div class="col-span-6">
                                <label class="block mb-1 text-sm text-gray-600" for="address">Address</label>
                                <input value="{{Auth::user()->address1}}" class="rounded-t-lg shadow-sm border-gray-200 w-full text-sm p-2.5" type="text" name="address1" required/>
                                <input value="{{Auth::user()->address2}}" class="rounded-b-lg  border-gray-200 w-full text-sm p-2.5 " type="text" name="address2" required/>
                            </div>
                            {{-- Billing Address --}}
                            <fieldset class="col-span-6">
                                <legend class="block mb-1 text-sm text-gray-600">
                                    Billing Address
                                </legend>
                                {{-- Country --}}
                                <div class="-space-y-px bg-white rounded-lg shadow-sm">
                                    <div>
                                        <label class="sr-only">Country</label>
                                        <select class="border-gray-200 relative rounded-t-lg w-full focus:z-10 text-sm p-2.5" name="country" autocomplete="country-name" value="{{Auth::user()->country}}" required>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Wales">Wales</option>
                                            <option value="Scotland">Scotland</option>
                                            <option value="France">France</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Japan">Japan</option>
                                        </select>
                                    </div>
                                    <!-- City -->
                                    <div>
                                        <label class="sr-only" for="city">City</label>
                                        <input value="{{Auth::user()->city}}" class="border-gray-200 relative  w-full focus:z-10 text-sm p-2.5 placeholder-gray-400" type="text" name="city" placeholder="City" required/>
                                    </div>
                                    <!-- State -->
                                    <div>
                                        <label class="sr-only" for="state">State</label>
                                        <input value="{{Auth::user()->state}}" class="border-gray-200 relative  w-full focus:z-10 text-sm p-2.5 placeholder-gray-400" type="text" name="state" id="state" placeholder="State" required/>
                                    </div>

                                    <div>
                                        <label class="sr-only" for="zipcode">ZIP/Post Code</label>
                                        <input value="{{Auth::user()->zipcode}}" class="border-gray-200 relative rounded-b-lg w-full focus:z-10 text-sm p-2.5 placeholder-gray-400" type="text" name="zipcode" autocomplete="zipcode" placeholder="ZIP/Post Code" required/>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="col-span-6">
                                <button class="rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-indigo-600 hover:bg-indigo-700 text-sm p-2.5 text-white w-full block" type="submit">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <x-footer />
</x-guest-layout>
