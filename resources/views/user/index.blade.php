@extends('layouts.usermenu')
@section('content')
<body class="bg-green-900 text-gray-100">

   

    <!-- Hero Section -->
    <section class="bg-yellow-800 text-gray-100 h-full" style="background-image: url('{{ asset('clientimage/hello.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container flex h-96 bg-gray-800 p-10 w-full md:w-5/12 rounded-tr-full rounded-br-full flex-col md:flex-row items-center justify-between">
        <div class="w-full md:w-1/2 px-5 text-center md:text-left">
            <h1 class="text-4xl font-bold mb-4">Best Agriculture Tools</h1>
            <p class="mb-8">Explore our wide range of high-quality agriculture tools designed to make your farming easier and more efficient.</p>
            <a href="{{route('user.shop')}}" class="bg-green-700 text-gray-100 px-6 py-3 rounded-full hover:bg-green-600">Shop Now</a>
        </div>
    </div>
</section>


    <!-- Feature Products Section -->
    <section class=" bg-gray-200 text-green-100">
        <div class="container mx-auto text-center">
            <div class="bg-green-900">
            <h2 class="text-3xl text-gray-100 font-bold mb-12">Featured Products</h2>


            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 py-5">
                <!-- Product Card -->
                <div class="bg-green-900 text-gray-900 rounded-lg shadow-lg overflow-hidden mx-10">
                    <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full">
                    <div class="p-4">
                        <h3 class="text-xl text-gray-200 font-bold mb-2">Product Name</h3>
                        <p class="mb-4 text-gray-200">Brief description of the product highlighting its features and benefits.</p>
                        <a href="#" class="bg-green-700 text-gray-100 px-4 py-2 rounded-full hover:bg-green-600">View Details</a>
                    </div>
                </div>

                <div class="bg-green-900 text-gray-900 rounded-lg shadow-lg overflow-hidden mx-10">
                    <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full">
                    <div class="p-4">
                        <h3 class="text-xl text-gray-200 font-bold mb-2">Product Name</h3>
                        <p class="mb-4 text-gray-200">Brief description of the product highlighting its features and benefits.</p>
                        <a href="#" class="bg-green-700 text-gray-100 px-4 py-2 rounded-full hover:bg-green-600">View Details</a>
                    </div>
                </div>

                <div class="bg-green-900 text-gray-900 rounded-lg shadow-lg overflow-hidden mx-10">
                    <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full">
                    <div class="p-4">
                        <h3 class="text-xl text-gray-200 font-bold mb-2">Product Name</h3>
                        <p class="mb-4 text-gray-200">Brief description of the product highlighting its features and benefits.</p>
                        <a href="#" class="bg-green-700 text-gray-100 px-4 py-2 rounded-full hover:bg-green-600">View Details</a>
                    </div>
                </div>
                <!-- Repeat Product Card as needed -->
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-yellow-800 py-6">
        <div class="container mx-auto text-center text-gray-200">
            <p>&copy; 2024 AgriTools. All rights reserved.</p>
            <div class="mt-4">
                <a href="#" class="text-gray-200 hover:text-gray-100">Privacy Policy</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-gray-200 hover:text-gray-100">Terms of Service</a>
            </div>
        </div>
    </footer>

@endsection
