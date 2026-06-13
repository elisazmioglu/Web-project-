<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display form and table
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    // Save new product to the database
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Create and save the product
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Redirect back to the products page to see the updated list
        return redirect('/products');
    }
}
