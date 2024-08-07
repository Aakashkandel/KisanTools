@extends('layouts.usermenu')
@section('content')
<body class="bg-green-900 text-gray-100 ">

   

    <!-- Hero Section -->
    <section class="bg-yellow-800 pt-16 text-gray-100 h-full" style="background-image: url('{{ asset('clientimage/hello.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">
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
            <div class="bg-green-900 ">
            <h2 class="text-3xl text-gray-100 font-bold mb-12">Latest Products</h2>


            </div>
            <div class="grid grid-cols-1 mx-10 my-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($latestproducts as $product)
    
                <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden text-left">
                    <img src="{{asset('images/product/'.$product->image)}}" class=" w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{$product->name}}</h3>
                        <p class="text-gray-600 mt-2">Rs {{$product->price}}</p>
                        <div class="flex my-4">
                          
                            <div class="px-2">
                                <a href="{{route('user.productdetails',$product->id)}}" class="mt-4 w-full bg-gray-900 text-white text-center py-2 px-4 rounded-xl">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    
            </div>
        </div>
    </section>

    

@endsection
