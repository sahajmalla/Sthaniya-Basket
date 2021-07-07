@extends('layouts.app')
@section('content')

    <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <div class="flex w-12/12 justify-center mb-10" id="messages">

            @if (session('ShopLimit'))
                <p class="message p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('ShopLimit') }}
                </p>
            @endif

        </div>

        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Register Shop</h2>
        <p class="text-sm">You can register more shops later from your settings. Let's get started on registering your first
            shop.</p>
        <form action="{{ route('registerShop') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="shop">ShopName</label>
                    <input id="shopname" type="text" name="shopname" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('shopname') border-red-500 
                                    @enderror" value="{{ old('shopname') }}">

                    @error('shopname')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="shoppic">Upload Shop Picture</label>
                    <input id="shoppic" type="file" name="shoppic" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white focus:outline-none focus:ring @error('shopname') border-red-500 
                                @enderror">

                    @error('shoppic')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </div>
    <script>
        //message time
        setTimeout(function(){
            document.getElementById('messages').remove();
        },3000)
    </script>
@endsection
