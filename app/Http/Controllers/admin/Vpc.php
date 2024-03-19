<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vpc as ModelsVpc;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Vpc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Private networks (VPC)';

        $vpcs = ModelsVpc::paginate(10);

        return view('pages.admin.vpc.index', compact('title', 'vpcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create VPC';

        return view('pages.admin.vpc.create', compact('title'));
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
        ModelsVpc::create($values);
        Alert::success('Hore!', 'VPC Created Successfully');
        return redirect('/admin/vpc');
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
        $title = 'Update VPC';

        $vpc = ModelsVpc::find($id);

        return view('pages.admin.vpc.edit', compact('title', 'vpc'));
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
        $vpc = ModelsVpc::find($id);

        $vpc->datacenter = $values['datacenter'];
        $vpc->cost_per_hour = $values['cost_per_hour'];
        $vpc->save();

        Alert::success('Hore!', 'VPC updated Successfully');
        return redirect('/admin/vpc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gpu = ModelsVpc::find($id);
        $gpu->delete();

        Alert::success('Hore!', 'VPC deleted Successfully');
        return redirect('/admin/vpc');
    }
}
