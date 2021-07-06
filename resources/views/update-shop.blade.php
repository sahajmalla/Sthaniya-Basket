@extends( (auth()->user()->user_type=='customer') ? 'layouts.app' : 'layouts.crud')
@section('content')
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Update your shop</h2>
        @foreach ($shops as $shop)
            <form action="{{ route('update.shop', $shop->id) }}" method="POST" enctype="multipart/form-data>">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="shopname">Shop Name</label>
                        <input id="shop-val" name="shopname" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('shopname') 
                                            border-red-500 @enderror" value="{{ $shop->shopname }}">
                        @error('shopname')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 items-center">
                        <img class="inline object-cover w-28 h-28 rounded-full md:h-36 md:w-36"
                            src="/images/traders/shop/{{ $shop->shoppic }}" alt="Profile image" name="shop-image" />
                        <h1 class="font-bold">Update your picture</h1>
                        <input type="file" name="shopImage" class="mt-2 col-span-2 md:col-span-1 @error('shopimage') 
                            border-red-500 @enderror">
                        @error('shopImage')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
                </div>
            </form>
        @endforeach
    </section>
@endsection
