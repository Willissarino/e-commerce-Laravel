<x-guest-layout>
    @section('title', 'User Dashboard')
    <x-header/>
    {{-- Header-2 --}}
    <div class="border-b border-gray-200">
        <div class="flex items-center justify-between h-16 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
            <div class="flex items-center">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    User Dashboard
                </h2>
            </div>
        </div>
    </div>


<!-- Profile -->
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-16 lg:max-w-none">
                
                {{-- Profile --}}
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                        <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        {{-- Update User Detail --}}
                        <form action="{{ url('update-user-detail') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                {{-- First Name --}}
                                <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input value="{{Auth::user()->name}}" type="text" name="fname" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md " required >
                                </div>
                                {{-- Last Name --}}
                                <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input value="{{Auth::user()->lname}}" type="text" name="lname" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md " required>
                                </div>
                                {{-- Email --}}
                                <div class="col-span-6 sm:col-span-2">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input value="{{Auth::user()->email}}" type="text" name="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                {{-- Phone --}}
                                <div class="col-span-6 sm:col-span-2">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input value="{{Auth::user()->phone}}" type="text" name="phone" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                {{-- Country --}}
                                <div class="col-span-6 sm:col-span-2">
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <select name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Wales">Wales</option>
                                    <option value="Scotland">Scotland</option>
                                    <option value="France">France</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Japan">Japan</option>
                                </select>
                                </div>
                                {{-- Address --}}
                                <div class="col-span-6">
                                    <label for="address-1" class="block text-sm font-medium text-gray-700">Address 1</label>
                                    <input value="{{Auth::user()->address1}}" type="text" name="address1" autocomplete="address-1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                <div class="col-span-6">
                                    <label for="address-2" class="block text-sm font-medium text-gray-700">Address 2</label>
                                    <input value="{{Auth::user()->address2}}" type="text" name="address2" autocomplete="address-2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                {{-- City --}}
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input value="{{Auth::user()->city}}" type="text" name="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                {{-- State / Province --}}
                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                                <input value="{{Auth::user()->state}}" type="text" name="state" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                {{-- ZIP / Postal code --}}
                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                <input value="{{Auth::user()->zipcode}}" type="text" name="zipcode" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                            </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                
                {{-- Border --}}
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                
                {{-- Order Details here --}}
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Order Details</h3>
                        <p class="mt-1 text-sm text-gray-600">See your list of orders.</p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            {{-- Table --}}
                            <fieldset>
                                <div class="overflow-x-auto">
                                    <table class="table table-zebra w-full">
                                      <!-- Head -->
                                      <thead class="border-b border-gray-200">
                                        <tr>
                                            <th>Order Date</th>
                                            <th>Tracking Number</th>
                                            <th>Order Total (RM)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <!-- Row -->
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->tracking_no }}</td>
                                                <td>{{ $item->total_price }}</td>
                                                <td>{{ $item->status == '0' ? 'Pending' : 'Shipped' }}</td>
                                                <td>
                                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                            </fieldset>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      


    <x-footer />
</x-guest-layout>
