@extends('layouts.usermenu')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Billing Information -->
        <div class="w-full lg:w-3/5 bg-blue-100 shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Billing Information</h2>
            <form>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" id="city" name="city" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    
                    
                  

                </div>

                <div class="w-full lg:w-full bg-gray-50 shadow-md rounded-lg my-5 p-6">
                    <h2 class="text-2xl font-semibold mb-4 w-full">Payment Details</h2>
                    <div class="space-y-4 flex justify-between  items-center">
                        <div>
                        
                            <div class="flex items-center mb-4">
                                <input id="cod" name="payment_method" type="radio" value="cod" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <label for="cod" class="ml-3 block text-sm font-medium text-gray-700">
                                    Cash on Delivery
                                </label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="esewa" name="payment_method" type="radio" value="esewa" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" required>
                                <label for="esewa" class="ml-3 block text-sm font-medium text-gray-700">
                                    eSewa Wallet
                                </label>
                            </div>
                           
                        </div>
                        <div id="esewa-details" class="">
                          
                            <div>
                                <img src="{{asset('clientimage/esewa.png')}}" alt="eSewa Logo" class="h-auto w-28 mt-6">
                            </div>
                        </div>
                    </div>
                </div>



            </form>

        </div>

        <div class="w-full lg:w-2/5 bg-blue-100 shadow-md rounded-lg p-6 mt-6 lg:mt-0">
            <h2 class="text-2xl font-semibold mb-4">Order Summary</h2>
            <div class="space-y-2">

            <div class="flex justify-between text-gray-800">
                    <span>TotalItems:</span>
                    <span> {{$items}} items</span>
                </div>

                <div class="flex justify-between text-gray-800">
                    <span>Subtotal:</span>
                    <span>Rs {{$total}}</span>
                </div>
                <div class="flex justify-between text-gray-800">
                    <span>Tax:</span>
                    <span>Rs 0</span>
                </div>
                <div class="flex justify-between text-gray-800">
                    <span>Shipping:</span>
                    <span>Rs 100</span>
                </div>
                <div class="border-t border-gray-200 my-4"></div>
                <div class="flex justify-between text-xl font-semibold text-gray-800">
                    <span>Total:</span>
                    <span>Rs <?php echo $total+100; ?></span>
                </div>
            </div>
            <button class="mt-6 w-full bg-blue-500 text-white py-2 px-4 rounded-lg">Place Order</button>
        </div>

        <!-- Payment Details -->

    </div>

    <!-- Order Summary -->

</div>

@endsection