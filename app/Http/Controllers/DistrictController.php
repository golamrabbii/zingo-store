<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\District;
use App\Division;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function districts()
    {
        $district = District::orderBy('name', 'asc')->get();
        return view('admin.districts.index', compact('district'));
    }

    public function add_district()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
    	return view('admin.districts.add_district', compact('divisions'));
    }

    public function save_district(Request $request) {


    	// Validation
    	$this -> validate($request, [
	        'name' => 'required',
            'division_id' => 'required',
    	]);


    	$district = new District;

    	$district->name = $request->name;
    	$district->division_id = $request->division_id;
    
    	$district->save();
    	
    	session()->flash('success', 'Successfully added the district!!');
    	return redirect('/districts');

    }

    public function edit_district($id)
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::find($id);
        if (!is_null($district)) {
        	return view('admin.districts.edit_district', compact('district', 'divisions'));
        }
        else
        {
        	return redirect('/districts');
        }
    }

    public function update_district(Request $request, $id) {


        // Validation
    	$this -> validate($request, [
	        'name' => 'required',
            'division_id' => 'required',
    	]);


    	$district = District::find($id);

    	$district->name = $request->name;
    	$district->division_id = $request->division_id;

    	$district->save();


        session()->flash('success', 'Successfully updated the district!!');
        return redirect('/districts');
    }

    public function delete_district($id)
    {
    	$district = District::find($id);
    	if (!is_null($district)) {
    		
    		$district->delete();
    	}
    	session()->flash('success', 'Successfully deleted the district!!');
    	return back();
    }
}
