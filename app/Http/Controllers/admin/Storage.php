<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Storage as ModelsStorage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Storage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Storage';

        $storages = ModelsStorage::paginate(10);

        return view('pages.admin.storage.index', compact('title', 'storages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Storage';

        return view('pages.admin.storage.create', compact('title'));
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
            'cost_per_gb_month' => 'required',
        ]);

        $values = $request->all();

        unset($values['_token']);
        ModelsStorage::create($values);
        Alert::success('Hore!', 'Storage Created Successfully');
        return redirect('/admin/storage');
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
        $title = 'Update Storage';

        $storage = ModelsStorage::find($id);

        return view('pages.admin.storage.edit', compact('title', 'storage'));
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
            'cost_per_gb_month' => 'required',
        ]);

        $values = $request->all();
        $storage = ModelsStorage::find($id);

        $storage->datacenter = $values['datacenter'];
        $storage->cost_per_gb_month = $values['cost_per_gb_month'];
        $storage->save();

        Alert::success('Hore!', 'Storage updated Successfully');
        return redirect('/admin/storage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storage = ModelsStorage::find($id);
        $storage->delete();

        Alert::success('Hore!', 'Storage deleted Successfully');
        return redirect('/admin/storage');
    }
}
