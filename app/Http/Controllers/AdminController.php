<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('editstock', compact('products'));
    }
    public function edit(Product $product)
    {
        // Pass the single product to the view
        return view('admin.products.edit', compact('product'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'point' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('editStock')->with('success', 'Product created successfully!');
    }
    public function create()
    {
        return view('admin.products.addProduct');
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'point' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('editStock')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('editStock')->with('success', 'Product deleted successfully!');
    }
}
