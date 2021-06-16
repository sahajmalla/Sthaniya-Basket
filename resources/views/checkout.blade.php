@extends('layouts.app')
@section('content')

    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white w-11/12 bg-white shadow-lg">

        <main class="my-8">

            <div class="container mx-auto px-6">
                <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>

                <!-- Form and order summary -->

                <div class="flex lg:flex-row mt-8">

                    <!-- Form -->
                        <form class="lg:w-3/4 p-5 border rounded-md">

                            <h1 class="font-bold text-xl mb-8" >1. Collection Slot and Payment Method</h1>

                            <div class="flex justify-evenly">

                                <label class="font-medium text-lg mb-4">Collection Slot:</label>
                                <div class="inline-block relative w-full mb-5">

                                    <select class="block appearance-none w-full h-14 bg-gray-100 border 
                                            border-gray-300 px-4 py-2 pr-8 rounded-lg border-2 text-gray-400">

                                        <option>10-13</option>
                                        <option>13-16</option>
                                        <option>16-19</option>

                                    </select>

                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex 
                                            items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 
                                            6.586 4.343 8z" />
                                        </svg>
                                    </div>

                                </div>
                            </div>

                            <div class="flex justify-evenly">
                                <label class="font-medium text-lg mb-4">Payment Method:</label>
                                <div class="inline-block relative w-full mb-5">

                                    <select class="block appearance-none w-full h-14 bg-gray-100 border 
                                            border-gray-300 px-4 py-2 pr-8 rounded-lg border-2 text-gray-400">

                                        <option>PayPal</option>
                                        <option>Stripe</option>

                                    </select>

                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex 
                                            items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 
                                            6.586 4.343 8z" />
                                        </svg>
                                    </div>

                                </div>
                            </div>

                        </form>

                    <!-- Order Summary -->

                    <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">

                        <div class="flex justify-center lg:justify-end">

                            <div class="border rounded-md max-w-md w-full px-4 py-3">

                                <h1 class="text-center font-bold text-xl mb-2">3. Order Summary</h1>

                                <!-- Order details. -->

                                <div class="p-4">

                                    <div class="flex justify-between border-b">
                                        <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                            Items:
                                        </div>
                                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                            2
                                        </div>
                                    </div>

                                    <div class="flex justify-between border-b">
                                        <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                            Payment Method:
                                        </div>
                                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                            PayPal
                                        </div>
                                    </div>

                                    <div class="flex justify-between pt-4 border-b">
                                        <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                            Collection Time:
                                        </div>
                                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                            10-13
                                        </div>
                                    </div>

                                    <div class="flex justify-between pt-4 border-b">
                                        <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                            Order Total:
                                        </div>
                                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                            £30,000
                                        </div>
                                    </div>

                                    <p class="text-center my-6 italic">By placing an order, you agree to Sthaniya Basket's
                                        <span class="underline font-bold">Privacy Policy</span> and
                                        <span class="underline font-bold">Terms of Use.</span>
                                    </p>

                                    <a href="#">
                                        <button
                                            class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                            <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                            </svg>
                                            <span class="ml-2 mt-5px">Place your order</span>
                                        </button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Review items -->

                <div class="border rounded-md p-5 my-10 w-10/12">
                    <h1 class="font-bold text-xl mb-4">2. Review Items</h1>
                    <table class="w-full text-sm lg:text-base" cellspacing="0">

                        <thead>
                            <tr class="h-12">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Product</th>
                                <th class="hidden text-center md:table-cell">Description</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline">Quantity</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                            class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>

                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">MacBook Pro</p>
                                    </a>
                                </td>

                                <td class="hidden text-center md:table-cell">
                                    <span class="text-xs lg:text-base">
                                        The 16-inch MacBook Pro has the highest-capacity battery we’ve
                                        ever put in a notebook.
                                    </span>
                                </td>

                                <td class="justify-center md:justify-end md:flex mt-6">
                                    <div class="w-20 h-10 flex">
                                        <div class="relative flex flex-row w-full h-8">
                                            <input type="number" value="2"
                                                class="w-8/12 font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                        </div>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <form action="" method="POST">
                                        <button type="submit" class="text-black border-2 md:ml-4">
                                            <small class="m-2">Remove item</small>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                            class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">MacBook Pro</p>
                                    </a>
                                </td>
                                <td class="hidden text-center md:table-cell">
                                    <span class="text-xs lg:text-base">
                                        The 16-inch MacBook Pro has the highest-capacity battery we’ve
                                        ever put in a notebook.
                                    </span>
                                </td>
                                <td class="justify-center md:justify-end md:flex mt-6">
                                    <div class="w-20 h-10 flex">
                                        <div class="relative flex flex-row w-full h-8">
                                            <input type="number" value="2"
                                                class="w-8/12 font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <form action="" method="POST">
                                        <button type="submit" class="text-black border-2 md:ml-4">
                                            <small class="m-2">Remove item</small>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                            class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">MacBook Pro</p>
                                    </a>
                                </td>
                                <td class="hidden text-center md:table-cell">
                                    <span class="text-xs lg:text-base">
                                        The 16-inch MacBook Pro has the highest-capacity battery we’ve
                                        ever put in a notebook.
                                    </span>
                                </td>
                                <td class="justify-center md:justify-end md:flex mt-6">
                                    <div class="w-20 h-10 flex">
                                        <div class="relative flex flex-row w-full h-8">
                                            <input type="number" value="2"
                                                class="w-8/12 font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <form action="" method="POST">
                                        <button type="submit" class="text-black border-2 md:ml-4">
                                            <small class="m-2">Remove item</small>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    </div>

@endsection

{{-- <div class="flex justify-between">
                            <div class="flex">

                                <img class="h-20 w-20 object-cover rounded"
                                    src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                                    alt="">

                                <div class="mx-3">
                                    <h3 class="lg:text-lg font-bold text-gray-800">Mac Book Pro</h3>
                                </div>

                            </div>
                            <span class="text-gray-800 text-lg font-bold">£15,000</span>
                        </div> --}}

                        {{-- <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 
                                8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 
                                6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 
                                10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 
                                10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 
                                8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 
                                0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 
                                18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 
                                19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 
                                2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 
                                14.8268Z"
                                fill="currentColor" />
                        </svg>
                        <span class="mx-1 text-sm">NY</span>
                    </div>
                    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                        Brand
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </button>

                        <div class="flex sm:hidden">
                            <button @click="isOpen = !isOpen" type="button"
                                class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                                aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd"
                                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Home</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Shop</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Categories</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
                    </div>
                </nav>
                <div class="relative mt-6 max-w-lg mx-auto">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>

                    <input
                        class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Search">
                </div>
            </div>
        </header> --}}

        {{-- <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
            class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <hr class="my-3">
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded"
                        src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                        alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                        <div class="flex items-center mt-2">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="text-gray-700 mx-2">2</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600">20$</span>
            </div>
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded"
                        src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                        alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                        <div class="flex items-center mt-2">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="text-gray-700 mx-2">2</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600">20$</span>
            </div>
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded"
                        src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                        alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                        <div class="flex items-center mt-2">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="text-gray-700 mx-2">2</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600">20$</span>
            </div>
            <div class="mt-8">
                <form class="flex items-center justify-center">
                    <input class="form-input w-48" type="text" placeholder="Add promocode">
                    <button
                        class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <span>Apply</span>
                    </button>
                </form>
            </div>
            <a
                class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <span>Chechout</span>
                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div> --}}