@extends('layouts.app')
@section('content')

    <div class="container mx-auto px-4 sm:px-8 w-11/12 shadow rounded-lg">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full overflow-hidden">

                    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Your Orders</h1>

                    <div>
                        <h1 class="text-2xl font-medium text-gray-800 mb-6">Order details</h1>
                    
                        @if($orders->count()) 
                        
                            <!-- Order details table -->
                            <table class="min-w-full leading-normal mb-8 rounded-lg shadow-lg border border-2">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Order No
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Order Date
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Order Time
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Order Description
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Total Items
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Total Quantity
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $order)

                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $order->id }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $order->created_at->toDateString() }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ date('h:i A', strtotime($order->created_at)) }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $order->order_description }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $order->total_items }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $order->order_quantity }}
                                                </p>
                                            </td>
                                        </tr>

                                    @endforeach
                                    
                                </tbody>
                            </table>

                            <h1 class="text-2xl font-medium text-gray-800 mb-6">Payment details</h1>

                            <!-- Payment details table -->
                            <table class="min-w-full leading-normal mb-8 rounded-lg shadow-lg border border-2">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Payment No
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Total Price
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Payment Method
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Payment Status
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Collection Time
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Collection Day
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($orders->count()) 

                                        @foreach ($orders as $order)

                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $order->id}}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        £{{ $order->order_total}}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $order->payment_type }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        @if($order->is_paid == 1)
                                                            Complete
                                                        @else
                                                            Pending
                                                        @endif
                                                        
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $order->collection_time }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $order->collection_day }}
                                                    </p>
                                                </td>
                                            </tr>

                                        @endforeach

                                    @else 
                                        <p class="text-lg font-medium text-gray-800 mb-6 ml-1">You have not made any orders yet.</p> 
                                    @endif

                                </tbody>
                            </table>

                        @else 
                            <p class="text-lg font-medium text-gray-800 mb-6 ml-1">You have not made any orders yet.</p> 
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
