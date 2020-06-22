<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->price = $request->price;
        if ($request->file('image') != '') {
            $path = public_path('upload/images/');
            $file_old = $path . $product->image;
            if(File::exists($file_old)) {
                File::delete($file_old); 
            }
            
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('./upload/images/', $filename);
            $product->image = $filename;
        } 

        $product->save();
        return redirect()->route('product.index')->with('success', 'Add product successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->price = $request->price;
        if ($request->file('image') != '') {
            $path = public_path('upload/images/');
            $file_old = $path . $product->image;
            if(File::exists($file_old)) {
                File::delete($file_old); 
            }
            
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('./upload/images/', $filename);
            $product->image = $filename;
        } 
        $product->save();
        return redirect()->route('product.index')->with('success', 'Update product successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        return back()->with('success', 'Delete product successfully!');
    }
}
