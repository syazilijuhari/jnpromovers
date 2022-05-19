<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Event;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {

//        $orders = Order::all();
        $customers = User::where('role', 'customer')->get();
        $employees = User::where('role', 'employee')->get();
        $services = Service::all();

        $totalCustomer = DB::table('users')->where('role', 'customer')->count('user_id');
        $totalEmployee = DB::table('users')->where('role', 'employee')->count('user_id');
        $totalService = DB::table('services')->count('id');
//        $totalOrder = DB::table('order')->count('order_id');


        return view('dashboards.admin.index', compact('customers', 'employees', 'services', 'totalCustomer', 'totalEmployee', 'totalService'));
    }

}
