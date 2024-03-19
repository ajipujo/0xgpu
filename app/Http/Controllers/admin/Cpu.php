<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cpu as ModelsCpu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Cpu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Virtual CPU';

        $cpus = ModelsCpu::paginate(10);

        return view('pages.admin.cpu.index', compact('title', 'cpus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create CPU';

        return view('pages.admin.cpu.create', compact('title'));
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
        ModelsCpu::create($values);
        Alert::success('Hore!', 'vCPU Created Successfully');
        return redirect('/admin/cpu');
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
        $title = 'Update CPU';

        $cpu = ModelsCpu::find($id);

        return view('pages.admin.cpu.edit', compact('title', 'cpu'));
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
        $cpu = ModelsCpu::find($id);

        $cpu->datacenter = $values['datacenter'];
        $cpu->cost_per_hour = $values['cost_per_hour'];
        $cpu->save();

        Alert::success('Hore!', 'CPU updated Successfully');
        return redirect('/admin/cpu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gpu = ModelsCpu::find($id);
        $gpu->delete();

        Alert::success('Hore!', 'CPU deleted Successfully');
        return redirect('/admin/cpu');
    }
}
