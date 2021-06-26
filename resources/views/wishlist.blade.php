@extends('layouts.app')
@section('content')
    <section class="body-font flex flex-col rounded-lg w-10/12 shadow-xl">
        
        <div class="container p-10 mx-auto">
            <!--heading-->
            <div class="flex space-x-2 p-4 mb-4">
                <h1 class="text-2xl font-medium">My Wishlists</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <div class="mb-4">

                @if(session('status'))
                    <div class="flex justify-center">
                        <div class="bg-red-500 p-4 w-5/12 rounded-lg mb-6 text-white text-center">
                            {{session('status')}}
                        </div>
                    </div>
                @endif

            </div>
            
            @if ($products->count())

                <!--product cards-->
                    <div class="md:grid grid-cols-2 lg:grid-cols-3 gap-10 mb-4">

                            @foreach ($products as $product)
                                            
                                <div class="mb-8 flex flex-col items-center justify-center max-w-sm">
                                    
                                    <div class="w-full bg-gray-300 bg-center bg-cover rounded-lg shadow-md">
                                        <img class="w-full h-64" src="/images/products/{{ $product->prod_image }}" alt="{{ $product->prod_name }}">
                                    </div>

                                    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                                        
                                        <div class="flex items-center justify-evenly px-3 py-2 dark:bg-gray-700">

                                            <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">
                                                {{ $product->prod_name }}
                                            </h3>

                                            <span class="font-bold text-gray-800 dark:text-gray-200">£{{ $product->price }}</span>

                                        </div>

                                        <div class="flex items-center justify-around px-3 py-2 bg-gray-200 dark:bg-gray-700">
                                                                                       
                                            <!-- Add to cart -->
                                            <form action="" method="POST">

                                                <button
                                                    class="p-2 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">
                                                    Add to cart
                                                </button>

                                            </form>

                                             <!-- Remove from wishlist -->
                                            <form action="{{ route('wishlist.destroy', $product->product_id) }}" method="POST">
                                                
                                                @csrf
                                                @method('DELETE') <!-- Method spoofing -->
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

                <h1 class="text-md font-medium text-gray-600">
                    You have not added any items to your wishlist yet.
                </h1>

            @endif
        </div>
    </section>
@endsection
