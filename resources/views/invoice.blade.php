@extends('layouts.app')
@section('content')
    <div class="flex flex-col  shadow-lg p-4 h-full">
        <div class="grid grid-cols-2 gap-x-10 md:gap-x-96 items-center border-b-2 border-gray-200">
            <div class="row-span-1"><img src="images/sbl.png" alt="logo"></div>
            <div>
                <span class="md: lg:text-6xl  text-gray-300">INVOICE</span>
                <div class="flex ">
                    <span>Invoice No:</span>
                    <span class="ml-1.5">001</span>
                </div>
            </div>
        </div>
        <div class="sm:grid grid-cols-2 gap-x-10 md:gap-x-96 items-center border-b-2 border-gray-200 mt-5">
            <div class="flex items-baseline">
                <span class="text-lg" >Trader Business:</span>
                <span class="ml-1.5">Bakery</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg ">Customer ID:</span>
                <span class="ml-1.5">1</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Trader Name:</span>
                <span class="ml-1.5">John Doe</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Customer Name:</span>
                <span class="ml-1.5">Jack Sparrow</span>
            </div>
        </div>
        <div class=" sm:grid grid-cols-2 gap-x-10 md:gap-x-96 items-center border-b-2 border-gray-200 mt-5">
            <div class="flex items-baseline">
                <span class="text-lg">Payment Method:</span>
                <span class="ml-1.5">PayPal</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Issue Date:</span>
                <span class="ml-1.5">16/06/2021</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Collection Slot:</span>
                <span class="ml-1.5">10-13</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Order Number:</span>
                <span class="ml-1.5">1</span>
            </div>
        </div>

        <div>
            <table class="table-auto w-full text-center mt-5">
                <thead class="">
                    <tr>
                        <th  class="bg-red-450 text-white md:m-4 p-4">Product Name</th>
                        <th class="bg-yellow-450">Price</th>
                        <th class="bg-yellow-450">Quantity</th>
                        <th class="bg-yellow-450">Total</th>
                    </tr>
                </thead>
                
                <tbody >
                    <tr>
                        
                        <td class="sm:m-3 p-3">Brocolli</td>
                        <td>£300</td>
                        <td>1</td>
                        <td>£300</td>
                    </tr>
                </tbody>

                <tbody class=" bg-gray-200">
                    <tr>
                        <td class="sm:m-3 p-3">Fish</td>
                        <td>£300</td>
                        <td>2</td>
                        <td>$600</td>
                    </tr>
                </tbody>

                <tbody class="">
                    <tr>
                        <td class="sm:m-3 p-3">Salmon</td>
                        <td>£300</td>
                        <td>3</td>
                        <td>£900</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="font-semibold sm:text-lg flex flex-col items-end m-8">
            <div class="flex">
                <span>Subtotal:</span>
                <span class="ml-1.5">£300</span>
            </div>
            <div class="flex text-red-450">
                <span text-red-450>GRAND TOTAL:</span>
                <span text-red-450 class="ml-1.5">£270</span>
            </div>
        </div>
    </div>
@endsection
