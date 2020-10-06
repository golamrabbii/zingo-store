<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;
use App\ProductImage;
use App\Division;
use App\District;
use App\User;
use Image;

use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
    	$product = Product::orderBy('id', 'desc')->get();
        $order = Order::orderBy('id', 'desc')->get();
        return view('admin.index', compact('product', 'order'));
    	// return view('admin.index');
    }
    
    public function add_customer()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::orderBy('name', 'asc')->get();
    	return view('admin.customer.add_customer', compact('divisions','district'));
    }

   public function customer()
   {
       $customer = User::orderBy('id', 'desc')->get();
       return view('admin.customer.index', compact('customer'));
   }

   public function delete_customer($id)
    {
        $user = User::find($id);

        if (!is_null($user)) {
            $user->delete();
        }
        session()->flash('success', 'Deleted successfully');
        return back();
    }

    public function admin_settings()
    {
      $admin = Auth::user();
      return view('admin.settings', compact('admin'));
    }

    public function update_admin(Request $request)
    {
      $admin = Auth::user();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if ($request->password != NULL || $request->password != '') {
          $admin->password = bcrypt($request->password);
        }
        $admin->save();

        session()->flash('success', 'Updated successfully');
        return redirect('/admin');
    }
}
