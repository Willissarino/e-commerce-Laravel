<x-administrator-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as Administrator and this is product page!
                </div>

                <!-- Button -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" onclick="location.href='{{ route ('administrator.add.product') }}'"
                        class="mx-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        + Add Product
                    </button>
                </div>

                <!-- Table -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price (RM)</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td> <!-- PK,FK tings -->
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>
                                        <img class="w-28 mx-auto"
                                            src="{{ asset('assets/uploads/product/' . $item->image) }}"
                                            alt="Image here"> {{ $item->image }}
                                    </td>
                                    <td>
                                        <button onclick="location.href='{{ url('administrator/edit-product/'.$item->id) }}'"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Edit
                                        </button>
                                        <button onclick="location.href='{{ url('administrator/delete-product/'.$item->id) }}'"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-administrator-app-layout>
