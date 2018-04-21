<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
	// Get All Product as JSON
    public function index()
    {
    	return Product::all();
    }

    // Get individial Product as JSON
    public function show($id)
    {
    	return Product::findOrFail($id);
    }

    // Delete Product
    public function destroy($id)
    {
    	$product = Product::findOrFail($id);

    	if($product->delete())
    	{
    		return $product;
    	}
    }

    // Create new Product
    public function create(Request $request)
    {
    	$product = new Product;

    	$product->title = $request->title;
    	$product->price = $request->price;
    	$product->description = $request->description;

    	if($product->save())
    	{
    		return $product;
    	}
    }

    // Update Product
    public function update(Request $request)
    {
    	$product = Product::findOrFail($request->id);

    	$product->title = $request->title;
    	$product->price = $request->price;
    	$product->description = $request->description;

    	if($product->save())
    	{
    		return $product;
    	}
    }

}
