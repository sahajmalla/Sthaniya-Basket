@extends('layouts.app')

@section('content')

    <div class="flex max-w-sm w-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 
    lg:max-w-4xl">
    <div class="hidden bg-cover lg:block lg:w-1/2" 
    style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')"></div>
    
    <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
        <form action="{{ route('registerCustomer') }}" method="POST">
            <h1 class="text-2xl text-center font-bold mb-8">Sign Up (Trader)</h1>
            @csrf
            <div class="mb-5">
                <label for="shopname" class=sr-only>Shop Name:</label>
                <input type="text" name="shopname" id="shopname" placeholder="Shop Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('shopname') border-red-500 
                    @enderror" value="{{ old('shopname') }}">

                @error('shopname')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="inline-block relative w-full mb-5">
                <select class="block appearance-none w-full h-14 bg-gray-100 border 
                    border-gray-300 px-4 py-2 pr-8 rounded-lg border-2 text-gray-400">

                    <option>Business Type</option>
                    <option>Butcher</option>
                    <option>Greengrocer</option>
                    <option>Fishmonger</option>
                    <option>Bakery</option>
                    <option>Delicatessen</option>
                    <option>Greengrocer</option>


                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex 
                    items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 
                    6.586 4.343 8z" />
                    </svg>
                </div>
            </div>

            <div class="mb-5">
                <label for="email" class=sr-only>Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('email') border-red-500 
                    @enderror" value="{{ old('email') }}">

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

            </div>

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

            <div class="mb-5">
                <label for="password_confirmation" class=sr-only>Re-type Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                placeholder="Re-type Password" class="bg-gray-100 h-14 border-2 w-full p-4 rounded-lg
                @error('password') border-red-500 @enderror"
                value="">

            </div>

            <div class="mb-5">
                <label for="fname" class=sr-only>First Name:</label>
                <input type="text" name="fname" id="fname" placeholder="First Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('fname') border-red-500 
                    @enderror" value="{{ old('fname') }}">

                @error('fname')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                        <!-- Give us the first error message.-->
                    </div>
                @enderror

            </div>

            <div class="mb-5">
                <label for="lname" class=sr-only>Last Name:</label>
                <input type="text" name="lname" id="lname" placeholder="Last Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg h-14 @error('lname') border-red-500 
                    @enderror" value="{{ old('lname') }}">

                @error('lname')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                        <!-- Give us the first error message.-->
                    </div>
                @enderror

            </div>

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

            <div class="inline-block relative w-full mb-5">
                <select class="block appearance-none w-full h-14 bg-gray-100 border 
                    border-gray-300 px-4 py-2 pr-8 rounded-lg border-2 text-gray-400">

                    <option>Date of Birth</option>
                    <option>Option 2</option>
                    <option>Option 3</option>

                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex 
                    items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 
                    6.586 4.343 8z" />
                    </svg>
                </div>
            </div>

            <div class="mb-5 md:flex justify-center">
                <div>
                    <label for="male" class="mr-1">Male</label>
                    <input type="radio" id="male" value="male" class="mr-5">
                </div>
                <div>
                    <label for="female" class="mr-1">Female</label>
                    <input type="radio" id="female" value="female" class="mr-5">
                </div>

                <div>
                    <label for="others" class="mr-1">Others</label>
                    <input type="radio" id="others" value="others" class="mr-5">
                </div>
            </div>

            <div class="mb-5">
                <input type="checkbox" class="mr-1">
                <label>
                    Get updates from Sthaniya Basket on products and offers.
                </label>
            </div>

            <div class="mb-5">
                <p class="text-center italic">By signing up, you agree to Sthaniya Basket's
                    <span class="underline font-bold">Privacy Policy</span> and
                    <span class="underline font-bold">Terms of Use.</span>
                </p>
            </div>

            <div class="mb-5">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                    font-medium w-full">Sign Up</button>
            </div>

            <hr class="mb-5 divide-solid border-0 h-0.5 bg-gray-200">

            <div class="mb-2">
                <p class="text-center">Sign up as a
                    <a href="{{ route('registerCustomer') }}" class="underline font-bold">Customer?</a>
                </p>
            </div>

            <div>
                <p class="text-center">Already a member?
                    <a href="{{ route('login') }}" class="underline font-bold">Sign In</a>
                </p>
            </div>

        </form>
    </div>
</div>

@endsection
