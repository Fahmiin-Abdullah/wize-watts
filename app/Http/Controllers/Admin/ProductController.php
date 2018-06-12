<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Image;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
    	$request->validate([
    		'name' => 'required|max:100',
    		'description' => 'required|max:255',
    		'pricing' => 'required',
    		'stock' => 'required',
    		'shipping' => 'required',
    		'productimage' => 'required|file',
    		'details' => 'required'
    	]);

    	$product = new Product;
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->pricing = $request->input('pricing');
    	$product->stock = $request->input('stock');
    	$product->shipping = $request->input('shipping');

        $productimage = $request->file('productimage');
        $filename = time().'.'.$productimage->getClientOriginalExtension();
        Image::make($productimage)->resize(300, 300)->save(public_path('/uploads/products/'.$filename));
        $product->productimage = $filename;

        $product->details = $request->input('details');

        $product->save();

        return back()->with('session_code', 'newProduct');
    }

    public function viewProduct($id)
    {
    	$products = Product::paginate(6);
    	$product = Product::find($id);

    	return view('users.product')
    			->with('products', $products)
    			->with('product', $product);
    }

    public function getEdit(Request $request, $id)
    {
    	$product = Product::find($id);
    	$id = $product->id;
    	$name = $product->name;
    	$description = $product->description;
    	$pricing = $product->pricing;
    	$stock = $product->stock;
    	$shipping = $product->shipping;
    	$image = $product->productimage;
    	$details = $product->details;
    	$data = [$id, $name, $description, $pricing, $stock, $shipping, $image, $details];

    	return response(json_encode($data));
    }

    public function editProduct(Request $request, $id)
    {
   		$request->validate([
    		'name' => 'required|max:100',
    		'description' => 'required|max:255',
    		'pricing' => 'required',
    		'stock' => 'required',
    		'shipping' => 'required',
    		'productimage' => 'file',
    		'details' => 'required'
    	]);

    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->pricing = $request->input('pricing');
    	$product->stock = $request->input('stock');
    	$product->shipping = $request->input('shipping');

    	if ($request->hasFile('productimage')) {
	        $productimage = $request->file('productimage');
	        $filename = time().'.'.$productimage->getClientOriginalExtension();
	        Image::make($productimage)->resize(300, 300)->save(public_path('/uploads/products/'.$filename));
	        $product->productimage = $filename;
	    }

	    $product->details = $request->input('details');

        $product->save();

        return back()->with('session_code', 'editProduct');
    }

    public function deleteProduct($id)
    {
    	$product = Product::find($id);
    	$product->delete();

    	return back()->with('session_code', 'deleteProduct');
    }
}