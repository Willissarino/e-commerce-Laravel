<x-guest-layout>
    @section('title', 'Homepage')
    <x-header />
    <x-hero-section-1/>

    {{-- Featured Section --}}
    <div class="bg-gray-100">
      <div class="py-16 sm:py-24 lg:max-w-7xl lg:mx-auto lg:px-8">
        <div class="px-4 flex items-center justify-between sm:px-6 lg:px-0">
          <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Trending products</h2>
          <a href="{{ route('view.all.product') }}" class="hidden sm:block text-sm font-semibold text-indigo-600 hover:text-indigo-500">Browse all products<span aria-hidden="true"> &rarr;</span></a>
        </div>
        <div class="mt-8 relative">
          <div class="relative w-full pb-6 -mb-6 overflow-x-auto">
            <ul role="list" class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:space-x-0 lg:grid lg:grid-cols-4 lg:gap-x-8">
              {{-- Featured list --}}
              @foreach ($featured_product as $prod)
              <li class="w-64 inline-flex flex-col text-center lg:w-auto" >
                <div class="group relative">
                  <div class="w-full bg-gray-200 rounded-md overflow-hidden aspect-w-1 aspect-h-1">
                    <img src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="img-product" class="w-full h-full object-center object-cover group-hover:opacity-75">
                  </div>
                  <div class="mt-6">
                    <p class="text-sm text-gray-500"></p>
                    <h3 class="mt-1 font-semibold text-gray-900">
                      <a href="{{ url('view-category/'.$prod->category->slug.'/'.$prod->slug) }}">
                        <span class="absolute inset-0"></span>
                        {{ $prod->name }}
                      </a>
                    </h3>
                    <p class="mt-1 text-gray-900">MYR {{ $prod->selling_price }}</p>
                  </div>
                </div>
              </li>
              @endforeach
              <!-- More products... -->
            </ul>
          </div>
        </div>
    
        <div class="mt-12 flex px-4 sm:hidden">
          <a href="{{ route('view.all.product') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">Browse all products<span aria-hidden="true"> &rarr;</span></a>
        </div>
      </div>
    </div>
    
    

    {{-- Categories Section --}}
    <div class="bg-white">
        <div class="py-16 sm:py-24 xl:max-w-7xl xl:mx-auto xl:px-8">
          <div class="px-4 sm:px-6 sm:flex sm:items-center sm:justify-between lg:px-8 xl:px-0">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Shop by Category</h2>
            <a href="{{ route('view.all.product') }}" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">Browse all categories<span aria-hidden="true"> &rarr;</span></a>
          </div>
      
          <div class="mt-4 flow-root">
            <div class="-my-2">
              <div class="box-content py-2 relative h-80 overflow-x-auto xl:overflow-visible">
                <div class="absolute min-w-screen-xl px-4 flex space-x-8 sm:px-6 lg:px-8 xl:relative xl:px-0 xl:space-x-0 xl:grid xl:grid-cols-5 xl:gap-x-8">
                    {{-- Category list --}}
                    @foreach ($category as $item)
                    <a href="{{ url('view-category/'.$item->slug) }}" class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                        <span aria-hidden="true" class="absolute inset-0">
                        <img src="{{ asset('assets/uploads/category/' . $item->image) }}" alt="" class="w-full h-full object-center object-cover">
                        </span>
                        <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                        <span class="relative mt-auto text-center text-xl font-bold text-white">{{ $item->name }}</span>
                    </a>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
      
          <div class="mt-6 px-4 sm:hidden">
            <a href="{{ route('view.all.product') }}" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">Browse all categories<span aria-hidden="true"> &rarr;</span></a>
          </div>
        </div>
      </div>

      
    
        

      <x-hero-section-2/>

      <x-incentives-1/>

    <x-footer />
</x-guest-layout>
