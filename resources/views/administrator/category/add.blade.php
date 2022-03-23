<x-administrator-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as Administrator and this is add category page!
                </div>
                <form class="p-6 bg-white border-b border-gray-200" action="{{ route ('administrator.store.categories') }}" method="POST" enctype = "multipart/form-data">
                @csrf
                    <!-- Name & Slug -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-label class="mb-2" for="name" :value="__('Category Name')" />
                            <x-input class="w-full form-control" name="name" type="text" required autofocus/>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <x-label class="mb-2" for="slug" :value="__('Slug')" />
                            <x-input class="w-full form-control" name="slug" type="text" required autofocus/>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="mb-6">
                        <x-label class="mb-2" for="description" :value="__('Description')" />
                        <textarea name="description" required autofocus class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control"></textarea>
                        <!-- Checkbox -->
                        <div class="flex justify-center mt-5 mb-5">
                            <div class="form-check form-check-inline">
                                <input 
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="checkbox" name="status">
                                <label class="form-check-label inline-block text-gray-800 mr-5">Hide from Homepage</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input 
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="checkbox" name="popular">
                                <label class="form-check-label inline-block text-gray-800 mr-5">Popular</label>
                            </div>
                        </div>
                        <!-- Meta --> 
                            <x-label class="mb-2" for="meta_title" :value="__('Meta Title')" />
                            <x-input class="block mt-1 w-full form-control" type="text" name="meta_title" required autofocus/>

                            <x-label class="mb-2 mt-2" for="meta_title" :value="__('Meta Keywords')" />
                            <textarea name="meta_keywords" required autofocus class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control"></textarea>

                            <x-label class="mb-2 mt-2" for="meta_title" :value="__('Meta Description')" />
                            <textarea name="meta_description" required autofocus class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control"></textarea>

                            <x-label class="mb-2 mt-2" for="meta_title" :value="__('Upload Image')" />
                            <input type="file" name="image" class="form-control" required autofocus />
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
