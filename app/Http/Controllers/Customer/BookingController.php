<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index() {

    }

    public function createOrderFirst(Request $request) {

        $orders = $request->get('order');

        return view('dashboards.customer.booking-one',compact('orders'));
    }

    public function postOrderFirst(Request $request) {

        $validatedData = $request->validate([
            'package' => 'required',
            'vehicle_type' => 'required',
        ]);

        $orders = new Order();
        $orders->package = $request->package;
        $orders->vehical_type = $request->transport;

        if(empty($request->session()->get('order'))){
            $orders = new Order();
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);
        }else{
            $orders = $request->session()->get('order');
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);
        }
        return redirect()->route('dashboards.customer.booking-two');
    }

    public function createOrderNext() {

        return view('dashboards.customer.booking-two');
    }
}
