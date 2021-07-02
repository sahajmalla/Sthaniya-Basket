@extends('layouts.app')
@section('content')

    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white w-11/12 bg-white shadow-lg">

        <main class="my-4">

            <div class="container mx-auto px-6">
                <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>

                <!-- Form and order summary -->

                <div class="space-y-6 lg:space-y-0 lg:space-x-16 lg:flex lg:flex-row my-6">

                    <!-- Form -->
                    <form action="{{ route('checkout.add', [$total_price, $total_items_quantity, $cartAndProductRecords->count()]) }}" method="POST" class="p-8 border rounded-md">

                        @csrf
                        <div class="leading-loose">


                            <div class="space-y-5 md:flex md:space-y-0 space-x-10">

                                <!-- Final details -->
                                <div class="border rounded-md p-8">

                                    <h1 class="text-center font-bold text-xl mb-8 uppercase">Final Details</h1>

                                    <div class="mb-8">
                                        <div class="mb-8 p-4 bg-gray-100 rounded-full">
                                            <h1 class="ml-2 font-bold uppercase">Collection Information</h1>
                                        </div>

                                        <!-- Collection day select -->

                                        <div class="sm:flex mb-6">

                                            <label class="text-sm w-4/12 font-bold text-gray-700 mr-2">Collection Day:</label>

                                            <select name="collectionDay" onchange="setCollectionDay()"
                                            id="select-collection-day" 
                                            class="w-full h-10 md:w-8/12 px-2 py-1 text-gray-700 bg-gray-200 rounded">

                                            @if($currentDateTime->format('l') === 'Wednesday')
                                                <option>Wednesday (next week)</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                            @elseif($currentDateTime->format('l') === 'Thursday')
                                                <option>Wednesday</option>
                                                <option>Thursday (next week)</option>
                                                <option>Friday</option>
                                            @elseif($currentDateTime->format('l') === 'Friday')
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday (next week)</option>
                                            @else
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                            @endif

                                            </select>
        
                                        </div>

                                        <div class="sm:flex mb-6">

                                            <label class="text-sm w-4/12 font-bold text-gray-700 mr-2">Collection Date:</label>

                                            <input class="w-full h-10 md:w-8/12 p-2 text-gray-700 bg-gray-200" type="date" 
                                            id="dob" name="dob" min="{{ $tomorrowDateTime->toDateString() }}">
        
                                        </div>

                                        <!-- Collection time slot select -->

                                        <div class="sm:flex">

                                            <label class="text-sm w-4/12 font-bold text-gray-700 mr-2">Collection Slot Time:</label>

                                            <select name="collectionTime" onchange="setCollectionTime()" 
                                            id="select-collection-time" 
                                            class="w-full h-10 md:w-8/12 px-2 py-1 text-gray-700 bg-gray-200 rounded">

                                                <option>10-13</option>
                                                <option>13-16</option>
                                                <option>16-19</option>

                                            </select>
        
                                        </div>

                                    </div>

                                    <!-- Payment method select -->
                                    <div class="mb-8">
                                        <div class="mb-8 p-4 bg-gray-100 rounded-full">
                                            <h1 class="ml-2 font-bold uppercase">Payment Information</h1>
                                        </div>

                                        <div class="sm:flex">

                                            <label class="mr-2 text-sm w-4/12 font-bold text-gray-700">Payment Method:</label>

                                            <select name="payment" 
                                            id="select-payment-method" 
                                            class="w-full h-10 sm:w-8/12 px-2 py-1 text-gray-700 bg-gray-200 rounded">

                                                <option>PayPal</option>

                                            </select>

                                        </div>
                                    </div>
                                    
                                    <!-- Discount code -->
                                    <div class="mb-8">
                                        <div class="p-4 bg-gray-100 rounded-full">
                                            <h1 class="ml-2 font-bold uppercase">Discount Coupon Code</h1>
                                        </div>
                                        <div class="p-4">
                                            <p class="mb-4 italic">If you have a Discount coupon code, please enter it in the box below</p>
                                            <div class="justify-center md:flex">
                                                <form action="" method="POST">
                                                    <div
                                                        class="flex items-center w-full h-13 pl-3 bg-white bg-gray-100 border rounded-full">
                                                        <input type="coupon" name="code" id="coupon" placeholder="Apply coupon"
                                                            value=""
                                                            class="w-full bg-gray-100 outline-none appearance-none focus:outline-none active:outline-none" />
                                                        <button type="submit"
                                                            class="text-sm flex items-center px-3 py-1 text-white bg-gray-800 rounded-full outline-none md:px-4 hover:bg-gray-700 focus:outline-none active:outline-none">
                                                            <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                    d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z" />
                                                            </svg>
                                                            <span class="font-medium">Apply discount coupon</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="p-4 mt-6 bg-gray-100 rounded-full">
                                            <h1 class="ml-2 font-bold">Instruction for seller</h1>
                                        </div>
                                        <div class="p-4">
                                            <p class="mb-4 italic">If you have some information for the seller you can leave them in the box
                                                below</p>
                                            <textarea class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <!-- Order Summary. -->
                                
                                <div class="border rounded-md p-4">

                                    <h1 class="text-center font-bold text-xl mb-2 uppercase">Order Summary</h1>
        
                                    <div class="p-4">
    
                                        <div class="flex justify-between border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Items:</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                <p>{{ $cartAndProductRecords->count() }}</p>
                                            </div>
                                        </div>
    
                                        <div class="flex justify-between border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Items Quantity:</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                <p>{{ $total_items_quantity }}</p>
                                            </div>
                                        </div>
    
                                        <div class="flex justify-between border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Payment Method:</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                <p class="payment-method">PayPal</p>
                                            </div>
                                        </div>

                                        <div class="flex justify-between pt-4 border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Collection Day:</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                @if($currentDateTime->format('l') === 'Wednesday')
                                                    <p class="collection-day">Wednesday (next week)</p>
                                                @else
                                                    <p class="collection-day">Wednesday</p>
                                                @endif
                                            </div>
                                        </div>
    
                                        <div class="flex justify-between pt-4 border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Collection Time:</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                <p class="collection-time">10-13</p>
                                            </div>
                                        </div>
    
                                        <div class="flex justify-between border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Subtotal</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                <p>£{{ $total_price }}</p>
                                            </div>
                                        </div>
    
                                        <div class="flex justify-between pt-4 border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Discount</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                <p>£3,000 (10%)</p>
                                            </div>
                                        </div>
    
                                        <div class="flex justify-between pt-4 border-b">
                                            <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-gray-800">
                                                <p>Order Total:</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-gray-900">
                                                <p>£27,000</p>
                                            </div>
                                        </div>
    
                                        <p class="text-center my-6 italic">By placing an order, you agree to Sthaniya Basket's
                                            <span class="underline font-bold">Privacy Policy</span> and
                                            <span class="underline font-bold">Terms of Use.</span>
                                        </p>
    
                                        <button
                                            class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                            <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                            </svg>
                                            <span class="ml-2 mt-5px">Place your order</span>
                                        </button>
                                    </div>
    
                                </div>

                            </div>

                        </div>

                    </form>

                    {{-- <!-- Order Summary -->

                    <div class="">

                        <div class="flex justify-center lg:justify-end">

                          
                        </div>
                        
                    </div> --}}

                </div>

                <!-- Review items -->
                <div class="border rounded-md p-5 mb-10 w-full">
                    
                    <h1 class="font-bold text-xl mb-4 uppercase">Review Items</h1>

                    @if ($cartAndProductRecords->count())

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

                                @foreach ($cartAndProductRecords as $cartAndProductRecord)
                                
                                    <tr>
                                        <td class="hidden pb-4 md:table-cell">
                                            <a href="#">
                                                <img src="/images/products/{{ $cartAndProductRecord->prod_image }}"
                                                    class="w-20 rounded" alt="Thumbnail">
                                            </a>
                                        </td>

                                        <td>
                                            <a href="">
                                                <p class="mb-2">{{ $cartAndProductRecord->prod_name }}</p>
                                            </a>
                                        </td>

                                        <td class="hidden text-center md:table-cell">
                                            <span class="text-xs lg:text-base">
                                                {{ $cartAndProductRecord->prod_descrip }}
                                            </span>
                                        </td>

                                        <td class="flex justify-center md:mt-4">
                                            <p>{{ $cartAndProductRecord->product_quantity }}</p>
                                        </td>

                                        <td class="text-right">
                                            <form action="{{ route('cart.destroy', $cartAndProductRecord->product_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                class="text-white bg-red-500 p-1 rounded-lg hover:bg-red-700 md:ml-4">
                                                    <small class="m-2">Remove item</small>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    @endif

                </div>

            </div>
        </main>

    </div>

    <script>

        // Change collection time by the drop down select list:
        function setCollectionTime() {
            
            var selectCollectionTime = document.getElementById('select-collection-time');
            var selectedValue = selectCollectionTime.options[selectCollectionTime.selectedIndex].value;
            const traShop = document.querySelector('.collection-time');

            traShop.innerHTML = selectedValue;
        }

        // Change collection day method by the drop down select list:
        function setCollectionDay() {
            
            var selectColelctionDay = document.getElementById('select-collection-day');
            var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
            const collectionDay = document.querySelector('.collection-day');

            collectionDay.innerHTML = selectedValue;
        }

    </script>

@endsection