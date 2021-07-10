@extends('layouts.crud')
@section('content')
    <div class="container mx-auto px-4 sm:px-8 max-w-5xl rounded-lg shadow-lg">
        <div class="py-5">
            <div class="flex w-12/12 justify-center mb-10" id="messages">

                @if (session('ShopCreated'))
                    <p class="message p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                        {{ session('ShopCreated') }}
                    </p>
                @elseif (session('Success'))
                    <p class="message p-4 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                        {{ session('Success') }}
                    </p>
                @endif

            </div>
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
                                    <a href="{{ URL::current() . '?sort=' . $shop->shopname }}"
                                        class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                        {{ $shop->shopname }}
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

        //message time
        setTimeout(function() {
            document.getElementById('messages').remove();
        }, 3000)
    </script>
@endsection
