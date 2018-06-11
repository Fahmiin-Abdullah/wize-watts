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
    		'productimage' => 'required|file'
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

        $product->save();

        return back()->with('session_code', 'newProduct');
    }

    public function getEdit(Request $request, $id)
    {
    	$product = Product::find($id);
    	$data = '
<div class="container90 paddingTop20 paddingBottom20 hidden editProductPanel" id="editProduct'.$product->id.'">
	<form action="{{route(\'editProduct\', [\'id\' => '.$product->id.'])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
		<div class="row container90">
			<div class="col m6">
				<h6>Enter the following criterias for the product</h6>
				<br>
				<div class="input-field">
					<input type="text" name="name" value="'.$product->name.'" required>
				</div>
				<div class="input-field">
					<textarea class="materialize-textarea" name="description">'.$product->description.'</textarea>
				</div>
				<div class="row">
					<div class="col m6">
						<div class="input-field">
							<input type="number" step="0.01" name="pricing" value="'.$product->pricing.'" required>
						</div>
					</div>
					<div class="col m6">
						<div class="input-field">
							<input type="number" step="0.01" name="stock" value="'.$product->stock.'" required>
						</div>
					</div>
				</div>
				<div class="input-field">
					<input type="number" step="0.01" name="shipping" value="'.$product->shipping.'" required>
				</div>	
			</div>
			<div class="col m6 center-align">
				<img class="marginBottom10 marginLeft30" id="editProductImage" src="/uploads/products/'.$product->productimage.'"\>
				<input type="file" name="productimage" onchange="openFileProfile(event)" class="hidden" id="fileUpload">
				<label for="fileUpload">
					<a class="btn waves-effect waves-light blue white-text marginLeft30"><i class="material-icons left">file_upload</i>upload image</a>
				</label>
			</div>
		</div>
		<div class="input-field center-align">
			<button class="btn waves-effect waves-light green white-text"><i class="material-icons left">edit</i>Update product</button>
			<a class="btn waves-effect waves-light red white-text cancelEdit"><i class="material-icons left">close</i>Cancel</a>
		</div>
	</form>
</div>';

    	return response($data);
    }

    public function editProduct(Request $request, $id)
    {
   		$request->validate([
    		'name' => 'required|max:100',
    		'description' => 'required|max:255',
    		'pricing' => 'required',
    		'stock' => 'required',
    		'shipping' => 'required',
    		'productimage' => 'required|file'
    	]);

    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->pricing = $request->input('pricing');
    	$product->stock = $request->input('stock');
    	$product->shipping = $request->input('shipping');

        $productimage = $request->file('productimage');
        $filename = time().'.'.$productimage->getClientOriginalExtension();
        Image::make($productimage)->resize(300, 300)->save(public_path('/uploads/products/'.$filename));
        $product->productimage = $filename;

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