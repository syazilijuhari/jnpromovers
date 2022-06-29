<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function assign(Request $request, $order) {

        $employees_id = $request->only('employee');
        $employees = User::whereIn('user_id', Arr::flatten($employees_id))->get();
        dd($employees);

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
//        $response = Http::post('https://terminal.adasms.com/api/v1/send', [
//            '_token' => getenv("ADASMS_TOKEN"),
//            'phone' => '6' . $request->phone,
//            'message' => 'You received an order' . $request->order_id,
//        ]);

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


}
