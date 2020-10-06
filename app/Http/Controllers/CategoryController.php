<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function categories()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index')->with('category', $category);
    }

    public function add_category()
    {
    	$main_category = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
    	return view('admin.categories.add_category')->with('main_category', $main_category);
    }

    public function save_category(Request $request) {


    	// Validation
    	$this -> validate($request, [
	        'name' => 'required|max:500',
    	]);



    	$category = new Category;

    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;
    	$category->save();



    	
    	session()->flash('success', 'Successfully added the category!!');
    	return redirect('/categories');

    }

    public function edit_category($id)
    {
    	$main_category = Category::orderBy('name', 'desc')->where('parent_id', null)->get();
        $category = Category::find($id);
        if (!is_null($category)) {
        	return view('admin.categories.edit_category', compact('category', 'main_category'));
        }
        else
        {
        	return redirect('/categories');
        }
    }

    public function update_category(Request $request, $id) {


        // Validation
    	$this -> validate($request, [
	        'name' => 'required|max:500',
    	]);



    	$category = Category::find($id);

    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;
    	$category->save();


        session()->flash('success', 'Successfully updated the category!!');
        return redirect('/categories');
    }

    public function delete_category($id)
    {
    	$category = category::find($id);
    	if (!is_null($category)) {
    		if ($category->parent_id == null) {
    			$sub_cat = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

    			foreach ($sub_cat as $sub) {
    				$sub->delete();
    			}
    		}
    		$category->delete();
    	}
    	session()->flash('success', 'Successfully deleted the category!!');
    	return back();
    }

}
