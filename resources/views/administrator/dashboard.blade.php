<x-administrator-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Logged in as {{ Auth::user()->name }}
                </div>
            </div>
            {{-- Stats --}}
            <div class="mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Stats</h3>
                <dl
                    class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">Total Customer</dt>
                        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                {{ count($users) }}
                                <span class="ml-2 text-sm font-medium text-gray-500"> from 0 </span>
                            </div>

                            <div
                                class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                <!-- Heroicon name: solid/arrow-sm-up -->
                                <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only"> Increased by </span>
                                {{ (count($users) - 0) * 100 }}%
                            </div>
                        </dd>
                    </div>

                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">Total Product</dt>
                        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                {{ count($products) }}
                                <span class="ml-2 text-sm font-medium text-gray-500"> from 2 </span>
                            </div>

                            <div
                                class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                <!-- Heroicon name: solid/arrow-sm-up -->
                                <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only"> Increased by </span>
                                {{ (count($products) - 2) * 100 }}%
                            </div>
                        </dd>
                    </div>

                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">Total Order</dt>
                        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                {{ count($orders) }}
                                <span class="ml-2 text-sm font-medium text-gray-500"> from 0 </span>
                            </div>

                            <div
                                class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                <!-- Heroicon name: solid/arrow-sm-down -->
                                <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only"> Increased by </span>
                                {{ (count($orders) - 0) * 100 }}%
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
            {{-- User Table --}}
            <div class="mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-5">All User</h3>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Last Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Phone</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->lname }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->phone }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-administrator-app-layout>
