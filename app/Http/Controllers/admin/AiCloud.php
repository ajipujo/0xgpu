<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AiCloud extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'AI Clouds';

        $products = Product::paginate(12);

        return view('pages.admin.clouds.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create AI Clouds';

        return view('pages.admin.clouds.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'provider' => 'required',
            'location' => 'required',
            'ram_capacity' => 'required',
            'ram_bandwith' => 'required',
            'cpu' => 'required',
            'disk_name' => 'required',
            'disk_bandwith' => 'required',
            'disk_capacity' => 'required',
            'price' => 'required',
        ]);

        $values = $request->all();

        unset($values['_token']);
        Product::create($values);
        Alert::success('Hore!', 'Cloud Created Successfully');
        return redirect('/admin/clouds');
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
        $title = 'Update AI Cloud';
        $product = Product::find($id);

        return view('pages.admin.clouds.edit', compact('title', 'product'));
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
            'provider' => 'required',
            'location' => 'required',
            'ram_capacity' => 'required',
            'ram_bandwith' => 'required',
            'cpu' => 'required',
            'disk_name' => 'required',
            'disk_bandwith' => 'required',
            'disk_capacity' => 'required',
            'price' => 'required',
        ]);

        $values = $request->all();
        $product = Product::find($id);

        $product->name = $values['name'];
        $product->provider = $values['provider'];
        $product->location = $values['location'];
        $product->ram_capacity = $values['ram_capacity'];
        $product->ram_bandwith = $values['ram_bandwith'];
        $product->cpu = $values['cpu'];
        $product->disk_name = $values['disk_name'];
        $product->disk_bandwith = $values['disk_bandwith'];
        $product->disk_capacity = $values['disk_capacity'];
        $product->price = $values['price'];

        $product->save();

        Alert::success('Hore!', 'Cloud updated Successfully');
        return redirect('/admin/clouds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Alert::success('Hore!', 'Cloud deleted Successfully');
        return redirect('/admin/clouds');
    }
}
