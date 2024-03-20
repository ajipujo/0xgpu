<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Ipv4;
use App\Models\Memory;
use App\Models\Product;
use App\Models\Storage;
use App\Models\Transaction as ModelsTransaction;
use App\Models\Vpc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $transactions = ModelsTransaction::where('user_id', Auth::user()->id)->paginate(10);

        return view('pages.transaction.index', compact('title', 'transactions'));
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
        $request->validate([
            'product_id' => 'required',
            'product_type' => 'required'
        ]);

        $values = $request->all();
        $user_id = Auth::user()->id;

        switch ($values['product_type']) {
            case 'GPU':
                $product = Gpu::find($values['product_id']);
                $product_name = $product['name'];
                $product_price = $product['cost_per_month'];
                break;
            case 'CPU':
                $product = Cpu::find($values['product_id']);
                $product_name = $product['datacenter'];
                $product_price = $product['cost_per_month'];
                break;
            case 'MEMORY':
                $product = Memory::find($values['product_id']);
                $product_name = $product['datacenter'];
                $product_price = $product['cost_per_month'];
                break;
            case 'STORAGE':
                $product = Storage::find($values['product_id']);
                $product_name = $product['datacenter'];
                $product_price = $product['cost_per_gb_month'];
                break;
            case 'VPC':
                $product = Vpc::find($values['product_id']);
                $product_name = $product['datacenter'];
                $product_price = $product['cost_per_month'];
                break;
            case 'IPV4':
                $product = Ipv4::find($values['product_id']);
                $product_name = $product['datacenter'];
                $product_price = $product['cost_per_month'];
                break;

            default:
                $product = null;
                break;
        }

        if ($product) {
            $transaction = ModelsTransaction::create([
                'product_id' => $product->id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_type' => $values['product_type'],
                'user_id' => $user_id,
                'status' => 'Process'
            ]);

            $callback = '/transaction/' . $transaction['id'];

            Alert::success('Hore!', 'Transaction Created Successfully');
            return redirect($callback);
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
        $transaction = ModelsTransaction::find($id);
        $product = null;

        if ($transaction->status == 'Process') {
            $title = 'Payment';

            return view('pages.transaction.show', compact('title', 'transaction'));
        } else {
            $title = 'Transaction';

            if ($transaction->product_type == "GPU") {
                $product = Gpu::find($transaction->product_id);
            } elseif ($transaction->product_type == "CPU") {
                $product = Cpu::find($transaction->product_id);
            } elseif ($transaction->product_type == "MEMORY") {
                $product = Memory::find($transaction->product_id);
            } elseif ($transaction->product_type == "STORAGE") {
                $product = Storage::find($transaction->product_id);
            } elseif ($transaction->product_type == "VPC") {
                $product = Vpc::find($transaction->product_id);
            } elseif ($transaction->product_type == "IPV4") {
                $product = Ipv4::find($transaction->product_id);
            }

            return view('pages.transaction.show', compact('title', 'transaction', 'product'));
        }
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
