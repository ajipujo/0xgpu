<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Ipv4;
use App\Models\Memory;
use App\Models\Product;
use App\Models\Storage;
use App\Models\Transaction as ModelsTransaction;
use App\Models\Vpc;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Transaction extends Controller
{
    public function index() {
        $title = 'Transactions';

        $transactions = ModelsTransaction::with('customer')->paginate(10);

        return view('pages.admin.transaction', compact('title', 'transactions'));
    }

    public function show($id) {
        $title = "View Transaction";

        $transaction = ModelsTransaction::with('customer')->find($id);
        $product = null;

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

        return view('pages.admin.transaction.show', compact('title', 'transaction', 'product'));
    }

    public function accept(Request $request, $id) {
        $data = $request->all();

        $content = $data['content'];
        $content = trim($content);
        $content = stripslashes($content);
        $content = htmlspecialchars($content);

        $transaction = ModelsTransaction::find($id);

        $transaction->status = 'Completed';
        $transaction->notes = $content;
        $transaction->save();

        Alert::success('Hore!', 'Transaction Accepted Successfully');
        return redirect('/admin/transactions');
    }

    public function reject(Request $request, $id) {
        $data = $request->all();

        $content = $data['content'];
        $content = trim($content);
        $content = stripslashes($content);
        $content = htmlspecialchars($content);

        $transaction = ModelsTransaction::find($id);

        $transaction->status = 'Reject';
        $transaction->save();

        Alert::success('Hore!', 'Transaction Rejected Successfully');
        return redirect('/admin/transactions');
    }
}
