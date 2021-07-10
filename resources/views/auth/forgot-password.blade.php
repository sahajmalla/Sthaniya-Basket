@extends('layouts.app')

@section('content')

    <div class="flex max-w-sm w-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 
        lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2" 
        style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')"></div>
        
        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">

            <h1 class="text-2xl text-center font-bold mb-8">Reset Password</h1>

            <!-- Success message -->
            <div id="messages" class="mb-4">

                @if (session('status')) 
            
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                    <h2 class="text-center font-medium text-md">{{ session('status') }}</h2>
                </div>

                @endif

            </div>

            <!-- Reset Password form -->
            <form action="{{ route('password.request') }}" method="POST">

                @csrf
                <div class="mb-5">
                    <label for="email" class=sr-only>Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14
                        @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-5">
                    <button type="submit" class="bg-gray-700 text-white px-4 py-3 rounded
                        font-medium w-full">RESET</button>
                </div>


                <hr class="mb-5 divide-solid border-0 h-0.5 bg-gray-200">

                <div class="mb-5">
                    <p class="text-center font-bold">Don't have an account?</p>
                </div>

                <div class="mb-5">
                    <p class="text-center text-xs">Enjoy added benefits and a richer experience by
                        creating a personal account.
                    </p>
                </div>

            <div class="mb-5 flex flex-col justify-center space-y-4">
                    
                <a href="{{ route('register') }}" class="bg-gray-700 text-white px-4 py-3 rounded
                    font-medium text-xs w-full text-center">
                    SIGN UP AS CUSTOMER</a>
                    
            </div>

            </form>
        </div>
    </div>

    <script>

        //message time-out
        setTimeout(function() {
            document.getElementById('messages').remove();
        }, 3000)

    </script>

@endsection
