<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\ProductImage;
use Image;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
    {
    	$products = Product::orderBy('id', 'desc')->get();
        return view('index')->with('products', $products);
    	
    }

    public function contact()
    {
        return view('contact');
    	
    }
    

    public function about()
    {
        return view('about');
    	
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $products = Product::orWhere('name', 'like','%'.$search.'%')
        ->orWhere('slug', 'like','%'.$search.'%')
        ->orderBy('id', 'desc')->get();
        return view('/search', compact('search', 'products'));
        
    }

    public function view_category_product($id)
    {
        $category =  Category::find($id);
        if (!is_null($category)) {
            return view('/category_product', compact('category'));
        }
        else {
            session()->flash('errors', 'Sorry!! There is no category by this id.');
            return redirect('/');
        }
        
    }
}
