<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiCloud extends Controller
{
    public function index() {
        $title = 'AI Clouds';

        return view('pages.aicloud', compact('title'));
    }
}
