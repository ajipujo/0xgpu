<?php

namespace App\Http\Controllers;

use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Transaction extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'My Transaction';

        return view('pages.transaction.index', compact('title'));
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
        $transaction = ModelsTransaction::find($id);

        if ($transaction->status == 'Process') {
            $title = 'Payment';
        } else {
            $title = 'Transaction';
        }

        return view('pages.transaction.show', compact('title', 'transaction'));
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
        $transaction = ModelsTransaction::find($id);

        if ($transaction->status == 'Process') {
            $transaction->status = 'Paid';
        } else {
            $transaction->status = 'Completed';
        }

        $transaction->save();

        Alert::success('Hore!', 'Transaction Status Updated Successfully');
        return redirect('/transaction');
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
