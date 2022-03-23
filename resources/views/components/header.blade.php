<header class="border-b border-gray-200">
    <div class="flex items-center justify-between h-16 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
        <div class="flex items-center">
            <button type="button" class="p-2 sm:mr-4 lg:hidden">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            {{-- Logo --}}
            <a href="{{ route('homepage') }}" class="flex">
                <span class="inline-block w-32 h-10 bg-gray-200 rounded-lg"></span>
            </a>
        </div>
        {{-- Links --}}
        <div class="flex items-center justify-end flex-1">
            <nav
                class="hidden lg:uppercase lg:text-gray-500 lg:tracking-wide lg:font-bold lg:text-xs lg:space-x-4 lg:flex">
                <a href="{{ route('administrator.login') }}"
                    class="block h-16 leading-[4rem] border-b-4 border-transparent hover:text-gray-700 hover:border-current">
                    Admin
                </a>

                <a href="{{ route('homepage') }}"
                    class="block h-16 leading-[4rem] border-b-4 border-transparent hover:text-gray-700 hover:border-current">
                    News
                </a>

                <a href="{{ route('view.all.product') }}"
                    class="block h-16 leading-[4rem] border-b-4 border-transparent hover:text-gray-700 hover:border-current">
                    Products
                </a>

                <a href="{{ route('homepage') }}"
                    class="block h-16 leading-[4rem] border-b-4 border-transparent hover:text-gray-700 hover:border-current">
                    Contact
                </a>
            </nav>
            {{-- Nav Logo --}}
            <div class="flex items-center ml-8">
                <div class="flex items-center border-gray-100 divide-x divide-gray-100 border-x">
                    {{-- Cart --}}
                    <span>
                        <a href="{{ route('view.cart') }}" class="block p-6 border-b-4 border-transparent hover:border-gray-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="sr-only">Cart</span>
                        </a>
                    </span>
                    {{-- Account --}}
                    <span>
                        <div class="dropdown ">
                            <label tabindex="0" class="block p-6 pt-8 border-b-4 border-transparent hover:border-gray-700">
                                <svg class="w-4 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </label>
                            @if (Auth::guest())
                                <ul tabindex="0" class="menu dropdown-content p-2 shadow bg-base-100 w-52">
                                    <li><a disabled class="border-b-2">Please login to continue</a></li> 
                                    <li><a href="{{ route('login') }}">Login</a></li> 
                                    <li><a href="{{ route('register') }}">Register</a></li> 
                                </ul>
                            @else
                                <ul tabindex="0" class="menu dropdown-content p-2 shadow bg-base-100 w-52">
                                    {{-- Profile --}}
                                    <li><a disabled>Logged in as {{ Auth::user()->name }}</a></li>
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li> 
                                    {{-- Logout if not logged in --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li><a :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li> 
                                    </form>
                                </ul>
                            @endif
                        </div>
                    </span>
                    {{-- Search --}}
                    <span class="hidden sm:block">
                        <a href="{{ route('homepage') }}" class="block p-6 border-b-4 border-transparent hover:border-gray-700">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <span class="sr-only"> Search </span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
