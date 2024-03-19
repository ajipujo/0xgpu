<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ipv4 as ModelsIpv4;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Ipv4 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'IPv4 addresses';

        $ipv4s = ModelsIpv4::paginate(10);

        return view('pages.admin.ipv4.index', compact('title', 'ipv4s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create IPv4';

        return view('pages.admin.ipv4.create', compact('title'));
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
            'datacenter' => 'required',
            'cost_per_hour' => 'required',
        ]);

        $values = $request->all();
        unset($values['_token']);
        ModelsIpv4::create($values);
        Alert::success('Hore!', 'IPv4 Created Successfully');
        return redirect('/admin/ipv4');
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
        $title = 'Update IPv4';

        $ipv4 = ModelsIpv4::find($id);

        return view('pages.admin.ipv4.edit', compact('title', 'ipv4'));
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
            'datacenter' => 'required',
            'cost_per_hour' => 'required',
        ]);

        $values = $request->all();
        $ipv4 = ModelsIpv4::find($id);

        $ipv4->datacenter = $values['datacenter'];
        $ipv4->cost_per_hour = $values['cost_per_hour'];
        $ipv4->save();

        Alert::success('Hore!', 'IPv4 updated Successfully');
        return redirect('/admin/ipv4');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ipv4 = ModelsIpv4::find($id);
        $ipv4->delete();

        Alert::success('Hore!', 'IPv4 deleted Successfully');
        return redirect('/admin/ipv4');
    }
}
