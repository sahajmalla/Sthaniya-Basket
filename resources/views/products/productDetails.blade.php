@extends('layouts.app')
@section('content')

    <section class="w-10/12 space-y-10 shadow-lg rounded-lg p-8 text-gray-600 body-font overflow-hidden">

        <div class="flex w-12/12 justify-center">

            @if (session('addedToWishlist'))
                <p id="messages" class="p-4 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('addedToWishlist') }}</p>
            @elseif(session('failedToAddToWishlist'))
                <p id="messages" class="p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('failedToAddToWishlist') }}</p>
            @elseif(session('addedToCart'))
                <p id="messages" class="p-4 text-lg text-center w-6/12 text-white rounded-lg bg-green-500 font-medium">
                    {{ session('addedToCart') }}</p>
            @elseif(session('failedToAddToCart'))
                <p id="messages" class="p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('failedToAddToCart') }}</p>
            @elseif(session('status'))
                <p id="messages" class="p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('status') }}
                </p>
            @endif

        </div>

        <div class="mb-8">

            <!-- Selected product's image and details -->
            <div class="container mx-auto">

                <div class="lg:w-4/5 mx-auto flex flex-wrap">

                    <!--- Product Image-->
                    <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                        src="/images/products/{{ $product->prod_image }}">

                    <!---Product details-->
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

                        <div class="space-y-4">

                            <!---Trader name-->
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">Trader: {{ $trader->firstname }}
                                {{ $trader->lastname }}</h2>

                            <!---Product name-->
                            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->prod_name }}</h1>

                            <!---Rating-->
                            <div class="flex mb-4">

                                <!-- Product ratings -->
                                <span class="flex items-center">

                                    <!-- Add product's ratings out of 5. -->
                                    @for ($i = 0; $i < $ratingsInStars; $i++)
                                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                            </path>
                                        </svg>
                                    @endfor

                                    <!-- Add the remaining ratings without color. -->
                                    @if ($ratingsInStars < 5)
                                        @for ($i = 0; $i < 5 - $ratingsInStars; $i++) <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                            </path>
                                                        </svg> @endfor @endif

                                            <span class="text-gray-600 ml-3">{{ $reviews->total() }}
                                                {{ Str::plural('rating', $reviews->count()) }}</span>
                                </span>
                            </div>

                            <!-- Quanity -->
                            <div class="flex space-x-2 items-baseline">
                                @if ($product->prod_quantity > 0)
                                    <h1 class="text-sm font-medium text-gray-700 dark:text-gray-200 md:text-lg">In Stock
                                    </h1>
                                    <p class="text-sm font-medium text-gray-500">Only {{ $product->prod_quantity }} items
                                        left.</p>
                                @else
                                    <h1 class="text-sm font-medium text-gray-700 dark:text-gray-200 md:text-lg">Out Of Stock
                                    </h1>
                                @endif
                            </div>

                            <!---description-->
                            <div class="space-y-4">

                                <p class="leading-relaxed border-b">{{ $product->prod_descrip }}</p>

                                @if($product->allergy)

                                    <p class="leading-relaxed border-b">Allergy information: {{ $product->allergy }}</p>

                                @endif

                            </div>
                        </div>

                        <div class="flex mt-5">
                            <span class="title-font font-medium text-2xl text-gray-900">£{{ $product->price }}</span>

                            <!-- Only show add to wishlist/cart buttons to customers and guests -->
                            @if (auth()->user())

                                @if (auth()->user()->user_type == 'customer')

                                    <!-- Add to cart button -->

                                    <div class="ml-auto">
                                        <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                            @csrf
                                            <button
                                                class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                                Add To Cart
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Wishlist icon -->

                                    <form action="{{ route('addToWishlist', $product) }}" method="POST">
                                        @csrf
                                        <button
                                            class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                                </path>
                                            </svg>
                                        </button>

                                    </form>

                                @endif

                            @endif

                            @guest

                                <!-- Add to cart button -->

                                <div class="ml-auto">
                                    <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                        @csrf
                                        <button
                                            class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                            Add To Cart
                                        </button>
                                    </form>
                                </div>

                                <!-- Wishlist icon -->

                                <form action="{{ route('addToWishlist', $product) }}" method="POST">
                                    @csrf
                                    <button
                                        class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            class="w-5 h-5" viewBox="0 0 24 24">
                                            <path
                                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                            </path>
                                        </svg>
                                    </button>

                                </form>

                            @endguest


                        </div>
                    </div>
                </div>

            </div>

            <!-- Top reviews -->
            <div class="shadow-lg rounded-lg p-4">

                <h1 class="text-gray-600 text-2xl font-bold mb-8 mt-4">Top reviews</h1>

                <div class="grid grid-cols-2 gap-8 mb-8">

                    @if ($reviews->count())

                        @foreach ($reviews as $review)

                            <div class="flex items-start shadow-lg rounded-lg p-4">

                                <div class="flex-shrink-0">
                                    <div class="inline-block relative">
                                        <div class="relative w-16 h-16 rounded-full overflow-hidden">
                                            <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover"
                                                src="https://picsum.photos/id/646/200/200" alt="Profile picture">
                                            <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner">
                                            </div>
                                        </div>
                                        <svg class="fill-current text-white bg-green-600 rounded-full p-1 absolute bottom-0 right-0 w-6 h-6 -mx-1 -my-1"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M19 11a7.5 7.5 0 0 1-3.5 5.94L10 20l-5.5-3.06A7.5 7.5 0 0 1 1 11V3c3.38 0 6.5-1.12 9-3 2.5 1.89 5.62 3 9 3v8zm-9 1.08l2.92 2.04-1.03-3.41 2.84-2.15-3.56-.08L10 5.12 8.83 8.48l-3.56.08L8.1 10.7l-1.03 3.4L10 12.09z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="ml-6">

                                    <!-- User's name and time review was made.-->
                                    <p class="flex items-baseline space-x-2">
                                        <span
                                            class="text-gray-600 font-bold text-lg">{{ $review->customer->user->firstname }}
                                            {{ $review->customer->user->lastname }}</span>
                                        <span class="text-gray-600 text-xs">{{ $review->created_at->diffForHumans() }}
                                        </span>

                                    </p>

                                    <div class="mt-4 text-gray-600">

                                        <!-- Heading and rating-->

                                        <div class="flex items-center">
                                            <span class="text-sm">Product Quality</span>

                                            <!-- User ratings-->
                                            <div class="flex items-center ml-2">

                                                <!-- Add user's ratings out of 5. -->
                                                @for ($i = 0; $i < $review->review_rating; $i++)

                                                    <svg class="w-3 h-3 fill-current text-yellow-600"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>

                                                @endfor

                                                <!-- Add the remaining ratings without color. -->

                                                @if ($ratingsInStars < 5 && $review->review_rating < 4)
                                                    @for ($i = 0; $i < 5 - $review->review_rating;
                                                        $i++) <svg class="w-3 h-3 fill-current
                                                        text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10
                                                        0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                        </svg> @endfor
                                                @endif

                                                <!-- If user's rating is 4, the above loop will not add the remaining uncolored star so doing it below. -->
                                                @if ($review->review_rating == 4)
                                                    <svg class="w-3 h-3 fill-current text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                @endif

                                            </div>
                                        </div>

                                    </div>

                                    <div class="mt-3">
                                        <span class="font-bold">- {{ $review->review }}</span>
                                    </div>

                                    @auth

                                        @if (auth()->user()->user_type == 'customer')

                                            <div class="mt-3">

                                                @can('delete', $review)
                                                    <form action="{{ route('review.destroy', $review) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- Method spoofing -->
                                                        <button class="font-medium text-xs text-white bg-red-600 p-2 rounded-lg">
                                                            Remove
                                                        </button>

                                                    </form>
                                                @endcan

                                            </div>

                                        @endif

                                    @endauth

                                </div>

                            </div>

                        @endforeach

                    @else
                        <p class="text-gray-600 font-medium text-lg">There are no reviews yet.</p>
                    @endif

                </div>
            </div>

            {{ $reviews->links() }}

            <!-- Post review and review chart: Trader and non-authenticated users can't post a review. -->

            <div class="w-full">
                <div class="shadow-lg rounded-lg">
                    <div class="my-5 mx-auto">

                        <!-- Review chart and it's heading for product-->
                        <div class="mb-1 tracking-wide px-4 py-4">

                            <h2 class="text-gray-800 font-bold my-4 text-lg">
                                {{ $product->reviews->count() }}
                                User
                                {{ Str::plural('review', $product->reviews->count()) }}
                            </h2>

                            @if ($product->reviews->count())
                                <!-- Review chart and it's ratings percentage -->
                                <div class="border-b -mx-8 px-8 pb-3">

                                    <div class="flex items-center mt-1">

                                        <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                            <span>5 star</span>
                                        </div>

                                        <div class="w-3/5">
                                            <div class="bg-gray-300 w-full rounded-lg h-2">
                                                <div style="width:{{ ($review->where('review_rating', '5')->where('product_id', $product->id)->count() /
    $review->where('product_id', $product->id)->count()) *
    100 }}%"
                                                    class="bg-indigo-600 rounded-lg h-2"></div>
                                            </div>
                                        </div>

                                        <div class="w-1/5 text-gray-700 pl-3">
                                            <span
                                                class="text-sm">{{ round(
    ($review->where('review_rating', '5')->where('product_id', $product->id)->count() /
        $review->where('product_id', $product->id)->count()) *
        100,
) }}%</span>
                                        </div>

                                    </div>

                                    <div class="flex items-center mt-1">
                                        <div class="w-1/5 text-indigo-500 tracking-tighter">
                                            <span>4 star</span>
                                        </div>
                                        <div class="w-3/5">
                                            <div class="bg-gray-300 w-full rounded-lg h-2">
                                                <div style="width:{{ ($review->where('review_rating', '4')->where('product_id', $product->id)->count() /
    $review->where('product_id', $product->id)->count()) *
    100 }}%"
                                                    class="bg-indigo-600 rounded-lg h-2"></div>
                                            </div>
                                        </div>
                                        <div class="w-1/5 text-gray-700 pl-3">
                                            <span
                                                class="text-sm">{{ round(
    ($review->where('review_rating', '4')->where('product_id', $product->id)->count() /
        $review->where('product_id', $product->id)->count()) *
        100,
) }}%</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center mt-1">
                                        <div class="w-1/5 text-indigo-500 tracking-tighter">
                                            <span>3 star</span>
                                        </div>
                                        <div class="w-3/5">
                                            <div class="bg-gray-300 w-full rounded-lg h-2">
                                                <div style="width:{{ ($review->where('review_rating', '3')->where('product_id', $product->id)->count() /
    $review->where('product_id', $product->id)->count()) *
    100 }}%"
                                                    class="bg-indigo-600 rounded-lg h-2"></div>
                                            </div>
                                        </div>
                                        <div class="w-1/5 text-gray-700 pl-3">
                                            <span
                                                class="text-sm">{{ round(
    ($review->where('review_rating', '3')->where('product_id', $product->id)->count() /
        $review->where('product_id', $product->id)->count()) *
        100,
) }}%</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center mt-1">
                                        <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                            <span>2 star</span>
                                        </div>
                                        <div class="w-3/5">
                                            <div class="bg-gray-300 w-full rounded-lg h-2">
                                                <div style="width:{{ ($review->where('review_rating', '2')->where('product_id', $product->id)->count() /
    $review->where('product_id', $product->id)->count()) *
    100 }}%"
                                                    class="bg-indigo-600 rounded-lg h-2"></div>
                                            </div>
                                        </div>
                                        <div class="w-1/5 text-gray-700 pl-3">
                                            <span
                                                class="text-sm">{{ round(
    ($review->where('review_rating', '2')->where('product_id', $product->id)->count() /
        $review->where('product_id', $product->id)->count()) *
        100,
) }}%</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center mt-1">
                                        <div class="w-1/5 text-indigo-500 tracking-tighter">
                                            <span>1 star</span>
                                        </div>
                                        <div class="w-3/5">
                                            <div class="bg-gray-300 w-full rounded-lg h-2">
                                                <div style="width:{{ ($review->where('review_rating', '1')->where('product_id', $product->id)->count() /
    $review->where('product_id', $product->id)->count()) *
    100 }}%"
                                                    class="bg-indigo-600 rounded-lg h-2"></div>
                                            </div>
                                        </div>
                                        <div class="w-1/5 text-gray-700 pl-3">
                                            <span
                                                class="text-sm">{{ round(
    ($review->where('review_rating', '1')->where('product_id', $product->id)->count() /
        $review->where('product_id', $product->id)->count()) *
        100,
) }}%</span>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="border-b -mx-8 px-8 pb-3">

                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="flex items-center mt-1">

                                            <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                                <span>{{ $i }} star</span>
                                            </div>

                                            <div class="w-3/5">
                                                <div class="bg-gray-300 w-full rounded-lg h-2">
                                                    <div style="width:0%" class="bg-indigo-600 rounded-lg h-2"></div>
                                                </div>
                                            </div>

                                            <div class="w-1/5 text-gray-700 pl-3">
                                                <span class="text-sm">0%</span>
                                            </div>

                                        </div>
                                    @endfor

                                </div>
                            @endif


                        </div>

                        @auth
                            @if (auth()->user()->user_type !== 'trader')
                                <div class="w-full px-4 py-2">

                                    <h3 class="font-bold text-2xl tracking-tight mb-2">Review this item</h3>

                                    <div class="mb-8">

                                        <!-- Write a review button -->

                                        <button class="write-review bg-gray-700 px-3 py-1 rounded text-white mt-2">
                                            Write a review
                                        </button>

                                        <!-- comment form -->

                                        <form action="{{ route('review', $product) }}" method="POST" class="comment-form hidden w-full max-w-xl 
                                                                    bg-white rounded-lg pt-2">
                                            @csrf
                                            <div class="flex flex-wrap -mx-3 mb-6">

                                                {{-- <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Review</h2> --}}

                                                <div class="w-full md:w-full px-3 mb-2 mt-2">

                                                    <textarea name="body" id="body" cols="30" rows="4"
                                                        class="bg-gray-100
                                                                    border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                                                        placeholder='Write a Review!'>{{ old('body') }}</textarea>

                                                    @error('body')
                                                        <div class="text-red-500 mt-2 text-sm">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>

                                                <!-- Ratings drop-down list -->

                                                <div class="mb-4 ml-3">

                                                    <select name="rating" class="w-full h-10 bg-gray-100 border 
                                                                                border-gray-300 px-4 py-2 pr-8 rounded-lg border-2 text-gray-400 
                                                                                @error('rating') border-red-500 @enderror"
                                                        value="{{ old('rating') }}">

                                                        <option disabled selected>Rating</option>
                                                        <option value="5">5</option>
                                                        <option value="4">4</option>
                                                        <option value="3">3</option>
                                                        <option value="2">2</option>
                                                        <option value="1">1</option>

                                                    </select>

                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex 
                                                                                items-center px-2 text-gray-700">

                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 
                                                                                                                        6.586 4.343 8z" />
                                                        </svg>

                                                    </div>

                                                    @error('rating')
                                                        <div class="text-red-500 mt-2 text-sm">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>

                                                <div class="space-x-2 w-full md:w-full flex items-start md:w-full px-3">

                                                    <div class="-mr-1">
                                                        <input type='submit'
                                                            class="bg-blue-600 text-white font-medium py-1 px-4 border border-blue-800 rounded-lg tracking-wide mr-1 hover:bg-blue-800"
                                                            value='Post Review'>
                                                    </div>

                                                </div>
                                        </form>
                                    </div>

                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Similar products -->
            <div class="w-full">
                <div class="p-8">

                    <h1 class="text-2xl font-bold text-gray-600 mt-4 mb-8">Similar Products</h1>

                    <div class="md:grid grid-cols-2 gap-8 mb-2">

                        @foreach ($products as $prod)

                            @if ($product->id !== $prod->id)
                                <div class="mb-4 lg:flex overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">

                                    <!-- Product Image -->
                                    <div>
                                        <a href="{{ route('product', $prod->id) }}">
                                            <img src="/images/products/{{ $prod->prod_image }}"
                                                alt="{{ $prod->prod_name }}" class="object-contain h-52 w-full">
                                        </a>
                                    </div>

                                    <!-- Product details -->
                                    <div class="p-4 md:p-4">

                                        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                                            <a href="{{ route('product', $prod->id) }}" class="font-bold">
                                                {{ $prod->prod_name }}
                                            </a>
                                        </h1>

                                        @php
                                            preg_match('/^([^.]+)/', $prod->prod_descrip, $firstSentence);
                                        @endphp
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $firstSentence[1] }}
                                        </p>






                                        <!-- Product ratings -->
                                        <div class="flex mt-2 item-center">

                                            @if ($prod->reviews->count())

                                                <!-- Add user's ratings out of 5. -->
                                                @for($i = 0; $i < round(($prod->reviews->sum('review_rating') /
                                                    ($prod->reviews->count() * 5)) * 5); $i++)

                                                    <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-300"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                    </svg>

                                            @endfor

                                            <!-- Add the remaining ratings without color. -->
                                            @if(round(($prod->reviews->sum('review_rating') / ($prod->reviews->count() * 5))
                                            * 5) < 5) @for($i=0; $i < (5 - round(($prod->reviews->sum('review_rating') /
                                                ($prod->reviews->count() * 5)) * 5)); $i++)
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

                        <!-- Price -->
                        <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">£{{ $prod->price }}
                        </h1>

                        <!-- Quantity stock -->
                        <h1 class="text-sm font-medium text-gray-700 dark:text-gray-200 md:text-lg">

                            @if ($product->prod_quantity > 0)
                                In Stock
                            @else
                                Out Of Stock
                            @endif

                        </h1>

                        <!-- Only show add to wishlist/cart buttons to customers and guests -->
                        @if (auth()->user())

                            @if (auth()->user()->user_type == 'customer')

                                <!-- Add to wishlist -->

                                <form action="{{ route('addToWishlist', $prod) }}" method="POST">
                                    @csrf
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>

                                <!-- Add to cart -->

                                <form action="{{ route('addToCart', $prod->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="px-2 py-1 text-xs font-bold text-white uppercase 
                                                                    transition-colors duration-200 transform bg-gray-800 rounded 
                                                                    dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 
                                                                    focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Add
                                        to Cart
                                    </button>

                                </form>

                            @endif

                        @endif

                        @guest

                            <!-- Add to wishlist -->

                            <form action="{{ route('addToWishlist', $prod) }}" method="POST">
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

                            <form action="{{ route('addToCart', $prod->id) }}" method="POST">
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

                        @endguest

                    </div>
                </div>

            </div>

            @endif

            @endforeach

        </div>

        </div>
        </div>

        </div>

        <!-- Open and close review text area-->
        <script>

            //write comment open close
            const writeBtn = document.querySelector('.write-review');
            const writeCancel = document.querySelector('.write-cancel');
            const comntForm = document.querySelector('.comment-form');
            writeBtn.addEventListener('click', () => {
                if (comntForm.classList.contains('hidden')) {
                    comntForm.classList.remove('hidden');
                    writeBtn.innerHTML = "Cancel";
                } else {
                    comntForm.classList.add('hidden');
                    writeBtn.innerHTML = "Write a review";
                }
            });
            
            //message time
            setTimeout(function() {
                document.getElementById('messages').remove();
            }, 3000);

        </script>

    </section>
@endsection
