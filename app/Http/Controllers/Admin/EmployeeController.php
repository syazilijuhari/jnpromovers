<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = User::where('role', 'employee')->orderBy('created_at','asc')->paginate(3);
        return view('dashboards.admin.employee', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admin.employee_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $users = new User();
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->role = 'employee';
        if ($users -> save()) {
            return redirect('/admin/employee')->with('success', 'Employee is successfully created');
        }
        else {
            return back()->with('error', 'Employee is failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('dashboards.admin.employee_edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $employee = User::findOrFail($id);
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->save();

        return redirect('/admin/employee')->with('success', 'Employee is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employeeId = $request->input('oldid');
        $employees = User::findOrFail($employeeId);
        $employees->delete();

        return redirect()->route('admin.employee.index')->with('success', 'Employee is successfully deleted');
    }
}
