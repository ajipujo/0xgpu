<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Ipv4;
use App\Models\Memory;
use App\Models\Product;
use App\Models\Storage;
use App\Models\Vpc;
use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function index() {
        $title = "Home";

        $gpu_length = Gpu::all()->count();
        $cpu_length = Cpu::all()->count();
        $memory_length = Memory::all()->count();
        $storage_length = Storage::all()->count();
        $vpc_length = Vpc::all()->count();
        $ipv4_length = Ipv4::all()->count();

        return view('pages.home', compact('title', 'gpu_length', 'cpu_length', 'memory_length', 'storage_length', 'vpc_length', 'ipv4_length'));
    }
}
