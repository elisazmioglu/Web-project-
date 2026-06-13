<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        $orders = Order::all();
        return view('products', compact('products', 'orders'));
    }

    public function shop() {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $cart[$id] = ["name" => $product->name, "quantity" => 1, "price" => $product->price];
        session()->put('cart', $cart);
        return redirect('/shop');
    }

    public function checkout() {
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            Order::create([
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity']
            ]);
        }
        session()->forget('cart');
        return redirect('/shop');
    }
}
