<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.order', compact('orders'));
    }

    public function payment()
    {
        $payments = Payment::orderBy('id', 'desc')->get();
        return view('admin.payment', compact('payments'));
    }

    public function user()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.user', compact('users'));
    }

    public function acceptorder($id)
    {
        $order = Order::find($id);
        $order->payment_status = 'paid';
        $order->save();

        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_amount,
            'payment_method' => $order->payment_method,
            'payment_status' => 'paid',
            'transaction_id' => 'COD'
        ]);

        return redirect()->back()->with('success', 'Order Accepted');
    }


    public function rejectorder($id)
    {
        $order = Order::find($id);
        $order->payment_status = 'rejected';
        $order->status = 'rejected';
        $order->save();

          
        
        $cart_ids = json_decode($order->cart_ids);
        foreach ($cart_ids as $cart_id) {
            $cart = Cart::find($cart_id);
            $cart->visible = 0;
            $productstock=$cart->product->stock + $cart->quantity;
            $cart->product->stock=$productstock;
            $cart->product->save();
            $cart->save();
           
        }
  

        return redirect()->back()->with('success', 'Order Rejected');
    }
}
