<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use Image;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function brands()
    {
        $brand = Brand::orderBy('id', 'desc')->get();
        return view('admin.brands.index')->with('brand', $brand);
    }

    public function add_brand()
    {
    	return view('admin.brands.add_brand');
    }

    public function save_brand(Request $request) {


    	// Validation
    	$this -> validate($request, [
	        'name' => 'required|max:500',
    	],
    	[
    		'image.image' => 'Please provide a valid image with .jpg/.jpeg/.png/. extension'
    	]);


    	$brand = new Brand;

    	$brand->name = $request->name;
    	$brand->description = $request->description;
    	
    	// insert image
    	if ($request->image) {
    		$image = $request->file('image');
    		$img = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/brands/'.$img);
    		Image::make($image)->save($location);
    		$brand->image = $img;
    	}

    	$brand->save();
    	
    	session()->flash('success', 'Successfully added the brand!!');
    	return redirect('/brands');

    }

    public function edit_brand($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {
        	return view('admin.brands.edit_brand', compact('brand'));
        }
        else
        {
        	return redirect('/brands');
        }
    }

    public function update_brand(Request $request, $id) {


        // Validation
    	$this -> validate($request, [
	        'name' => 'required|max:500',
    	],
    	[
    		'image.image' => 'Please provide a valid image with .jpg/.jpeg/.png/. extension'
    	]);


    	$brand = Brand::find($id);

    	$brand->name = $request->name;
    	$brand->description = $request->description;

    	// insert image
    	if ($request->image > 0) {

    		// delete the old image from folder
    		if (File::exists('images/brands/'.$brand->image)) {
    			File::delete('images/brands/'.$brand->image);
    		}

    		$image = $request->file('image');
    		$img = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('images/brands/'.$img);
    		Image::make($image)->save($location);
    		$brand->image = $img;
    	}

    	$brand->save();


        session()->flash('success', 'Successfully updated the brand!!');
        return redirect('/brands');
    }

    public function delete_brand($id)
    {
    	$brand = Brand::find($id);
    	if (!is_null($brand)) {
    		// delete the old image from folder
    		if (File::exists('images/brands/'.$brand->image)) {
    			File::delete('images/brands/'.$brand->image);
    		}

    		$brand->delete();
    	}
    	session()->flash('success', 'Successfully deleted the brand!!');
    	return back();
    }
}
