@extends('layouts.usermenu')
@section('content')

<body class="bg-gray-100">

    <div class="container mx-auto mt-10 p-4">

        <div class="flex flex-col lg:flex-row shadow-lg bg-white rounded-lg overflow-hidden">
            <div class="lg:w-1/2">
                <img class="object-cover h-full w-full" src="{{ asset('images/product/'.$product->image) }}" alt="Product Image">
            </div>
            <div class="lg:w-1/2 p-8">
                <form action="{{route('productdetails.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h2>
                    <h3 class="text-xl text-gray-600 mb-4">{{ $product->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ $product->description }}</p>
                    <div class="mb-4">
                        <span class="text-gray-800 font-semibold text-xl">Rs {{ $product->price }}</span>
                    </div>
                    <h3 class="text-xl text-gray-600 mb-1">Stock</h3>
                    <div class="mb-4">
                        <span class="text-green-600 font-semibold">{{ $product->stock }}</span>
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @error('quantity')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Add
                        to Cart</button>
                </form>
            </div>
        </div>
    </div>

</body>
@endsection