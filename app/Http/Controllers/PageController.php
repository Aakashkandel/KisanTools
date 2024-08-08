<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{

    //user before login


    //user after login
    public function index()
    {
         //latest products 3
            $latestproducts = Product::latest()->take(3)->get();
            
        return view('user.index',compact('latestproducts'));
       
    }


    public function shop()
{
    
    $products = Product::paginate(8);
    $categories = Category::orderBy('priority')->get();
    return view('user.shop', compact('products', 'categories'));
}

    public function productdetails($id)
    {
        $product = Product::find($id);
        return view('user.productdetails', compact('product'));
    }

    public function checkout()
    {


        $user = auth()->user()->id;

       
        $carts = Cart::where('user_id', $user)->where('visible', 1)->get();
        if($carts->count() == 0){
            return redirect()->route('user.cart')->with('error', 'No items in cart');
        }
        
        
        $total = 0;
        $items = 0;

        foreach ($carts as $cart) {
            $items++;
            $total += $cart->product->price * $cart->quantity;
           
            $total = number_format((float)$total, 2, '.', '');
        }

        return view('user.checkout', compact('total', 'items'));
    }

    public function categorysearch($id)
    {
        $products = Product::where('category_id', $id)->paginate(8);
        $categories = Category::orderBy('priority')->get();
        return view('user.shop', compact('products', 'categories'));

    }

public function search(Request $request)
{
    $search = $request->search;
    $products = Product::where('name', 'like', '%' . $search . '%')->paginate(8);
    $categories = Category::orderBy('priority')->get();
    return view('user.shop', compact('products', 'categories'));
}


public function aboutus()
{
    return view('user.aboutus');
}






    //admin

    public function dashboard()
    {
        $users = User::count();
        $products = Product::count();
        $categories = Category::count();
   
        $orders = Order::orderBy('id', 'desc')->take(10)->get();
        $payments = Payment::count();
        return view('admin.index' , compact('users', 'products', 'categories', 'orders', 'payments'));
    }
}
