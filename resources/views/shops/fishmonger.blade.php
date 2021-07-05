@extends('layouts.app')
@section('content')
    <div class="mx-auto px-4 sm:px-8 w-10/12 shadow rounded-lg md:grid grid-cols-2 gap-4 lg:grid-cols-4">
        @foreach ($shopTraders as $shopTrader)
            <div
                class="max-w-xs my-6 mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 hover:bg-gray-200">
                <img class="object-cover w-full h-56" src="/images/traders/shop/{{ $shopTrader->shoppic }}" alt="avatar">

                <div class="py-5 text-center">
                    <a href="{{ route('show.products',$shopTrader->id) }}"
                        
                        class="block text-2xl font-bold text-gray-800 dark:text-white">{{ $shopTrader->shopname }}</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection