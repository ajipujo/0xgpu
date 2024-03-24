<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Claim as ModelsClaim;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Claim extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Claim Request";

        $claims = ModelsClaim::with('customer')->paginate(10);

        return view('pages.admin.claim.index', compact('title', 'claims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $data = $request->all();

        $content = $data['content'];
        $content = trim($content);
        $content = stripslashes($content);
        $content = htmlspecialchars($content);

        $transaction = ModelsClaim::find($id);

        $transaction->status = $data['status'];
        $transaction->notes = $content;
        $transaction->save();

        if ($data['status'] == 'Completed') {
            $alertMsg = 'Transaction Accepted Successfully';
        } else {
            $alertMsg = 'Transaction Rejected Successfully';
        }

        Alert::success('Hore!', $alertMsg);
        return redirect('/admin/claim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
