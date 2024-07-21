@extends('layouts.usermenu')
@section('content')

<body class="bg-gray-100 text-gray-800">


    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <!-- Search Bar -->
            <div class="relative w-full md:w-1/2">
                <input type="text" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search for products...">
                <button class="absolute right-2 top-2 py-1 px-4 bg-blue-500 text-white rounded-full">Search</button>
            </div>

            <!-- Filter Options -->
            <div class="flex mt-4 md:mt-0 space-x-4">
                <!-- Price Range Filter -->
                <div class="relative">
                    <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                        <option>Price Range</option>
                        <option>Rs 0 - Rs 50</option>
                        <option>Rs 51 - Rs 100</option>
                        <option>Rs 101 - Rs 200</option>
                        <option>Rs 201 and above</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M7 10l5 5 5-5H7z" />
                        </svg>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="relative">
                    <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                        <option>Category</option>
                        @foreach($categories as $category)
                        <option vlaue="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M7 10l5 5 5-5H7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($products as $product)

            <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden">
                <img src="{{asset('images/product/'.$product->image)}}" class=" w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{$product->name}}</h3>
                    <p class="text-gray-600 mt-2">Rs {{$product->price}}</p>
                    <div class="flex my-4">
                        <div class="">
                            <a class="mt-4 w-full  bg-blue-500 text-white py-2 px-4 rounded-full">Add to Cart</a>
                        </div>
                        <div class="px-2">
                            <a href="{{route('user.productdetails',$product->id)}}" class="mt-4 w-full bg-gray-900 text-white py-2 px-4 rounded-full">view Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</body>
@endsection