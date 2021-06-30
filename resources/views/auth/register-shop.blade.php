@extends('layouts.app')
@section('content')

    <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">

        @if (session('error'))

            <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 mb-4">
                <div class="flex items-center justify-center w-12 bg-red-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                    </svg>
                </div>

                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                        <p class="text-sm text-gray-600 dark:text-gray-200">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Register Shop</h2>
        <p class="text-sm">You can register more shops later from your settings. Let's get started on registering your first
            shop.</p>
        <form action="{{ route('registerShop') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="shop">ShopName</label>
                    <input id="shopName" type="text" name="shopName"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="shopPic">Upload Shop Picture</label>
                    <input id="shopPic" type="file" name="shopPic"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white focus:outline-none focus:ring">
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </div>
@endsection
