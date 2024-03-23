<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Memory as ModelsMemory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Memory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Memory';

        $memories = ModelsMemory::paginate(10);

        return view('pages.admin.memory.index', compact('title', 'memories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Memory';

        return view('pages.admin.memory.create', compact('title'));
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
            'cost_per_month' => 'required',
        ]);

        $values = $request->all();
        unset($values['_token']);
        ModelsMemory::create($values);
        Alert::success('Hore!', 'Memory Created Successfully');
        return redirect('/admin/memory');
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
        $title = 'Update Memory';

        $memory = ModelsMemory::find($id);

        return view('pages.admin.memory.edit', compact('title', 'memory'));
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
            'cost_per_month' => 'required',
        ]);

        $values = $request->all();
        $memory = ModelsMemory::find($id);

        $memory->datacenter = $values['datacenter'];
        $memory->cost_per_month = $values['cost_per_month'];
        $memory->save();

        Alert::success('Hore!', 'Memory updated Successfully');
        return redirect('/admin/memory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gpu = ModelsMemory::find($id);
        $gpu->delete();

        Alert::success('Hore!', 'Memory deleted Successfully');
        return redirect('/admin/memory');
    }
}
