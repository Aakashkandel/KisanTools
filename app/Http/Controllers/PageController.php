<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    //user before login


    //user after login
    public function index()
    {
        return view('user.index');
    }
   

    public function shop()
    {
        $products=Product::all();
        $categories=Category::orderby('priority')->get();
        return view('user.shop',compact('products','categories'));
    }

    public function productdetails($id)
    {
        $product=Product::find($id);
        return view ('user.productdetails',compact('product'));
    }

    public function checkout()
    {
        $user = auth()->user()->id;
$carts = Cart::where('user_id', $user)->get();
$total = 0;
$items = 0;

foreach ($carts as $cart) {
    $items++;
    $total += $cart->product->price * $cart->quantity;
}

return view('user.checkout', compact('total', 'items'));

    }







    //admin

    public function dashboard()
    {
        return view('admin.index');
    }
}
