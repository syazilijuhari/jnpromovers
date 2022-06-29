<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('services')->orderBy('created_at','asc')->paginate(5);
        return view('dashboards.admin.infodetails', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admin.infodetails_add');
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
            'title' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        $services = new Service();
        $services->title = $request->title;
        $services->category = $request->category;
        $services->description = $request->desc;
        if ($services -> save()) {
            return redirect('/admin/infodetails')->with('success', 'Service is successfully created');
        }
        else {
            return back()->with('error', 'Service is failed to create');
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
        $services = Service::findOrFail($id);
        return view('dashboards.admin.infodetails_edit', compact('services'));
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
            'title' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        $services = Service::findOrFail($id);
        $services->title = $request->title;
        $services->category = $request->category;
        $services->description = $request->desc;
        $services->save();

        return redirect('/admin/infodetails')->with('success', 'Service is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $serviceId = $request->input('oldid');
        $services = Service::findOrFail($serviceId);
        $services->delete();

        return back()->with('success', 'Service is successfully deleted');
    }
}
