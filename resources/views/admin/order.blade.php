@extends('layouts.app')
@section('content')
<div class="flex flex-col w-full">
    <div class="flex items-center justify-between w-full">
        <h2 class="text-2xl font-bold text-gray-700">Order Details</h2>
        <div class="flex items-center space-x-2">
            <button class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-gray-500">
                <i class="bx bx-search"></i>
            </button>
            <button class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-gray-500">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
        </div>
    </div>

   

    <div class="mt-2">
        <div class="mt-4">
            <div class="overflow-x-auto bg-white rounded-lg shadow-xs">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-green-900">
                            <th class="px-4 py-3">S.N</th>
                            <th class="px-4 py-3">User Id</th>
                           
                            <th class="px-4 py-3">Cart_ids</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Total Amount</th>
                            <th class="px-4 py-3">Payment Method</th>
                            <th class="px-4 py-3">Payment Status</th>
                            <th class="px-4 py-3">Order Date</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php $i = 1; ?>
                        @foreach($orders as $order)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <?php echo $i++; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->user_id }}</p>
                                    </div>
                                </div>
                            </td>

                           
                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->cart_ids}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->status}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->total_amount}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->payment_method}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->payment_status}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 border">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->order_date}}</p>
                                    </div>
                                </div>
                            </td>

                            
                            <td class="border p-3 text-center">
                                @if($order->payment_status == 'pending')
                                <a href="{{route('admin.order.accept',$order->id)}}" class="bg-blue-500 text-white p-2 rounded-lg">Accept</a>
                                <Button class="bg-red-500 text-white p-2 rounded-lg" onclick="showDeletePopup({{ $order->id}})">Rejected</Button>
                                @elseif($order->payment_status == 'paid')
                                <h2 class="bg-green-700 text-white p-2 rounded-lg">Action Completed</h2>
                                @else
                                <h2 class="bg-red-700 text-white p-2 rounded-lg">Rejected</h2>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Popup -->
    <div id="delete-popup" style="display:none" class="fixed inset-0 flex items-center justify-center w-full bg-gray-500 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 border border-gray-100
">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-700 font-bold text-lg">Are you sure you want Reject this Order?</p>
            <div class="mt-4 flex justify-end">
                <a id="confirm-delete" href="" class="bg-red-500 text-white px-4 py-2 rounded-lg">Confirm</a>
                <button onclick="hideDeletePopup()" class="bg-gray-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showDeletePopup(id) {
        document.getElementById('delete-popup').style.display = 'flex';
        document.getElementById('confirm-delete').onclick = function() {
            window.location.href = '/order/reject/' + id;
        }
       
    }

    function hideDeletePopup() {
        document.getElementById('delete-popup').style.display = 'none';
    }
</script>
@endsection
