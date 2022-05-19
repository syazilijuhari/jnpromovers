<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CustomerExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('role', 'customer')->orderBy('created_at','asc')->paginate(3);;

        return view('dashboards.admin.customer', compact('customers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customerId = $request->input('oldid');
        $customers = User::findOrFail($customerId);
        $customers->delete();

        return redirect()->route('admin.customer.index')->with('success', 'Customer is successfully deleted');
    }

    public function export()
    {
        return Excel::download(new CustomerExport,'customers.xlsx');
    }

}
