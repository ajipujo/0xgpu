<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function index() {
        $title = "Home";

        return view('pages.home', compact('title'));
    }
}
