@extends( (auth()->user()->user_type=='customer') ? 'layouts.app' : 'layouts.crud')
@section('content')
    <div class="container mx-auto px-4 ">
        <div class=" shadow-lg rounded-lg p-2">
            <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 md:grid-cols-3 items-center">
                    <img class="inline object-cover w-28 h-28 rounded-full md:h-36 md:w-36"
                        src="/images/users/{{ auth()->user()->user_image }}" alt="Profile image" name="user_image" />
                    <h1 class="font-bold">Update your picture</h1>
                    <input type="file" name="user_image" class="mt-2 col-span-2 md:col-span-1 ">
                </div>

                <div class="mt-2 flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
                </div>
            </form>

        </div>


        <div class="max-w-4xl p-6 mx-auto mt-2 bg-white rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Update your information</h2>

            @if (session('status') == 'profile-information-updated')

                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                        </svg>
                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-green-500 dark:text-green-400">Success</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">Your account was updated!</p>
                        </div>
                    </div>
                </div>

            @endif

            <form method="POST" action="{{ route('user-profile-information.update') }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="username">Username</label>
                        <input id="username" name="username" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('username') border-red-500 
                                                                                                                                                            @enderror"
                            value="{{ auth()->user()->username }}">

                        @error('username')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="firstname">First Name</label>
                        <input id="firstname" name="firstname" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('firstname') border-red-500 
                                                                                                                                                        @enderror"
                            value="{{ auth()->user()->firstname }}">
                        @error('firstname')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                                <!-- Give us the first error message.-->
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="lastname">Last Name</label>
                        <input id="lastname" name="lastname" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('lastname') border-red-500 
                                                                                                                                                    @enderror"
                            value="{{ auth()->user()->lastname }}">
                        @error('lastname')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                                <!-- Give us the first error message.-->
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="email">Email Address</label>
                        <input id="email" name="email" type="email"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('email') border-red-500 
                                                                                                                                            @enderror"
                            value="{{ auth()->user()->email }}">
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="@error('dob') border-red-500 @enderror">
                        <label class="text-gray-700 dark:text-gray-200" for="dob">Date of birth</label>
                        <input id="dob" name="dob" type="date" value="{{ auth()->user()->dob }}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    @error('dob')
                        <div class="text-red-500 mb-4 text-sm">
                            {{ $message }}
                            <!-- Give us the first error message.-->
                        </div>
                    @enderror --}}

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="address">Address</label>
                        <input id="address" name="address" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring  @error('address') border-red-500 
                                                                                                                                        @enderror"
                            value="{{ auth()->user()->address }}">

                        @error('address')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                                <!-- Give us the first error message.-->
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="mb-5 justify-center">
                        <label for="genderType">Update Gender</label>
                        <div class="flex items-center mt-3">
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
                    </div>

                    @error('gender')
                        <div class="text-red-500 mt-2 text-sm mb-4">
                            {{ $message }}
                        </div>
                    @enderror --}}

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                            Update
                        </button>
                    </div>
            </form>
        </div>


        <div class="max-w-4xl mt-4 p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">

            @if (session('status') == 'password-updated')

                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                        </svg>
                    </div>

                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-green-500 dark:text-green-400">Success</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">Password was updated!</p>
                        </div>
                    </div>
                </div>

            @endif

            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Update your password</h2>

            <form method="POST" action="{{ route('user-password.update') }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="password">Current Password</label>
                        <input id="current_password" type="password" name="current_password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('current_password', 'updatePassword') is-invalid @enderror">

                        @error('current_password', 'updatePassword')

                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>

                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="password">New Password</label>
                        <input id="password" type="password" name="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring @error('password', 'updatePassword') is-invalid @enderror">

                        @error('password', 'updatePassword')

                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>

                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Password
                            Confirmation</label>
                        <input id="passwordConfirmation" name="password_confirmation" type="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
                </div>
            </form>
        </div>

        @if (auth()->user()->user_type == 'trader')
            <div>

                <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Update your shop</h2>
                    <form action="{{ route('updateShopView') }}" method="get">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                            <select name="tradershop" class="@error('tradershop') 
                                    border-red-500 @enderror">
                                <option value="" disabled selected>Select your shop</option>
                                @foreach ($shops as $shop)
                                    <option value="{{ $shop->shopname }}">{{ $shop->shopname }}</option>
                                @endforeach
                            </select>
                            @error('tradershop')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-6">
                            <button
                                class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Next</button>
                        </div>
                    </form>

                </section>
            </div>
        @endif

    </div>
@endsection
