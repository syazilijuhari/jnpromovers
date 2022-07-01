<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function assign(Request $request, $order_id) {

        $employee = User::whereIn('user_id', $request->employee)->pluck('phone')->implode(',');
        $order = Order::find($order_id);

        $response = Http::post('https://terminal.adasms.com/api/v1/send', [
            '_token' => getenv("ADASMS_TOKEN"),
            'phone' => $employee,
            'message' => 'You received an order from JN Pro Movers Order ID: ' . $order->order_id . ' Address From: ' . $order->address_from . ' Address To: ' . $order->address_to,
        ]);

        if ($response['success']) {
            $msg = "Message sent successfully";
            return redirect()->back()->with('success', $msg);
        }
        else {
            $msg = $response['explain'];
            return redirect()->back()->with('failed', $msg);
        }

//        1. $employees = array user.
//        2. create empty array = $phones.
//        3. foreach list $employees and masukkan no telefon ke array $phones.
//        4. implode $phones dengan comma (so that dia array tu akan cantum bersama ',' utk jadikan string. eg: '011124,0123123,12321903')
//        5. send API
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('order')->orderBy('created_at', 'desc')->paginate(5);
        return view('dashboards.admin.order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $employees = User::where('role','employee')->get();
        $orders = Order::find($order_id);
        return view('dashboards.admin.order_details', compact('orders', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new OrderExport(),'orders.xlsx');
    }


}
