@extends('layouts.app');
@section('content')
    <div class="flex flex-col shadow-lg p-4 h-full">
        <div class="grid grid-cols-2 md:gap-x-96 items-center border-b-2 border-gray-200">
            <div class="row-span-1"><img src="images/sbl.png" alt="logo"></div>
            <div>
                <span class="md: lg:text-6xl  text-gray-300">INVOICE</span>
                <div class="flex ">
                    <span>Invoice No:</span>
                    <span>001</span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 md:gap-x-96 items-center border-b-2 border-gray-200 mt-5">
            <div class="flex items-baseline">
                <span class="text-3xl">Trader:</span>
                <span>Bakery</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Client:</span>
                <span>0001</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Trader Name:</span>
                <span>Jhonny</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Client Name:</span>
                <span>Jack</span>
            </div>
        </div>
        <div class="grid grid-cols-2 md:gap-x-96 items-center border-b-2 border-gray-200 mt-5">
            <div class="flex items-baseline">
                <span class="text-lg">Payment Method:</span>
                <span>PayPal</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Issue Date:</span>
                <span>16/06/2021</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Collection Slot:</span>
                <span>10-13</span>
            </div>
            <div class="flex items-baseline">
                <span class="text-lg">Order Number</span>
                <span>00001</span>
            </div>
        </div>

        <div>
            <table class="table-auto w-full text-center mt-5">
                <thead class="">
                    <tr>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantiy</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr>
                        <td><img src="" alt=""></td>
                        <td>$300</td>
                        <td>1</td>
                        <td>$300</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex flex-col items-end mt-5">
            <div class="flex">
                <span>Subtotal:</span>
                <span>$300</span>
            </div>
            <div class="flex">
                <span>Discount:</span>
                <span>10%</span>
            </div>
            <div class="flex">
                <span>Total:</span>
                <span>$270</span>
            </div>
        </div>
    </div>
@endsection
