<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use PDF;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    

    /**
    
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order->is_seen = 1;
        $order->save();
        return view('admin.orders.show', compact('order'));
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!is_null($order)) {
            $order->delete();
        }
        session()->flash('success', 'Successfully deleted the order!!');
        return back();
    }


    public function paid($id)
    {
        $order = Order::find($id);
        if ($order->is_paid) {
            $order->is_paid = 0;
        } else {
            $order->is_paid = 1;
        }
        $order->save();
        session()->flash('success', 'Order paid status has changed !!');
        return back();
    }

    public function completed($id)
    {
        $order = Order::find($id);
        if ($order->is_completed) {
            $order->is_completed = 0;
        } else {
            $order->is_completed = 1;
        }
        $order->save();
        session()->flash('success', 'Order completed status has changed !!');
        return back();
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        
        $pdf = PDF::loadView('admin.orders.invoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }

}
