<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AiCloud extends Controller
{
    public function index() {
        $title = 'AI Clouds';

        $products = Product::paginate(12);

        return view('pages.aicloud', compact('title', 'products'));
    }
}
