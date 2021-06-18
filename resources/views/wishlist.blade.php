@extends('layouts.app')
@section('content')
    <section class="body-font flex flex-col">
        <div class="container p-10 mx-auto">
            <!--heading-->
            <div class="flex space-x-2">
                <h1 class="text-2xl font-light mb-4">My Wishlists</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <!--product cards-->
            <div class="md:grid grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="mb-8 flex flex-col items-center justify-center max-w-sm mx-auto">
                    <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md"
                        style="background-image: url(https://images.unsplash.com/photo-1521903062400-b80f2cb8cb9d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80)">
                    </div>

                    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                        <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">Nike
                            Revolt</h3>

                        <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                            <span class="font-bold text-gray-800 dark:text-gray-200">$129</span>
                            <button
                                class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
                <div class="mb-8 flex flex-col items-center justify-center max-w-sm mx-auto">
                    <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md"
                        style="background-image: url(https://images.unsplash.com/photo-1521903062400-b80f2cb8cb9d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80)">
                    </div>

                    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                        <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">Nike
                            Revolt</h3>

                        <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                            <span class="font-bold text-gray-800 dark:text-gray-200">$129</span>
                            <button
                                class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
                <div class="mb-8 flex flex-col items-center justify-center max-w-sm mx-auto">
                    <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md"
                        style="background-image: url(https://images.unsplash.com/photo-1521903062400-b80f2cb8cb9d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80)">
                    </div>

                    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                        <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">Nike
                            Revolt</h3>

                        <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                            <span class="font-bold text-gray-800 dark:text-gray-200">$129</span>
                            <button
                                class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
                <div class="mb-8 flex flex-col items-center justify-center max-w-sm mx-auto">
                    <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md"
                        style="background-image: url(https://images.unsplash.com/photo-1521903062400-b80f2cb8cb9d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80)">
                    </div>

                    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                        <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">Nike
                            Revolt</h3>

                        <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                            <span class="font-bold text-gray-800 dark:text-gray-200">$129</span>
                            <button
                                class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
                <div class="mb-8 flex flex-col items-center justify-center max-w-sm mx-auto">
                    <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md"
                        style="background-image: url(https://images.unsplash.com/photo-1521903062400-b80f2cb8cb9d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80)">
                    </div>

                    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                        <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">Nike
                            Revolt</h3>

                        <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                            <span class="font-bold text-gray-800 dark:text-gray-200">$129</span>
                            <button
                                class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
