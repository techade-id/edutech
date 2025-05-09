<nav class="py-4 md:px-[30px]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <!-- Logo -->
        <a href="{{ route('front.index') }}" class="">
            <img src="{{ asset('assets/logo/Logo-white.png') }}" class="h-12" alt="Techade Logo" />
        </a>

        <!-- Profile Menu -->
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0">

            <div class="flex items-center space-x-2">
                @auth
                <div class="flex gap-x-3 items-center">
                    <div class="hidden md:flex flex-col items-end">
                        <p class="font-semibold text-white">Hi, {{ explode(' ', Auth::user()->name)[0] }}</p>
                        @if (Auth::user()->hasActiveSubscription())
                        <p class="p-[2px_10px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center w-fit">PRO</p>
                        @endif
                    </div>
                    <div class="flex items-center">
                        <button type="button" class="text-sm focus:ring-gray-300 focus:ring-4 rounded-full" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-12 h-12 rounded-full" src="{{ Storage::url(Auth::user()->avatar) }}" alt="User Photo">
                        </button>
                    </div>
                </div>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                        <span class="block text-sm  text-gray-500 truncate capitalize">{{ Auth::user()->getRoleNames()->first() }}</span>
                        @if (Auth::user()->hasActiveSubscription())
                        <p class="p-[2px_10px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center w-fit">PRO</p>
                        @endif
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">Profile</a>
                        </li>
                        <li class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300 cursor-pointer">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Sign out</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth

                @guest
                <div class="flex gap-[10px] items-center">
                    <a href="{{ route('register') }}" class="hidden md:inline text-white font-semibold rounded-[30px] px-4 py-2 ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Sign Up</a>
                    <a href="{{ route('login') }}" class="text-white font-semibold rounded-[30px] px-4 py-2 bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Login</a>
                </div>
                @endguest

                <!-- Hamburger menu -->
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-[#FF6129] focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-user" aria-expanded="false">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

        </div>

        <!-- Navbar Menu -->
        <div id="navbar-user" class="hidden md:flex md:w-auto md:order-1 md:mx-auto items-center justify-between w-full">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:gap-x-8 md:mt-0 md:border-0 md:bg-transparent">
                <li>
                    <a href="{{ route('front.index') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-[#FF6129] md:hover:bg-transparent md:text-white md:hover:text-[#FF6129] md:p-0">Home</a>
                </li>
                <li>
                    <a href="{{ route('front.pricing') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-[#FF6129] md:hover:bg-transparent md:text-white md:hover:text-[#FF6129] md:p-0">Pricing</a>
                </li>
                @guest
                <li class="md:hidden">
                    <a href="{{ route('login') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-[#FF6129]">Login</a>
                </li>
                <li class="md:hidden">
                    <a href="{{ route('register') }}" class="block py-2 px-3 text-white rounded-full bg-[#FF6129] w-fit">Sign Up</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>