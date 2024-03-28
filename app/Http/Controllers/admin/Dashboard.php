<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $title = 'Dashboard';

        $users = User::where('role', 'Guest')->count();
        $transactions = Transaction::all()->count();
        $claims = Claim::where('status', 'Completed')->sum('value');

        return view('pages.admin.dashboard', compact('title', 'users', 'transactions', 'claims'));
    }
}
