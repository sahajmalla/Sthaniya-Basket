@extends('layouts.app')
@section('content')

<section class="w-10/12 space-y-10 shadow-lg rounded-lg p-5 text-gray-600 body-font overflow-hidden">
      
    <div class="container mx-auto p-2">

        <h1 class="text-center font-bold text-4xl mb-10 uppercase">Order</h1>

        <div class="lg:w-10/12 flex justify-between">

            <!-- Order Summary-->
            <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">

                <div class="flex justify-center lg:justify-end">

                    <div class="border rounded-md max-w-md w-full px-4 py-3">

                        <h1 class="text-center font-bold text-xl mb-2 uppercase">Order Summary</h1>

                        <div class="p-4">

                            <div class="flex justify-between border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                    Items:
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    2
                                </div>
                            </div>

                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                    Payment Date:
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    12th July 2021
                                </div>
                            </div>

                            <div class="flex justify-between border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                    Payment Method:
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    PayPal
                                </div>
                            </div>

                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                    Collection Time:
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    10-13
                                </div>
                            </div>

                            <div class="flex justify-between border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                    Subtotal
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    £30,000
                                </div>
                            </div>

                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                    Discount
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    £3,000 (10%)
                                </div>
                            </div>

                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg font-bold text-center text-gray-800">
                                    Order Total:
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    £27,000
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</section>
@endsection