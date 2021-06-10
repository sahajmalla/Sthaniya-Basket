<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="bg-gray-800 text-gray-100">
        <div class="flex justify-between">
            <div class="flex">
                <div>
                    <button class="menu-button p-4 focus:outline-none focus:bg-gray-600">
                        <!--hero icons-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <span> <a href=""><img alt="Logo" src="/resources/images/sbl.png"> </a> </span>
            </div>


            <div class="flex">
                <div class="relative bg-gray-600 p-2 rounded">
                    <!--hero icons-->
                    <svg class="h-6 w-6 absolute ml-0.7" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input class="ml-6 bg-transparent" type="text" placeholder="Search">
                </div>
            </div>




            <div class="flex">
                <!--need to add buttons used this just to test-->
                Sign in
                WishList
                Cart
            </div>
        </div>
    </nav>
    <aside
        class="sidebar bg-gray-700 text-gray-100 w-64 space-y-6 px-2 transform -translate-x-full transition duration-200 ease-in-out">
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-600 lg:hidden">Sign in</a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-600 lg:hidden">Wishlist</a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-600">Butcher</a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-600">Greengrocer</a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-600">Fishmonger</a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-600">Bakery</a>
        <a href="" class="block py-2.5 px-4 rounded hover:bg-gray-600">Delicatessen</a>
    </aside>
    <div class="flex-1">
        @yield('content')
    </div>

</body>


<script>
    const btn = document.querySelector(".menu-button");
    const sidebar = document.querySelector(".sidebar");

    // add our event listener for the click
    btn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    });

</script>

</html>
