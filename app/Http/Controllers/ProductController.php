<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    
    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
       return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prod_name' => 'required',
            'prod_descrip' => 'required',
            'price' => 'required',
            'prod_image' => 'required',
            'prod_quantity' => 'required',
        ]);
        
        // $path = $request->prod_image->move(public_path('images'),$request->prod_image);
       
        $request->file('prod_image')->move(public_path('images/products/'), $request->file('prod_image')->getClientOriginalName());

        // $product = new Product;
        // $product->prod_name= $request->prod_name;
        // $product->prod_descrip= $request->prod_descrip;
        // $product->price= $request->price;
        // $product->prod_type= $request->user()->business;
        // $product->prod_image= $path;
        // $product->prod_quantity= $request->prod_quantity;
        // $product->save();

        $request->user()->products()->create([
            'prod_name' => $request->prod_name,
            'prod_descrip' => $request->prod_descrip,
            'price' => $request->price,
            'prod_type' => $request->user()->business,
            'prod_image' => $request->file('prod_image')->getClientOriginalName(),
            'prod_quantity' => $request->prod_quantity,
        ]);

        return redirect()->route('products.index')->with('Success!','Product inserted successfully.');
    }

    public function show(Product $product)
    {
      return view('products.show',compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'prod_name' => 'required',
            'prod_descrip' => 'required',
            'price' => 'required',
            'prod_image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
            'prod_quantity' => 'required',
        ]);

        $product->prod_name = $request->prod_name;
        $product->prod_descrip = $request->prod_descrip;
        $product->price = $request->price;
        $product->prod_image = $request->file('prod_image')->getClientOriginalName();
        $product->prod_quantity = $request->prod_quantity;

        $product->save();

        return redirect()->route('products.index')->with('Success!','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('Success!','Product deleted successfully');
    }
}
