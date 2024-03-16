<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AiCloud extends Controller
{
    public function index() {
        $title = 'AI Clouds';

        $products = Product::paginate(12);

        return view('pages.cloud.index', compact('title', 'products'));
    }

    public function show($id) {
        $product = Product::find($id);

        $title = $product->name;

        return view('pages.cloud.show', compact('title', 'product'));
    }

    public function create_transaction($id) {
        $product = Product::find($id);
        $user_id = Auth::user()->id;

        $transaction = Transaction::create([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'product_type' => 'Cloud',
            'user_id' => $user_id,
            'status' => 'Process'
        ]);

        $callback = '/transaction/' . $transaction->id;

        Alert::success('Hore!', 'Transaction Created Successfully');
        return redirect($callback);
    }
}
