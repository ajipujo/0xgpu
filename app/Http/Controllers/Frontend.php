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

    public function gpu_home() {
        $title = "GPU's";

        $gpus = Gpu::paginate(10);

        return view('pages.gpu.index', compact('title', 'gpus'));
    }

    public function cpu_home() {
        $title = "CPU's";

        $cpus = Cpu::paginate(10);

        return view('pages.cpu.index', compact('title', 'cpus'));
    }

    public function memory_home() {
        $title = "Memory";

        $memories = Memory::paginate(10);

        return view('pages.memory.index', compact('title', 'memories'));
    }

    public function storage_home() {
        $title = "Storage Disks";

        $storages = Storage::paginate(10);

        return view('pages.storage.index', compact('title', 'storages'));
    }

    public function vpc_home() {
        $title = "Private Networks (VPC)";

        $vpcs = Vpc::paginate(10);

        return view('pages.vpc.index', compact('title', 'vpcs'));
    }

    public function ipv4_home() {
        $title = "IPv4 addresses";

        $ipv4s = Ipv4::paginate(10);

        return view('pages.ipv4.index', compact('title', 'ipv4s'));
    }
}
