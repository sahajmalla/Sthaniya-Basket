<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sthaniya Basket</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
        <div class="flex items-start justify-between">
            <div class="h-screen hidden lg:block shadow-lg relative w-80">
                <div class="bg-white h-full dark:bg-gray-700">
                    <div class="flex items-center justify-start pt-6 ml-8">
                        <p class="font-bold dark:text-white text-xl">
                            Sthaniya Dashboard
                        </p>
                    </div>
                    @if (auth()->user()->user_type === 'admin')
                        @include('dashboard.admin.adminNav')
                    @elseif (auth()->user()->user_type === 'trader')
                        @include('dashboard.trader.traderNav')
                    @else
                    @include('dashboard.customer.customerNav')
                    @endif


                </div>
            </div>
            <div class="flex flex-col w-full md:space-y-4">
                <header class="w-full h-16 z-40 flex items-center justify-between">
                    <div class="block lg:hidden ml-6">
                        <button class="flex p-2 items-center rounded-full bg-white shadow text-gray-500 text-md">
                            <svg width="20" height="20" class="text-gray-400" fill="currentColor"
                                viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="relative z-20 flex flex-col justify-end h-full px-3 md:w-full">
                        <div class="relative p-1 flex items-center w-full space-x-4 justify-end">
                            <button
                                class="flex p-2 items-center rounded-full bg-white shadow text-gray-400 hover:text-gray-700 text-md">
                                <svg width="20" height="20" class="text-gray-400" fill="currentColor"
                                    viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M912 1696q0-16-16-16-59 0-101.5-42.5t-42.5-101.5q0-16-16-16t-16 16q0 73 51.5 124.5t124.5 51.5q16 0 16-16zm816-288q0 52-38 90t-90 38h-448q0 106-75 181t-181 75-181-75-75-181h-448q-52 0-90-38t-38-90q50-42 91-88t85-119.5 74.5-158.5 50-206 19.5-260q0-152 117-282.5t307-158.5q-8-19-8-39 0-40 28-68t68-28 68 28 28 68q0 20-8 39 190 28 307 158.5t117 282.5q0 139 19.5 260t50 206 74.5 158.5 85 119.5 91 88z">
                                    </path>
                                </svg>
                            </button>
                            <span class="w-1 h-8 rounded-lg bg-gray-200">
                            </span>
                            <a href="#" class="block relative">
                                <img alt="profil" src="/images/person/1.jpg"
                                    class="mx-auto object-cover rounded-full h-10 w-10 " />
                            </a>
                            <button class="flex items-center text-gray-500 dark:text-white text-md">
                                Charlie R
                                <svg width="20" height="20" class="ml-2 text-gray-400" fill="currentColor"
                                    viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>

                <!--content-->
                <div class="overflow-auto h-screen pb-24 px-4 md:px-6">
                    @if (auth()->user()->user_type === 'admin')
                        @yield('adminDashboard')
                    @elseif (auth()->user()->user_type === 'trader')
                        @yield('traderDashboard')
                    @else
                    @yield('customerDashboard')
                    @endif
                </div>
            </div>
        </div>
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

</body>

</html>
