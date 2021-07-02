@extends('layouts.app')

@section('content')

    <div class="flex max-w-sm w-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 
                                                        lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2"
            style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')">
        </div>

        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
            <form action="{{ route('register.admin') }}" method="POST">
                <h1 class="text-2xl text-center font-bold mb-8">Admin Sign Up</h1>

                @csrf
                <!--user types-->
                <div class="inline-block relative w-full mb-5">
                
                <!--email-->
                <div class="mb-5">
                    <label for="email" class=sr-only>Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 
                                border-2 w-full p-4 rounded-lg h-14 @error('email') border-red-500 
                                @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!--username-->
                <div class="mb-5">
                    <label for="username" class=sr-only>Username:</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('username') border-red-500 
                                                                        @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!--Password-->
                <div class="mb-5">
                    <label for="password" class=sr-only>Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('password') border-red-500 
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

                <!--first name-->
                <div class="mb-5">
                    <label for="firstname" class=sr-only>First Name:</label>
                    <input type="text" name="firstname" id="firstname" placeholder="First Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('firstname') border-red-500 
                                @enderror" value="{{ old('firstname') }}">

                    @error('firstname')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                            <!-- Give us the first error message.-->
                        </div>
                    @enderror

                </div>

                <!--last name-->
                <div class="mb-5">
                    <label for="lastname" class=sr-only>Last Name:</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('lastname') border-red-500 
                                @enderror" value="{{ old('lastname') }}">

                    @error('lastname')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                            <!-- Give us the first error message.-->
                        </div>
                    @enderror

                </div>

                <!--address-->
                <div class="mb-5">
                    <label for="address" class=sr-only>Address:</label>
                    <input type="text" name="address" id="address" placeholder="Address" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('address') border-red-500 
                                @enderror" value="{{ old('address') }}">

                    @error('address')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                            <!-- Give us the first error message.-->
                        </div>
                    @enderror

                </div>

                <!--dob-->
                <div class="inline-block relative w-full mb-5 bg-gray-100 border-2 w-full p-4 rounded-lg 
                            h-14 @error('dob') border-red-500 @enderror" value="{{ old('dob') }}">

                    <input class="w-full text-gray-400 bg-gray-100" type="date" id="dob" name="dob">

                </div>

                @error('dob')
                    <div class="text-red-500 mb-4 text-sm">
                        {{ $message }}
                        <!-- Give us the first error message.-->
                    </div>
                @enderror

                <!--gender-->
                <div class="mb-5 flex justify-center">
                    <div>
                        <label for="male" class="mr-1 text-md">Male</label>
                        <input name="gender" type="radio" id="male" value="male" class="mr-5">
                    </div>
                    <div>
                        <label for="female" class="mr-1 text-md">Female</label>
                        <input name="gender" type="radio" id="female" value="female" class="mr-5">
                    </div>

                    <div>
                        <label for="others" class="mr-1 text-md">Others</label>
                        <input name="gender" type="radio" id="others" value="others" class="mr-5">
                    </div>

                </div>

                @error('gender')
                    <div class="text-red-500 mt-2 text-sm mb-4">
                        {{ $message }}
                    </div>
                @enderror
                
                <div class="mb-5">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                                font-medium w-full">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
   
@endsection
