<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gpu as ModelsGpu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Gpu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "GPU's";

        $gpus = ModelsGpu::paginate(10);

        return view('pages.admin.gpu.index', compact('gpus', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create GPU';

        return view('pages.admin.gpu.create', compact('title'));
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
            'memory_capacity' => 'required',
            'memory_type' => 'required',
            'bandwith' => 'required',
            'form_factor' => 'required',
            'max_cpu_per_gpu' => 'required',
            'max_memory_per_gpu' => 'required',
            'price_per_hour' => 'required',
        ]);

        $values = $request->all();

        unset($values['_token']);
        ModelsGpu::create($values);
        Alert::success('Hore!', 'GPU Created Successfully');
        return redirect('/admin/gpu');
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
        $title = 'Update GPU';

        $gpu = ModelsGpu::find($id);

        return view('pages.admin.gpu.edit', compact('title', 'gpu'));
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
        $validated = $request->validate([
            'name' => 'required',
            'memory_capacity' => 'required',
            'memory_type' => 'required',
            'bandwith' => 'required',
            'form_factor' => 'required',
            'max_cpu_per_gpu' => 'required',
            'max_memory_per_gpu' => 'required',
            'price_per_hour' => 'required',
        ]);

        $values = $request->all();
        $gpu = ModelsGpu::find($id);

        $gpu->name = $values['name'];
        $gpu->memory_capacity = $values['memory_capacity'];
        $gpu->memory_type = $values['memory_type'];
        $gpu->bandwith = $values['bandwith'];
        $gpu->form_factor = $values['form_factor'];
        $gpu->max_cpu_per_gpu = $values['max_cpu_per_gpu'];
        $gpu->max_memory_per_gpu = $values['max_memory_per_gpu'];
        $gpu->price_per_hour = $values['price_per_hour'];

        $gpu->save();

        Alert::success('Hore!', 'GPU updated Successfully');
        return redirect('/admin/gpu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gpu = ModelsGpu::find($id);
        $gpu->delete();

        Alert::success('Hore!', 'GPU deleted Successfully');
        return redirect('/admin/gpu');
    }
}
