<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $allcategory = category::all();
          
         
        
        return view('product.productcreate', compact('allcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
            $allcategory = category::all();
          
         
        
        return view('product.productcreate', compact('allcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=> 'required|string|max:255',
            'price'=> 'numeric||max:999',
            'quantity'=> 'numeric|integer|min:0',
            'description'=> 'string|nullable|max:500',
            'image'=> 'nullable|mimes:png,jpg,pdf|max:2048',
        ], [ 'price.max' =>'max 99999']
    );

        if ($request->hasFile('image')) {
            $imagepath= $request->file('image')->store('img' ,'public');
        }
        else{
            $imagepath = null;
        }

  $product = new Product();
  $product->category_id = $request->category_id;
  $product->name = $request->name;
  $product->price = $request->price;
  $product->quantity = $request->quantity;
  $product->description = $request->description;
  $product->image = $imagepath;
  $product->save();
  return redirect('products')->with('success','successfully');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $product = Product::all();
        return view('product.productall', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $product = Product::find($id);
        if($product){
            $product->delete();
            return redirect()->back()->with('success','successfully');
        }
       
        else{
            return redirect()->back()->withErrors('Product not found.');
        }
        
    }
}
