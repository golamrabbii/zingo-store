<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use Image;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function add_product()
    {
    	return view('admin.product.add_product');
    }

    public function show_product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)) {
            return view('admin.product.show_product')->with('product', $product);
        }
        else
        {
            session()->flash('errors', 'There is no product by this URL.');
            return redirect('/manage_product');
        }
        
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit_product')->with('product', $product);
    }
    
    public function manage_product()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.product.manage_product')->with('products', $products);
    }

    public function save_product(Request $request) {


    	// Validation
    	$this -> validate($request, [
	        'name' => 'required|max:500',
	        'discription' => 'required',
	        'price' => 'required|numeric',
	        'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
    	]);



    	$product = new Product;

    	$product->name = $request->name;
    	$product->discription = $request->discription;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;

    	$product->slug = str_slug($product->name);
    	$product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
    	$product->save();

    	// ProductImage model insert a single image

    	if ($request->hasFile('product_image')) {
    		// Insert image
    		$image = $request->file('product_image');
    		$img = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/products/'.$img);
    		Image::make($image)->save($location);

    		$product_image = new ProductImage;
    		$product_image->product_id = $product->id;
    		$product_image->image = $img;
    		$product_image->save();
    	}

    	// ProductImage model insert multipple image

    	// if (count($request->$product_image) > 0) {
    	// 	foreach ($request->$product_image as $image) {
    	// 		// Insert image
	    // 		//$image = $request->file('product_image');
	    // 		$img = time().'.'.$image->getClientOriginalExtension();
	    // 		$location = public_path('images/products/'.$img);
	    // 		Image::make($image)->save($location);

	    // 		$product_image = new ProductImage;
	    // 		$product_image->product_id = $product->id;
	    // 		$product_image->image = $img;
	    // 		$product_image->save();
    	// 	}
    	// }

        session()->flash('success', 'Successfully added the product!!');
    	return redirect('/add_product');

    }

    public function update_product(Request $request, $id) {


        // Validation
        $this -> validate($request, [
            'name' => 'required|max:500',
            'discription' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);



        $product = Product::find($id);

        $product->name = $request->name;
        $product->discription = $request->discription;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->slug = str_slug($product->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        // ProductImage model insert a single image

        if ($request->hasFile('product_image')) {
            // Insert image
            $image = $request->file('product_image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/products/'.$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
        }

        // ProductImage model insert multipple image

        // if (count($request->$product_image) > 0) {
        //  foreach ($request->$product_image as $image) {
        //      // Insert image
        //      //$image = $request->file('product_image');
        //      $img = time().'.'.$image->getClientOriginalExtension();
        //      $location = public_path('images/products/'.$img);
        //      Image::make($image)->save($location);

        //      $product_image = new ProductImage;
        //      $product_image->product_id = $product->id;
        //      $product_image->image = $img;
        //      $product_image->save();
        //  }
        // }

        session()->flash('success', 'Successfully updated the product!!');
        return redirect('/manage_product');
    }

    public function delete_product($id)
    {
    	$product = Product::find($id);
    	if (!is_null($product)) {
            // delete the old image from folder
            if (File::exists('images/products/'.$product->image)) {
                File::delete('images/products/'.$product->image);
            }
    		$product->delete();
    	}
    	session()->flash('success', 'Successfully deleted the product!!');
    	return back();
    }
}
