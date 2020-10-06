<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Division;
use App\District;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function divisions()
    {
        $division = Division::orderBy('priority', 'asc')->get();
        return view('admin.divisions.index')->with('division', $division);
    }

    public function add_division()
    {
    	return view('admin.divisions.add_division');
    }

    public function save_division(Request $request) {


    	// Validation
    	$this -> validate($request, [
	        'name' => 'required',
            'priority' => 'required',
    	]);


    	$division = new Division;

    	$division->name = $request->name;
    	$division->priority = $request->priority;
    
    	$division->save();
    	
    	session()->flash('success', 'Successfully added the division!!');
    	return redirect('/divisions');

    }

    public function edit_division($id)
    {
        $division = Division::find($id);
        if (!is_null($division)) {
        	return view('admin.divisions.edit_division', compact('division'));
        }
        else
        {
        	return redirect('/divisions');
        }
    }

    public function update_division(Request $request, $id) {


        // Validation
    	$this -> validate($request, [
	        'name' => 'required',
            'priority' => 'required',
    	]);


    	$division = Division::find($id);

    	$division->name = $request->name;
    	$division->priority = $request->priority;

    	$division->save();


        session()->flash('success', 'Successfully updated the division!!');
        return redirect('/divisions');
    }

    public function delete_division($id)
    {
    	$division = Division::find($id);
    	if (!is_null($division)) {
    		// Delete all districts of this division
            $districts = District::where('division_id', $division->id)->get();
            foreach ($districts as $district) {
                $district->delete();
            }
    		$division->delete();
    	}
    	session()->flash('success', 'Successfully deleted the division!!');
    	return back();
    }
}
