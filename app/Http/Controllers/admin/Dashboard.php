<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $title = 'Dashboard';

        return view('pages.admin.dashboard', compact('title'));
    }
}
