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

        $orders = Order::all();
        $customers = User::where('role', 'customer')->get();
        $employees = User::where('role', 'employee')->get();
        $services = Service::all();

        $totalCustomer = DB::table('users')->where('role', 'customer')->count('user_id');
        $totalEmployee = DB::table('users')->where('role', 'employee')->count('user_id');
        $totalService = DB::table('services')->count('id');
        $totalOrder = DB::table('order')->count('order_id');

        $orderDB = DB::table('order')
            ->selectRaw('COUNT(order_id) as cnt, DATE_FORMAT(created_at, "%d/%m/%Y") fdate')
            ->whereDate('created_at', '>=', Carbon::now()->subDays(6))
            ->orderByRaw('STR_TO_DATE(fdate, "%d/%m/%Y")', 'ASC')
            ->groupBy('fdate')->get()
            ->mapWithKeys(function ($item) {

                return [$item->fdate => $item->cnt];
            });

        $orderDate = collect(CarbonPeriod::create(now()->subDays(6), now()))->mapWithKeys(function ($date) {
            return [$date->format('d/m/Y') => 0];
        })->merge($orderDB)->sortKeys();


        return view('dashboards.admin.index', compact('customers', 'employees', 'services', 'orders', 'totalCustomer', 'totalEmployee', 'totalService', 'totalOrder','orderDate'));
    }

}
