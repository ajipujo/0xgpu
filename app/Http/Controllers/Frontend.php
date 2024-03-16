<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function index() {
        $title = "Home";

        $cloud_length = Product::all()->count();

        return view('pages.home', compact('title', 'cloud_length'));
    }
}
