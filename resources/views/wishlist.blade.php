@extends('layouts.app')
@section('content')
    <section class="body-font flex flex-col rounded-lg w-10/12 shadow-xl">

        <div class="flex w-12/12 justify-center mb-4">
            @if (session('deleteFromWishlist'))
                <p id="messages" class="p-4 mt-6 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('deleteFromWishlist') }}</p>
            @elseif(session('addedToCart'))
                <p id="messages" class="p-4 mt-6 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('addedToCart') }}</p>
            @elseif(session('failedToAddToCart'))
                <p id="messages" class="p-4 mt-6 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('failedToAddToCart') }}</p>
            @elseif(session('productOutOfStock'))
                <p id="messages" class="p-4 mt-6 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('productOutOfStock') }}
                </p>
            @endif
        </div>


        <div class="container p-10 mx-auto">

            <!--heading-->
            <div class="flex space-x-2 mb-4">
                <h1 class="text-3xl font-bold">My Wishlist</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            @if ($products->count())

                <!--product cards-->
                <div class="md:grid grid-cols-2 lg:grid-cols-3 gap-10 mb-4">

                    @foreach ($products as $product)

                        <div class="mb-8 flex flex-col items-center justify-center max-w-sm">

                            <div class="w-full bg-gray-300 bg-center bg-cover rounded-lg shadow-md">
                                <a href="{{ route('product', $product->product_id) }}">
                                    <img class="w-full h-64" src="/images/products/{{ $product->prod_image }}"
                                        alt="{{ $product->prod_name }}">
                                </a>
                            </div>

                            <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">

                                <div class="flex flex-col justify-evenly px-3 py-2 dark:bg-gray-700">

                                    <a href="{{ route('product', $product->product_id) }}">
                                        <div
                                            class="flex space-x-1 py-2 font-bold tracking-wide text-gray-800 dark:text-white">
                                            <p>Name:</p>
                                            <p class="uppercase">{{ $product->prod_name }}</p>
                                        </div>
                                    </a>

                                    <div class="flex space-x-1 font-bold text-gray-800 dark:text-gray-200">
                                        <p>Price:</p>
                                        <p>£{{ $product->price }}</p>
                                    </div>

                                    @if ($product->prod_quantity > 0)
                                        <div class="flex space-x-2 items-baseline">
                                            <h1 class="text-md font-bold text-gray-800 dark:text-gray-200">In Stock</h1>
                                            <p class="text-xs font-medium text-gray-500">Only
                                                {{ $product->prod_quantity }} items left.</p>
                                        </div>
                                    @else
                                        <h1 class="text-md font-bold text-gray-800 dark:text-gray-200">Out Of Stock</h1>
                                    @endif

                                </div>

                                <div class="flex items-center justify-around px-3 py-2 bg-gray-200 dark:bg-gray-700">

                                    <!-- Add to cart -->
                                    <form action="{{ route('addToCart', $product->product_id) }}" method="POST">
                                        @csrf
                                        <button
                                            class="p-2 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">
                                            Add to cart
                                        </button>

                                    </form>

                                    <!-- Remove from wishlist -->
                                    <form action="{{ route('wishlist.destroy', $product->product_id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <!-- Method spoofing -->
                                        <button class="font-medium text-xs text-white bg-red-600 p-2 rounded-lg">
                                            Remove
                                        </button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @else

                <h1 class="p-4 mb-4 text-md font-medium text-gray-700">
                    You have not added any items to your wishlist yet.
                </h1>

            @endif
        </div>
    </section>
    <script>
        //message time
        setTimeout(function() {
            document.getElementById('messages').remove();
        }, 3000)
    </script>
@endsection
