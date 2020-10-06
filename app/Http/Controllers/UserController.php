<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\District;
use App\Division;

use Auth;

class UserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    	$user = Auth::user();
    	return view('user.index', compact('user'));
    }
    public function settings()
    {

    	$user = Auth::user();
    	$divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::orderBy('name', 'asc')->get();
    	return view('user.settings', compact('user', 'district', 'divisions'));
    }
    public function update_user(Request $request)
    {
    	$user = Auth::user();

    	$this->validate($request, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => 'required|string|email|max:50|unique:users,email,'.$user->id,
            // 'division_id' => 'required|numeric',
            // 'district_id' => 'required|numeric',
            'city' => 'required',
            'phone' => 'required|max:11|unique:users,phone,'.$user->id,
            'street_address' => 'max:100',
        ]);

       // $user = Auth::User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->street_address = $request->street_address;
        // $user->division_id = $request->division_id;
        // $user->district_id = $request->district_id;
        $user->city = $request->city;
        $user->shipping_address = $request->shipping_address;
        if ($request->password != NULL || $request->password != '') {
        	$user->password = bcrypt($request->password);
        }
        $user->ip_address = $request->ip();
        $user->save();

        session()->flash('success', 'Updated successfully');
        return back();
    }

    
}
