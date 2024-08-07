@extends('layouts.usermenu')
@section('content')

<body class="bg-gray-100 text-gray-800">
    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <!-- Search Bar -->
            <div class="relative w-full md:w-1/2">
                <input type="text" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search for orders...">
                <button class="absolute right-2 top-2 py-1 px-4 bg-blue-500 text-white rounded-full">Search</button>
            </div>
        </div>

        <!-- Order Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4">
            <!-- Example Order Card -->

            @foreach($orders as $order)
            <div class="bg-gray-100 border-spacing-4 border-gray-900  outline-double outline-gray-300 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-bold text-gray-800">Order Id: {{$order->id}}</h2>
                    <p class="text-gray-600 mt-2">Total Items: {{$order->items}}</p>
                    <p class="text-gray-600 mt-2">Date: {{$order->order_date}}</p>
                    <p class="text-gray-600 mt-2">Payment Method: {{$order->payment_method}}</p>
                </div>
                <div class="p-4 bg-gray-50">
                   @if($order->payment_status == 'pending')
                   <h3 class="text-lg font-semibold bg-red-600 text-center  text-gray-200 rounded p-1"> {{$order->payment_status}}</h3>
                     @else
                        <h3 class="text-lg font-semibold bg-green-600 text-center  text-gray-200 rounded p-1"> {{$order->payment_status}}</h3>
                    @endif
                    <p class="text-gray-600 mt-2 font-semibold">Total Amount: {{$order->total_amount}}</p>
                    <div class="flex mt-4">
                        <a href="#" class="w-full bg-blue-600 text-white py-2 px-4 rounded-full text-center">View Product</a>
                       @if($order->payment_status == 'pending')
                       <a href="{{route('user.ordercancel',$order->id)}}" class="w-full bg-gray-500 text-white py-2 px-4 rounded-full text-center ml-2">Cancel Order</a>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
            <!-- Repeat above div for more orders -->
        </div>
    </div>
</body>
@endsection
