<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .menuitem a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .menuitem a:hover {
            color: #fbbf24;
            transform: scale(1.0);
            transition: all 0.3s ease;
        }
    </style>
</head>



<body class="font-sans antialiased">
    @if(Session::has('success'))
    <div class="fixed top-4 right-4 rounded-lg shadow-md bg-green-800 text-gray-100 px-5 py-4" id="message">
        <p>{{ session('success') }}</p>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('message').style.display = 'none';
        }, 2000);
    </script>
    @endif

    @if(Session::has('fail'))
    <div class="fixed top-4 right-4 rounded-lg shadow-md bg-red-800 text-gray-100 px-5 py-4" id="error">
        <p>{{ session('fail') }}</p>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('error').style.display = 'none';
        }, 2000);
    </script>
    @endif
    <header class="bg-blue-900  p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-200">Kisan<span class="text-yellow-500">Tools</span></div>
            <nav class="space-x-4 menuitem">
                <a href="{{route('user.index')}}" class="text-gray-200 ">Home</a>
                <a href="{{route('user.shop')}}" class="text-gray-200 ">Shop</a>
                <a href="{{route('user.orderhistory')}}" class="text-gray-200 ">Order History</a>
                <a href="{{route('user.cart')}}" class="text-gray-200 ">Cart</a>
                <a href="#" class="text-gray-200 ">Contact</a>
            </nav>
            <div class="flex items-center space-x-4 ">



                @auth

                <div class="flex items-center space-x-4 mr-10">
                    <span class="text-white text-lg font-semibold">
                        Welcome, <span class="text-yellow-400">{{auth()->user()->name}}</span>
                    </span>
                   
                </div>

                <a class="text-gray-200 font-semibold bg-green-800 px-5 py-2 rounded-xl mx-2 hover:bg-green-700" href=""><i class="ri-shopping-cart-2-line"></i>cart</a>
                <form action="{{route('logout')}}" method="post" class="inline">
                    @csrf
                    <button class="text-gray-900 font-semibold bg-gray-200 px-5 py-2 rounded-xl mx-2 hover:bg-gray-300" type="submit"><i class="ri-logout-box-r-line ">logout</i></button>
                </form>
                @else
                <a class="text-gray-200 font-semibold bg-green-800 px-5 py-2 rounded-xl mx-2 hover:bg-green-700" href="/register">Register</a>
                <a class="text-gray-900 font-semibold bg-gray-200 px-5 py-2 rounded-xl mx-2 hover:bg-gray-300" href="/login">Login</a>
                @endauth

            </div>
        </div>
    </header>
    <div>
        @yield('content')
    </div>

</body>

</html>