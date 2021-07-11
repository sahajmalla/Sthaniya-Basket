@extends('layouts.app')
@section('content')
    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3,
        #carousel-4:checked~.control-4,
        #carousel-5:checked~.control-5 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet,
        #carousel-4:checked~.control-4~.carousel-indicators li:nth-child(4) .carousel-bullet,
        #carousel-5:checked~.control-5~.carousel-indicators li:nth-child(5) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }

    </style>

    <div>

        <div class="flex w-12/12 justify-center mb-10">

            @if (session('order-success'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('order-success') }}
                </p>
            @elseif(session('addedToWishlist'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('addedToWishlist') }}
                </p>
            @elseif(session('failedToAddToWishlist'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('failedToAddToWishlist') }}
                </p>
            @elseif(session('addedToCart'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('addedToCart') }}
                </p>
            @elseif(session('failedToAddToCart'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('failedToAddToCart') }}
                </p>
            @elseif(session('productOutOfStock'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('productOutOfStock') }}
                </p>
            @elseif(session('notVerified'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('notVerified') }}
                </p>
            @elseif(session('updateShop'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('updateShop') }}
                @elseif(session('slotsFull'))
                <p id="messages" class="message mt-9 p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('slotsFull') }}
                </p>
            @elseif(session('friday'))
                <p id="messages" class="p-4 mt-9 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('friday') }}

                </p>
            @elseif(session('loggedIn'))
                <p id="messages" class="p-4 mt-9 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('loggedIn') }}
                </p>
            @elseif(session('registered'))
                <p id="messages" class="p-4 mt-9 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('registered') }}
                </p>
            @elseif(session('loggedOut'))
                <p id="messages" class="p-4 mt-9 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('loggedOut') }}
                </p>
            @elseif(session('cartEmpty'))
                <p id="messages" class="p-4 mt-9 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('cartEmpty') }}
                </p>
            @elseif(session('registeredAndLoggedIn'))
                <p id="messages" class="p-4 mt-9 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('registeredAndLoggedIn') }}
                </p>
            @endif

        </div>
        <div class="w-full h-40 mb-8 bg-center">
            <img class="object-cover w-full h-40 object-center " src="/images/banner/cleck.jpeg" alt="Cleckhuddersfax West Yorkshire">
        </div>
        <div class="carousel relative container mx-auto" style="max-width:1600px;">
            <div class="carousel-inner relative overflow-hidden w-full">
                <!--Slide 1-->
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                    checked="checked">
                <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                        style="background-image: url('/images/banner/bakerybanner.jpg');">

                        <div class="container mx-auto">
                            <div
                                class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide bg-red-200 bg-opacity-75">
                                <p class="text-black text-2xl my-4">Bready or not, here I crumb!</p>
                               
                            </div>
                        </div>

                    </div>
                </div>
                <label for="carousel-5"
                    class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-2"
                    class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                <!--Slide 2-->
                <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                        style="background-image: url('/images/banner/butcherbanner.jpg');">

                        <div class="container mx-auto">
                            <div
                                class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide bg-red-200 bg-opacity-75">
                                <p class="text-black text-2xl my-4">So... We meat again!</p>
                               
                            </div>
                        </div>

                    </div>
                </div>
                <label for="carousel-1"
                    class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-3"
                    class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                <!--Slide 3-->
                <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom"
                        style="background-image: url('/images/banner/delicatessenbanner.jpg');">

                        <div class="container mx-auto">
                            <div
                                class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide bg-red-200 bg-opacity-75">
                                <p class="text-black text-2xl my-4">What did batman do at the deli?</p>
                                <p class="text-black text-2xl my-4">A.Got Ham!</p>
                                
                            </div>
                        </div>

                    </div>
                </div>
                <label for="carousel-2"
                    class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-4"
                    class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>


                <!--Slide 4-->
                <input class="carousel-open" type="radio" id="carousel-4" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom"
                        style="background-image: url('/images/banner/fishmongerbanner.jpg');">

                        <div class="container mx-auto">
                            <div
                                class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide bg-red-200 bg-opacity-75">
                                <p class="text-black text-2xl my-4">Why are fishmongers the worst friends?</p>
                                <p class="text-black text-2xl my-4">They selfish</p>
                                
                            </div>
                        </div>

                    </div>
                </div>
                <label for="carousel-3"
                    class="prev control-4 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-5"
                    class="next control-4 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                <!--Slide 5-->
                <input class="carousel-open" type="radio" id="carousel-5" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom"
                        style="background-image: url('/images/banner/greengrocerbanner.jpg');">

                        <div class="container mx-auto">
                            <div
                                class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide bg-red-200 bg-opacity-75">
                                <p class="text-black text-2xl my-4">What does a cannibalistic vegan eat?</p>
                                <p class="text-black text-2xl my-4">A greengrocer.</p>
                                
                            </div>
                        </div>

                    </div>
                </div>
                <label for="carousel-4"
                    class="prev control-5 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-1"
                    class="next control-5 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                <!-- Add additional indicators for each slide-->
                <ol class="carousel-indicators">
                    <li class="inline-block mr-3">
                        <label for="carousel-1"
                            class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-2"
                            class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-3"
                            class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-4"
                            class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-5"
                            class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                </ol>

            </div>
        </div>

        <section class="bg-white py-8">

            <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

                <div id="store" class="w-full z-30 top-0 px-6 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                        <span
                            class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl ">
                            Store
                        </span>

                        <div class="flex items-center" id="store-nav-content">

                            <div class="relative">
                                <!-- Dropdown toggle button -->
                                <button
                                    class="filter-btn relative z-10 block p-2 bg-white rounded-md dark:bg-gray-800 focus:outline-none">
                                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div
                                    class="show-filter absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800 hidden">
                                    <a href="{{ URL::current() }}"
                                        class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                        Default
                                    </a>
                                    <a href="{{ URL::current() . '?sort=high-price' }}"
                                        class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                        High to Low price
                                    </a>
                                    <a href="{{ URL::current() . '?sort=low-price' }}"
                                        class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                        Low to High Price
                                    </a>
                                    <a href="{{ URL::current() . '?sort=latest' }}"
                                        class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                        Latest
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="md:grid grid-cols-2 lg:grid-cols-3 gap-10 p-6">


                    @foreach ($products as $product)

                        <div class="mb-4 lg:flex overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">

                            <!-- Product Image -->
                            <div>
                                <a href="{{ route('product', $product->id) }}">
                                    <img src="/images/products/{{ $product->prod_image }}"
                                        alt="{{ $product->prod_name }}" class="object-contain h-52 w-full">
                                </a>
                            </div>

                            <!-- Product details -->
                            <div class="p-4 md:p-4">

                                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                                    <a href="{{ route('product', $product->id) }}" class="font-bold">
                                        {{ $product->prod_name }}
                                    </a>
                                </h1>

                                @php
                                    preg_match('/^([^.]+)/', $product->prod_descrip, $firstSentence);
                                @endphp
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $firstSentence[1] }}</p>

                                <!-- Product ratings -->
                                <div class="flex mt-2 item-center">

                                    @if ($product->reviews->count())

                                        <!-- Add user's ratings out of 5. -->
                                        @for($i = 0; $i < round(($product->reviews->sum('review_rating') /
                                            ($product->reviews->count() * 5)) * 5); $i++)

                                            <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                            </svg>

                                    @endfor

                                    <!-- Add the remaining ratings without color. -->
                                    @if(round(($product->reviews->sum('review_rating') / ($product->reviews->count() * 5)) *
                                    5) < 5) @for($i=0; $i < (5 - round(($product->reviews->sum('review_rating') /
                                        ($product->reviews->count() * 5)) * 5)); $i++)
                                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                    @endfor
                    @endif

                @else

                    <!-- Display empty starts for no ratings -->
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                        </svg>
                    @endfor
                    @endif

                </div>


                <div class="mt-3 item-center space-y-2">

                    <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">£{{ number_format((float) $product->price, 2, '.', '') }}</h1>

                    <h1 class="text-sm font-medium text-gray-700 dark:text-gray-200 md:text-lg">

                        @if ($product->prod_quantity > 0)
                            In Stock
                        @else
                            Out Of Stock
                        @endif

                    </h1>

                    @if (auth()->user())

                        @if (auth()->user()->user_type == 'customer')

                            <!-- Add to wishlist -->

                            <form action="{{ route('addToWishlist', $product) }}" method="POST">
                                @csrf
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </form>

                            <!-- Add to cart -->

                            <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                @csrf
                                <button
                                    class="px-2 py-1 text-xs font-bold text-white uppercase 
                                                                                                                                            transition-colors duration-200 transform bg-gray-800 rounded 
                                                                                                                                            dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 
                                                                                                                                            focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Add
                                    to
                                    Cart
                                </button>

                            </form>

                        @endif

                    @endif

                    @guest

                        <!-- Add to wishlist -->

                        <form action="{{ route('addToWishlist', $product) }}" method="POST">
                            @csrf
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </form>

                        <!-- Add to cart -->

                        <form action="{{ route('addToCart', $product->id) }}" method="POST">
                            @csrf
                            <button
                                class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Add
                                to Cart
                            </button>

                        </form>

                    @endguest

                </div>
            </div>

    </div>

    @endforeach

    </div>
    <div class="mt-6 flex justify-center">
        <div>
            {{ $products->links() }}
        </div>

    </div>

    </div>

    </section>
    </div>

    <script>
        // Menu button close open
        const filterBtn = document.querySelector('.filter-btn');
        const showFilter = document.querySelector('.show-filter');

        filterBtn.addEventListener('click', () => {
            showFilter.classList.toggle('hidden');
        });

        //message time

        const messages = document.getElementById('messages');

        setTimeout(function() {
            messages.remove();
        }, 3000);


    </script>
@endsection
