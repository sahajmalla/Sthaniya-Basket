@extends('layouts.app')

@section('content')

    <div class="flex max-w-sm w-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 
        lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2" 
        style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')"></div>
        
        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">

            <h1 class="text-2xl text-center font-bold mb-8">Update Password</h1>

            <!-- Reset Password form -->
            <form action="{{ route('password.update') }}" method="POST">

                <!-- The token from the email passed to the URL. -->
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-5">
                    <label for="email" class=sr-only>Email:</label>
                    <input type="email" name="email" id="email" value="{{ $request->email }}" class="bg-gray-100 
                    border-2 w-full p-4 rounded-lg h-14
                        @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!--Password-->
                <div class="mb-5">
                    <label for="password" class=sr-only>Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('password') border-red-500 
                    @enderror" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!--Confirm password-->
                <div class="mb-5">
                    <label for="password_confirmation" class=sr-only>Re-type Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Re-type Password" class="bg-gray-100 h-14 border-2 w-full p-4 
                        rounded-lg @error('password') border-red-500 @enderror" value="">

                </div>

                <div class="mb-5">
                    <button type="submit" class="bg-gray-700 text-white px-4 py-3 rounded
                        font-medium w-full">UPDATE</button>
                </div>

            </form>
        </div>
    </div>

@endsection
