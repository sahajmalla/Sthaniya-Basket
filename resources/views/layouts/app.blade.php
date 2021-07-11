<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sthaniya Basket</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="text-black">
    <nav class="bg-white shadow dark:bg-gray-800">
        <div class="container px-6 py-3 mx-auto">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a class="text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300"
                            href="/"><img src="/images/sbl.png" alt="logo"></a>

                        <!-- Search input on desktop screen -->
                        <form action="{{ route('search') }}" method="get">
                            <div class="hidden mx-10 md:block">
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </span>

                                    <input type="text" name="query" id="query"
                                        class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                        placeholder="Search" value="{{ request()->input('query') }}" required>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex space-x-2">

                        @auth
                            <div class="relative inline-block text-left md:hidden">
                                <div>
                                    <button type="button" class="user-icon space-x-2 focus:outline-none">
                                        <span> {{ auth()->user()->firstname }}</span>
                                        <img class="inline object-cover w-8 h-8 mr-2 rounded-full"
                                            src="/images/users/{{ auth()->user()->user_image }}" alt="Profile image" />
                                    </button>
                                </div>
                                <div class="show-icon-details hidden absolute right-0 mt-2 w-56 py-2 bg-white rounded shadow-xl focus:outline-none"
                                    role="menu" aria-orientation="vertical">
                                    <div class="py-1">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        @if (auth()->user()->user_type == 'trader')
                                            <a href="{{ route('products.index') }}"
                                                class="text-gray-700 block px-4 py-2 text-sm">Show CRUD</a>
                                            <a href="{{ route('registerShop') }}"
                                                class="text-gray-700 block px-4 py-2 text-sm">Add Shop</a>
                                        @endif

                                        @if (auth()->user()->user_type == 'admin')
                                            <a href="{{ route('verifyTrader') }}"
                                                class="text-gray-700 block px-4 py-2 text-sm">Show Trader verification</a>
                                        @endif

                                        <a href="{{ route('updateDetails') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm">Update Informations</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="text-gray-700 block w-full text-left px-4 py-2 text-sm">
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth

                        <!-- Mobile menu button -->
                        <div class="menu-button flex md:hidden">
                            <button type="button"
                                class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                                aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                    <path fill-rule="evenodd"
                                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="menu-open items-center md:flex hidden">
                    <div class="flex flex-col items-baseline mt-2 md:flex-row md:mt-0 md:mx-1">

                        @guest
                            <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0 md:flex-col flex"
                                href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="">Sign In</span></a>

                            <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0 md:flex-col flex"
                                href="{{ route('register') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                <span>Sign up</span></a>

                            <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0 md:flex-col flex"
                                href="{{ route('cart') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="">Cart</span>
                            </a>
                        @endguest

                        @auth
                            @if (auth()->user()->user_type == 'customer')

                                <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0 md:flex-col flex"
                                    href="{{ route('order') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <span class="">Order</span></a>

                                <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0 md:flex-col flex"
                                    href="{{ route('wishlist') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    <span>Wishlist</span>
                                </a>


                                <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0 md:flex-col flex"
                                    href="{{ route('cart') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="">Cart</span>
                                </a>
                            @endif


                            <div class="hidden md:block relative inline-block text-left">
                                <div>
                                    <button type="button" class="user-icon2 space-x-2 focus:outline-none">
                                        <span>{{ auth()->user()->firstname }}</span>
                                        <img class="inline object-cover w-8 h-8 mr-2 rounded-full"
                                            src="/images/users/{{ auth()->user()->user_image }}" alt="Profile image" />
                                    </button>
                                </div>
                                <div class="show-icon-details2 hidden absolute right-0 mt-2 w-56 py-2 bg-white rounded shadow-xl focus:outline-none"
                                    role="menu" aria-orientation="vertical">
                                    <div class="py-1">
                                        @if (auth()->user()->user_type == 'trader')
                                            <a href="{{ route('products.index') }}"
                                                class="text-gray-700 block px-4 py-2 text-sm">Show CRUD</a>
                                            <a href="{{ route('registerShop') }}"
                                                class="text-gray-700 block px-4 py-2 text-sm">Add Shop</a>

                                        @endif

                                        @if (auth()->user()->user_type == 'admin')
                                            <a href="{{ route('verifyTrader') }}"
                                                class="text-gray-700 block px-4 py-2 text-sm">Show Trader verification</a>
                                        @endif

                                        <a href="{{ route('updateDetails') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm">Update Informations</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="text-gray-700 block w-full text-left px-4 py-2 text-sm">
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth
                        {{-- <!-- Only visible for guests that are logged in -->
                        <div
                            class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0 md:flex-col flex">
                            @auth
                                <li>
                                    <a href="" class="p-3">{{ auth()->user()->firstname }}</a>
                                </li>
                                <li>
                                    <!--Using a form to wrap a button to use csrf so that we are not subjected 
                                                to malicious log outs.-->
                                    <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            @endauth
                        </div> --}}
                    </div>

                    <!-- Search input on mobile screen -->
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class="mt-3 md:hidden">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </span>

                                <input type="text" name="query" id="query2"
                                    class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                    placeholder="Search" value="{{ request()->input('query') }}" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex md:justify-center py-3 mt-3 -mx-3 overflow-y-auto whitespace-nowrap">
                <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                    href="{{ route('bakery.shop') }}">Bakery</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                    href="{{ route('butcher.shop') }}">Butcher</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                    href="{{ route('delicatessen.shop') }}">Delicatessen</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                    href="{{ route('fishmonger.shop') }}">Fishmonger</a>
                <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                    href="{{ route('greengrocer.shop') }}">Greengrocer</a>
            </div>

        </div>
    </nav>

    <!--content-->
    <main class="mainContent bg-white flex justify-center mt-1 mb-4">
        @yield('content')
    </main>

    <!---footer -->
    <footer class="bg-gray-100 body-font">
        <div class="container px-5 py-5 mx-auto flex items-center sm:flex-row flex-col">
            <span> <a href="/"><img alt="Logo" src="/images/sbl.png"> </a> </span>
            <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">©
                2021 Sthaniya Basket</p>

            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">

                <a class="text-gray-400">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
    <script>
        //menu button close open
        const btn = document.querySelector('.menu-button');
        const menuOpen = document.querySelector('.menu-open');

        btn.addEventListener('click', () => {
            menuOpen.classList.toggle('hidden');
        });

        //user icon 2
        const userIconbtn2 = document.querySelector('.user-icon2');
        const showIconDetails2 = document.querySelector('.show-icon-details2');

        if (userIconbtn2) {
            userIconbtn2.addEventListener('click', () => {
                showIconDetails2.classList.toggle('hidden');
            });
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
