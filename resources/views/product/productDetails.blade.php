@extends('layouts.app')
@section('content')
    <section class="w-10/12 space-y-10 text-gray-600 body-font overflow-hidden">
      
        <div class="container mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <!---image-->
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="https://dummyimage.com/400x400">
                <!---right side-->
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <!---brand name-->
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">BRAND NAME</h2>
                    <!---product name-->
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">The Catcher in the Rye</h1>
                    <!---rating-->
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <span class="text-gray-600 ml-3">4 Reviews</span>
                        </span>
                    </div>
                    <!---description-->
                    <p class="leading-relaxed border-b">Fam locavore kickstarter distillery. Mixtape chillwave tumeric
                        sriracha
                        taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn.
                        Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra
                        jean shorts keytar banjo tattooed umami cardigan.</p>
                    <div class="flex mt-5">
                        <span class="title-font font-medium text-2xl text-gray-900">$58.00</span>
                        <button
                            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                        <button
                            class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="flex justify-center space-x-4">

            <!-- top reviews -->
            <div class="w-5/12 flex items-start shadow-lg rounded-lg p-4">
                <div class="flex-shrink-0">
                    <div class="inline-block relative">
                        <div class="relative w-16 h-16 rounded-full overflow-hidden">
                            <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover"
                                src="https://picsum.photos/id/646/200/200" alt="Profile picture">
                            <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
                        </div>
                        <svg class="fill-current text-white bg-green-600 rounded-full p-1 absolute bottom-0 right-0 w-6 h-6 -mx-1 -my-1"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M19 11a7.5 7.5 0 0 1-3.5 5.94L10 20l-5.5-3.06A7.5 7.5 0 0 1 1 11V3c3.38 0 6.5-1.12 9-3 2.5 1.89 5.62 3 9 3v8zm-9 1.08l2.92 2.04-1.03-3.41 2.84-2.15-3.56-.08L10 5.12 8.83 8.48l-3.56.08L8.1 10.7l-1.03 3.4L10 12.09z" />
                        </svg>
                    </div>
                </div>
                <div class="ml-6">
                    <p class="flex items-baseline">
                        <span class="text-gray-600 font-bold">Mary T.</span>
                        <span class="ml-2 text-green-600 text-xs">Verified Buyer</span>
                    </p>
                    <div class="flex items-center mt-1">
                        <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                        <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                        </svg>
                    </div>
                    <div class="flex items-center mt-4 text-gray-600">
                        <div class="flex items-center">
                            <span class="text-sm">Product Quality</span>
                            <div class="flex items-center ml-2">
                                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center ml-4">
                            <span class="text-sm">Purchasing Experience</span>
                            <div class="flex items-center ml-2">
                                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <svg class="w-3 h-3 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="font-bold">Sapien consequat eleifend!</span>
                        <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
                </div>
            </div>
        
            <!-- review item -->
            <div class="w-5/12">
                <div class="my-5 mx-auto shadow-lg rounded-lg">
                    <div class="mb-1 tracking-wide px-4 py-4">
                        <h2 class="text-gray-800 font-semibold mt-1">67 Users reviews</h2>
                        <div class="border-b -mx-8 px-8 pb-3">
                            <div class="flex items-center mt-1">
                                <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                    <span>5 star</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-7/12 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">51%</span>
                                </div>
                            </div><!-- first -->
                            <div class="flex items-center mt-1">
                                <div class="w-1/5 text-indigo-500 tracking-tighter">
                                    <span>4 star</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class="w-1/5 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">17%</span>
                                </div>
                            </div><!-- second -->
                            <div class="flex items-center mt-1">
                                <div class="w-1/5 text-indigo-500 tracking-tighter">
                                    <span>3 star</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-3/12 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">19%</span>
                                </div>
                            </div><!-- thierd -->
                            <div class="flex items-center mt-1">
                                <div class=" w-1/5 text-indigo-500 tracking-tighter">
                                    <span>2 star</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-1/5 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">8%</span>
                                </div>
                            </div><!-- 4th -->
                            <div class="flex items-center mt-1">
                                <div class="w-1/5 text-indigo-500 tracking-tighter">
                                    <span>1 star</span>
                                </div>
                                <div class="w-3/5">
                                    <div class="bg-gray-300 w-full rounded-lg h-2">
                                        <div class=" w-2/12 bg-indigo-600 rounded-lg h-2"></div>
                                    </div>
                                </div>
                                <div class="w-1/5 text-gray-700 pl-3">
                                    <span class="text-sm">5%</span>
                                </div>
                            </div><!-- 5th -->
                        </div>
                    </div>
                    <div class="w-full px-4 py-2">
                        <h3 class="font-medium tracking-tight">Review this item</h3>
                        <button
                            class="write-review bg-gray-100 border border-gray-400 px-3 py-1 rounded text-gray-800 my-2">Write
                            a review
                        </button>
                        <!-- comment form -->

                        <form class="comment-form hidden w-full max-w-xl bg-white rounded-lg pt-2">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea
                                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                        name="body" placeholder='Type Your Comment' required></textarea>
                                </div>
                                <div class="space-x-2 w-full md:w-full flex items-start md:w-full px-3">

                                    <div class="-mr-1">
                                        <input type='submit'
                                            class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                            value='Post Comment'>
                                    </div>
                                    <div class="-mr-1">
                                        <input type='submit'
                                            class="write-cancel bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                            value='Cancel'>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>

            
        </div>
        <!-- more products -->
        <div>

        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </section>
@endsection
