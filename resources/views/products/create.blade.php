@extends('layouts.crud')
@section('content')
    <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
        <div class="py-8">
            <div>
                <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Insert product</h2>

                    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
    
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="username">Name</label>
                                <input id="prod_name" type="text" name="prod_name"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 
                                                                                        rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 
                                                                                        focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                                                                        @error('prod_name') border-red-500 @enderror" value="{{ old('prod_name') }}">
                                @error('prod_name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="space-y-2">

                                <label class="text-gray-700 dark:text-gray-200" for="username">Shop Name</label>

                                <select name="shop" class="w-full h-11 border 
                                    border-gray-300 px-2 py-2 pr-8 rounded-lg border-2 text-gray-400 
                                    @error('shop') border-red-500 @enderror"
                                    value="{{ old('shop') }}">

                                    <option disabled selected>Shop</option>
                                    @foreach ($shops as $shop)

                                        <option value="{{ $shop->shopname }}">{{ $shop->shopname }}</option>
                                    @endforeach

                                </select>

                                @error('shop')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Price</label>
                                <input id="price" type="text" name="price"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 
                                                                                        rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 
                                                                                        focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                                                                        @error('price') border-red-500 @enderror"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="password">Quantity</label>
                                <input id="prod_quantity" type="text" name="prod_quantity"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 
                                                                                        rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 
                                                                                        focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                                                                        @error('prod_quantity') border-red-500 @enderror" value="{{ old('prod_quantity') }}">
                                @error('prod_quantity')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Image</label>
                                <input id="prod_image" type="file" name="prod_image" class="mt-2
                                    @error('prod_image') border-red-500 @enderror" value="{{ old('prod_image') }}">
                                @error('prod_image')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="password">Description</label>
                                                                        
                                <textarea name="prod_descrip" id="prod_descrip" cols="30" rows="4" class="
                                border-2 w-full p-4 rounded-lg @error('prod_descrip') border-red-500 @enderror"
                                >{{ old('prod_descrip') }}</textarea>

                                @error('prod_descrip')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="password">Allergy</label>
                                <textarea id="allergy" name="allergy"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 
                                rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 
                                focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                @error('allergy') border-red-500 @enderror">
                            </textarea>
                                @error('allergy')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button
                                class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 
                                                                                    rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                Insert
                            </button>
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>

@endsection
