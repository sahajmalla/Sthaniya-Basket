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
        <div class="flex justify-between">
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


            <div class="flex items-center">
                <div class="relative bg-gray-300 p-2 rounded">
                    <!--hero icons-->
                    <svg class="h-6 w-6 absolute ml-0.7" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input class="ml-6 bg-transparent" type="text" placeholder="Search">
                </div>
            </div>

            <div class="flex items-center space-x-2 mx-1">

                <div class="flex">
                    <a class="flex py-3 px-2 space-x-1 hover:bg-gray-400" href="{{ route('login') }}"><img class="" src="images/icons/sign-in.png"><span>Sign In</span></a>
                </div>

                <div class="flex">
                    <a class="flex py-3 px-2 space-x-1 hover:bg-gray-400" href="{{ route('registerCustomer') }}"><img class="" src="images/icons/login.png"><span>Sign Up</span></a>
                </div>

                <div class="flex">
                    <a class="flex py-3 px-2 space-x-1 hover:bg-gray-400" href=""><img src="images/icons/wishlist.png"><span>Wishlist</span></a>
                </div>

                <div class="flex">
                    <a class="flex py-3 px-2 space-x-1 hover:bg-gray-400" href=""><img class="" src="images/icons/cart.png"><span>Cart</span></a>
                </div>

            </div>
        </div>
    </nav>
        <!--add hidden here-->
        <div class="sideNav h-full w-0 fixed top-12 mt-2 bg-gray-100 left-0 bg-white overflow-x-hidden transition duration-500 ease-in-out">
            <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4" src="images/icons/butcher.png" ><span>Butcher</span> </a>
            <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4" src="images/icons/grocery.png" ><span>Greengrocer</span> </a>
            <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4" src="images/icons/fish.png" ><span>Fishmonger</span> </a>
            <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4" src="images/icons/bakery.png" ><span>Bakery</span> </a>
            <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4" src="images/icons/delicatessen.png" ><span>Delicatessen</span> </a>
            <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4" src="images/icons/sign-in.png" alt=""><span>Sign in</span> </a>
            <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-400 flex "><img class="mr-4" src="images/icons/wishlist.png" alt=""><span>Wishlist</span> </a>
        </div>

        <main class="bg-white flex justify-center mb-5 mt-20">
            @yield('content')
        </main>
    
    

    <!---fixed w-full bottom-0 -->
    <footer class="p-3 bg-gray-100">
        <div class="flex justify-between ">
            <div>
                <img alt="Logo" src="/images/sbl.png">
            </div>
            <div class="space-x-3">
                <a href="">About us</a>
                <a href="">Careers</a>
                <a href="">Email us</a>
            </div>
        </div>
    </footer>
</body>


<script>
    const btn = document.querySelector('.menu-button');
    const sideNav = document.querySelector('.sideNav');

   btn.addEventListener('click',()=>{
        if(sideNav.classList.contains('w-0')){
            sideNav.classList.remove('w-0');
            sideNav.classList.add('w-2/12');
        }else{
            sideNav.classList.remove('w-2/12');
            sideNav.classList.add('w-0');
        }
    })
</script>

</html>
