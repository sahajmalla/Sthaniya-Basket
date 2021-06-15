<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="text-black">
    <nav class="fixed w-full top-0 bg-gray-100">
        <!--menu bar and logo-->
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div>
                    <button class="menu-button p-4 focus:outline-none hover:bg-gray-400">
                        <!--hero icons-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <span> <a href="/"><img alt="Logo" src="/images/sbl.png"> </a> </span>
            </div>

            <!--Search bar-->
            <div class=" flex justify-center flex-grow pt-2 relative mx-auto text-gray-600">
                <input
                    class="w-8/12  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Search">

                <button type="submit" class="absolute right-40 top-0 mt-5 mr-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>

            <!--signin signup wishlist cart-->
            <div class="flex items-center text-sm space-x-1">

                <div class=" space-x-2 p-1 m-0.5">
                    <a class="flex items-center" href="{{ route('login') }}">
                        <img class="transform scale-60" src="images/icons/sign-in.png">
                        <span>Sign In</span>
                    </a>
                </div>

                <div class=" space-x-2 p-1 m-0.5">
                    <a class="flex items-center" href="{{ route('registerCustomer') }}">
                        <img class="transform scale-60" src="images/icons/login.png">
                        <span>Sign Up</span>
                    </a>
                </div>

                <div class=" space-x-2 p-1 m-0.5">
                    <a class="flex items-center" href="">
                        <img class="transform scale-60" src="images/icons/wishlist.png">
                        <span>Wishlist</span>
                    </a>
                </div>

                <div class=" space-x-2 p-1 m-0.5">
                    <a class="flex items-center" href="">
                        <img class="transform scale-60" src="images/icons/cart.png">
                        <span>Cart</span>
                    </a>
                </div>

            </div>
        </div>
    </nav>
    <!--sidenav-->
    <div
        class="sideNav h-full w-0 fixed top-12 mt-2 bg-gray-100 left-0 bg-white overflow-x-hidden transition delay-500 duration-700 ease-in-out">
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4"
                src="images/icons/butcher.png"><span>Butcher</span> </a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4"
                src="images/icons/grocery.png"><span>Greengrocer</span> </a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4"
                src="images/icons/fish.png"><span>Fishmonger</span> </a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4"
                src="images/icons/bakery.png"><span>Bakery</span> </a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4"
                src="images/icons/delicatessen.png"><span>Delicatessen</span> </a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4"
                src="images/icons/sign-in.png" alt=""><span>Sign in</span> </a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4"
                src="images/icons/wishlist.png" alt=""><span>Wishlist</span> </a>
    </div>

    <!--content-->
    <main class="mainContent bg-white flex justify-center mb-5 mt-20">
        @yield('content')
    </main>



    <!---footer -->
    <footer class="bg-gray-100 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <span> <a href="/"><img alt="Logo" src="/images/sbl.png"> </a> </span>
            <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">©
                2021 Sthaniya Basket</p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-400">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-400">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
</body>


<script>
    const btn = document.querySelector('.menu-button');
    const sideNav = document.querySelector('.sideNav');
    const mainContent = document.querySelector('.mainContent');

    btn.addEventListener('click', () => {
        if (sideNav.classList.contains('w-0')) {
            sideNav.classList.remove('w-0');
            sideNav.classList.add('w-2/12');
        } else {
            sideNav.classList.remove('w-2/12');
            sideNav.classList.add('w-0');
        }
    });

    mainContent.addEventListener('click', () => {
        if (sideNav.classList.contains('w-2/12')) {
            sideNav.classList.remove('w-2/12');
            sideNav.classList.add('w-0');
        }
    })

</script>

</html>
