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
            <div class="flex justify-between">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a class="text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300"
                            href="/"><img src="/images/sbl.png" alt="logo"></a>
                    </div>
                </div>
                @auth
                    <div class="relative inline-block text-left ">
                        <div>
                            <button type="button" class="user-icon space-x-2 focus:outline-none">
                                <span>{{ auth()->user()->firstname }}</span>
                                <img class="inline object-cover w-8 h-8 mr-2 rounded-full"
                                    src="/images/users/{{ auth()->user()->user_image }}" alt="Profile image" />
                            </button>
                        </div>
                        <div class="show-icon-details hidden absolute right-0 mt-2 w-56 py-2 bg-white rounded shadow-xl focus:outline-none"
                            role="menu" aria-orientation="vertical">
                            <div class="py-1">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                @if (auth()->user()->user_type == 'trader')
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
                                    <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
            <div>
                @auth
                    @if (auth()->user()->user_type == 'trader')
                        <div class="flex md:justify-center py-3 mt-3 -mx-3 overflow-y-auto whitespace-nowrap scroll-hidden">
                            <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                                href="{{ route('products.create') }}">Add Products</a>
                            <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                                href="{{ route('home') }}">View Main Website</a>

                        </div>
                    @endif
                @endauth
            </div>
    </nav>

    <!--content-->
    <main class="mainContent bg-white flex justify-center my-10">
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
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
