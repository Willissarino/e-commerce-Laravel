<x-administrator-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as Administrator and this is edit/update category page!
                </div>
                <form action="{{ url('administrator/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data" class="p-6 bg-white border-b border-gray-200">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label class="mb-2" for="name" :value="__('Name')" />
                            <x-input class="w-full form-control" name="name" value="{{ $category->name }}" type="text"
                                required autofocus />
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <x-label class="mb-2" for="slug" :value="__('Slug')" />
                            <x-input class="w-full form-control" name="slug" value="{{ $category->slug }}" type="text"
                                required autofocus />
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="mb-6">
                        <x-label class="mb-2" for="description" :value="__('Description')" />
                        <textarea name="description" required autofocus
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control">{{ $category->description }}
                        </textarea>
                        <!-- Checkbox -->
                        <div class="flex justify-center mt-5 mb-5">
                            <div class="form-check form-check-inline">
                                <input {{ $category->status == 1 ? "checked" :'' }}
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="checkbox" name="status">
                                <label class="form-check-label inline-block text-gray-800 mr-5">Hide from Homepage</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input {{ $category->popular == 1 ? "checked" :'' }}
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="checkbox" name="popular">
                                <label class="form-check-label inline-block text-gray-800 mr-5">Popular</label>
                            </div>
                        </div>
                        <!-- Meta -->
                        <x-label class="mb-2" :value="__('Meta Title')" />
                        <x-input class="block mt-1 w-full form-control" type="text" name="meta_title"
                            value="{{ $category->meta_title }}" required autofocus />

                        <x-label class="mb-2 mt-2" :value="__('Meta Keywords')" />
                        <textarea name="meta_keywords" required autofocus
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control">{{ $category->meta_keywords }}
                        </textarea>

                        <x-label class="mb-2 mt-2" :value="__('Meta Description')" />
                        <textarea name="meta_description" required autofocus
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control">{{ $category->meta_description }}
                        </textarea>
                        <!-- Image -->
                        @if ($category->image)
                            <img class="mt-10 mx-auto" src="{{ asset('assets/uploads/category/' . $category->image) }}" alt='image-category'>
                        @endif

                        <x-label class="mb-2 mt-2" :value="__('Upload Image')" />
                        <input type="file" name="image" class="form-control" />
                    </div>

                    <!--Submit Btn -->
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>




</x-administrator-app-layout>
