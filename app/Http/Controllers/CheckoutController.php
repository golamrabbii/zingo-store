<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Payment;
use App\Order;
use App\Cart;

use PDF;

use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('checkout', compact('payments'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'shipping_address' => 'required',
            'payment_method_id' => 'required'
        ]);

        $order = new Order();

        // check transection has given or not
        if ($request->payment_method_id != 'cash') {
            if ( $request->transection_id == NULL || empty($request->transection_id) ) {
                
                session()->flash('error', 'Please give transection number for your payment.');
                return back();

            }
        }

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->transection_id = $request->transection_id;
        $order->ip_address = request()->ip();
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }

        $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;

        $order->save();

        foreach (Cart::totalCarts() as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }
        
        Mail::to($request->email)->send(new \App\Mail\OrderPlaced($order));

        session()->flash('success', 'Your order has taken successfully. Please wait for confirmation and the invoice sent to your email.');
                
        return redirect('/');
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        
        $pdf = PDF::loadView('admin.orders.invoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }

    
}
