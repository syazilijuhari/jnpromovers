<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function destroy($id)
    {

        $customers = User::findOrFail($id);
        $customers->delete();

        return back()->with('success', 'Customer is successfully deleted');
    }
}
