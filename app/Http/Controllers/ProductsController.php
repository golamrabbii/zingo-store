<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use Image;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('product.index')->with('products', $products);
    }

    public function view_single_product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)) {
        	return view('product.show')->with('product', $product);
        }
        else
        {
        	session()->flash('errors', 'There is no product by this URL.');
        	return redirect('/products');
        }
        
    }

}
