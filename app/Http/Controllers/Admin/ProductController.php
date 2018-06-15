<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategory;
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
            'category_id' => 'required',
            'subcategory_id' => 'required',
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

        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
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

    public function getSuboptions($id)
    {
        $suboptions = Subcategory::where('category_id', $id)->get();

        return response(json_encode($suboptions));
    }

    public function getEdit(Request $request, $id)
    {
    	$product = Product::find($id);

    	return response(json_encode($product));
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
            'category_id' => 'required',
            'subcategory_id' => 'required',
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

        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
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