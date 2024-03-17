<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction as ModelsTransaction;
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
        $transaction = ModelsTransaction::with('customer')->find($id);

        if ($transaction->product_type == 'Cloud') {
            $product = Product::find($transaction->product_id);

            $title = 'View Transaction';

            return view('pages.admin.transaction.show', compact('title', 'transaction', 'product'));
        }
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
