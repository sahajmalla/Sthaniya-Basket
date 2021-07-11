@extends('layouts.app')

@section('content')

    <div class="flex max-w-sm w-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 
                                                            lg:max-w-4xl">
        <div class="flex w-12/12 justify-center mb-10" id="messages">

            @if (session('TraderExists'))
                <p class="message p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('TraderExists') }}
                </p>
            @elseif(session('UserExists'))
                <p class="message p-4 text-lg text-center w-6/12 text-white rounded-lg bg-red-500 font-medium">
                    {{ session('UserExists') }}
                </p>
            @endif

        </div>
        <div class="hidden bg-cover lg:block lg:w-1/2"
            style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')">
        </div>

        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
            <form action="{{ route('register') }}" method="POST">
                <h1 class="text-2xl text-center font-bold mb-8">Sign Up</h1>

                @csrf
                <!--user types-->
                <div class="inline-block relative w-full mb-5">

                    <select name="userType" onchange="displayForms()" id="select-user" class="block appearance-none w-full h-14 bg-gray-100 border border-gray-300 px-4 py-2 
                                    pr-8 rounded-lg border-2 text-gray-400 
                                    @error('userType') border-red-500 @enderror" value="{{ old('userType') }}">

                        <option value="" disabled selected>User type:</option>
                        <option value="customer" {{ old('userType') == 'customer' ? 'selected' : '' }}>
                            Customer</option>
                        <option value="trader" {{ old('userType') == 'trader' ? 'selected' : '' }}>
                            Trader</option>

                    </select>

                    <!--dropdown icon-->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex 
                                                                                items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 
                                                                                6.586 4.343 8z" />
                        </svg>
                    </div>

                    @error('userType')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--business type-->
                <div class="trader-business inline-block relative w-full mb-5 
                                    {{ old('userType') == 'trader' ? '' : 'hidden' }}">

                    <select name="business" class="block appearance-none w-full h-14 bg-gray-100 border 
                                    border-gray-300 px-4 py-2 pr-8 rounded-lg border-2 text-gray-400 @error('business') 
                                    border-red-500 @enderror" value="{{ old('business') }}">

                        <option value="" disabled selected>Business Type</option>
                        <option value="bakery">Bakery</option>
                        <option value="butcher">Butcher</option>
                        <option value="delicatessen">Delicatessen</option>
                        <option value="fishmonger">Fishmonger</option>
                        <option value="greengrocer">Greengrocer</option>


                    </select>

                    <!--dropdown icon-->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex 
                                                                                items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 
                                                                                6.586 4.343 8z" />
                        </svg>
                    </div>

                    @error('business')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

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

                    <input class="w-full text-gray-400 bg-gray-100" type="date" max="2009-12-31" min="1901-01-01" id="dob"
                        name="dob">

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

                <!--subscription-->

                <div class="subscription mb-5 text-center {{ old('userType') == 'customer' ? '' : 'hidden' }}">
                    <input name="subscription" type="checkbox" class="mr-1">
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

                <div>
                    <p class="text-center">Already a member?
                        <a href="{{ route('login') }}" class="underline font-bold">Sign In</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
    <script>
        function displayForms() {

            var selectUser = document.getElementById('select-user');
            var selectedValue = selectUser.options[selectUser.selectedIndex].value;
            const traBus = document.querySelector('.trader-business');
            const subscription = document.querySelector('.subscription');

            if (selectedValue == "trader") {
                subscription.classList.add('hidden');
                traBus.classList.remove('hidden');
            }
            if (selectedValue == "customer") {
                subscription.classList.remove('hidden');
                traBus.classList.add('hidden');
            }
        }

        //message time
        setTimeout(function() {
            document.getElementById('messages').remove();
        }, 3000)
    </script>
@endsection
