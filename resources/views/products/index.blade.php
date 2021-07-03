@extends('layouts.crud')
@section('content')
    <div class="container mx-auto px-4 sm:px-8 max-w-5xl rounded-lg shadow-lg">   
        <div class="py-5">
            @if (session('success'))
                <div class="flex w-full max-w-sm mx-auto overflow-hidden rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                        </svg>
                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-green-500 dark:text-green-400">Success</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">{{ $message }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="my-2">

                <div class="flex justify-center space-x-6">
                    <h1 class="text-3xl font-bold text-gray-800">Your Products</h1>

                    <a href="{{ route('products.create') }}"
                        class="mb-3 rounded-full flex items-center shadow bg-blue-500 px-4 py-2 text-white hover:bg-blue-400">
                        Insert New Product
                    </a>

                    <div>
                        <div class="relative">
                            <!-- Dropdown toggle button -->
                            <button
                                class="sort-btn relative z-10 block p-2 bg-white rounded-md dark:bg-gray-800 focus:outline-none">
                                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                                </svg>
                            </button>
        
                            <!-- Dropdown menu -->
                            <div
                                class="show-sort absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800 hidden">
                                <a href="{{ URL::current() }}"
                                    class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    All Products
                                </a>
                                @foreach ($shops as $shop)
                                <a href="{{ URL::current()."?sort=". $shop->shopName }}"
                                    class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    {{ $shop->shopName }}
                                </a>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div>
                <form action="product.index" method="POST">
                    @csrf
                    <select name="sortByShop" id="sortByShop">
                        <option value="" disabled>Sort by your Shop</option>
                        <a href="{{ url()->current() . '?sort=heelo' }}">
                            <option value="test">test</option>
                        </a>
                        <a href="{{ url()->current() . '?sort=heelo2' }}">
                            <option value="test">test2</option>
                        </a>
                        
                        @foreach ($shops as $shop)
                            <button href="{{ url()->current() . '?sort=heelo' }}">
                                <option value={{ $shop->shopName }}>{{ $shop->shopName }}</option>
                            </button>
                        @endforeach
                    </select>
                </form>
            </div> --}}
            

            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Description
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Allergy
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Quantity
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Update / Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <img src={{ asset('images/products/' . $product->prod_image) }}
                                            alt="product image">
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $product->prod_name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $product->prod_descrip }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $product->allergy }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $product->price }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex space-x-2 items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $product->prod_quantity }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <a class="px-4 mr-2 py-2 font-medium tracking-wide text-white 
                                                                                                                capitalize transition-colors duration-200 
                                                                                                                transform bg-blue-600 rounded-md  hover:bg-blue-500 focus:outline-none focus:bg-blue-500"
                                                href="{{ route('products.edit', $product->id) }}">Edit
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 font-medium tracking-wide text-white 
                                                                                                                capitalize transition-colors duration-200 
                                                                                                                transform bg-red-600 rounded-md  hover:bg-red-500 focus:outline-none focus:bg-red-500">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Menu button close open
        const sortBtn = document.querySelector('.sort-btn');
        const showSort = document.querySelector('.show-sort');

        sortBtn.addEventListener('click', () => {
            showSort.classList.toggle('hidden');
        });
    </script>
@endsection
