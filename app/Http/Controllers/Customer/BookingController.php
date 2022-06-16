<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {

        $orders = Order::all();

        return view('booking_details', compact('orders'));
    }

    public function createOrderFirst(Request $request)
    {

        $order = $request->session()->get('order');

        return view('dashboards.customer.booking-one', compact('order'));
    }

    public function postOrderFirst(Request $request)
    {

        $validatedData = $request->validate([
            'package' => 'required',
            'vehicle_type' => 'required',
            'price' => 'required|numeric'
        ]);

        if (empty($request->session()->get('order'))) {
            $orders = new Order();
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);
        } else {
            $orders = $request->session()->get('order');
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);
        }
        return redirect()->route('customer.booking-two');
    }

    public function createOrderSec(Request $request)
    {

        $order = $request->session()->get('order');

        return view('dashboards.customer.booking-two', compact('order'));
    }

    public function postOrderSec(Request $request)
    {
        $orders = new Order();

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload' => 'mimes:jpeg,jpg,png'
            ]);

            $photo = $request['photo'];
            $photoname = time() . '.' . $photo->getClientOriginalExtension();
            $request->fileToUpload->move('img', $photoname);

            $orders->photo = $photoname;
        }

        $validatedData = $request->validate([
            'booking_datetime' => 'required',
            'address_from' => 'required',
            'address_to' => 'required',
            'price' => 'required|numeric',

        ]);

        if (empty($request->session()->get('order'))) {
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);
        } else {
            $orders = $request->session()->get('order');
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);
        }
        return redirect()->route('customer.booking-three');

    }

    public function createOrderThird(Request $request)
    {

        $order = $request->session()->get('order');

        return view('dashboards.customer.booking-three', compact('order'));

    }

    public function postOrderThird(Request $request)
    {

        $validatedData = $request->validate([
            'extra_service' => 'required',
            'note' => 'required',
            'photo' => 'required',
            'price' => 'required|numeric',

        ]);

        $extraService = $request->input('extra_service');

        if (empty($request->session()->get('order'))) {
            $orders = new Order();
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);

        } else {
            $orders = $request->session()->get('order');
            $orders->fill($validatedData);
            $request->session()->put('order', $orders);
        }


        return redirect()->route('customer.booking-review');

    }

    public function orderReview(Request $request) {

        $order = $request->session()->get('order');

        return view('dashboards.customer.booking-review', compact('order'));

    }

    public function postOrderReview(Request $request) {

        $order = $request->session()->get('order');
        $order->save();

        $request->session()->forget('order');

        return redirect()->route('customer.booking-details');
    }
}
