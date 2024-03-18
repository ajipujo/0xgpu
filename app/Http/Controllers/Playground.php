<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Playground extends Controller
{
    public function import_clouds() {
        $contents = json_decode(Storage::get('public/offers.json'), true);
        $clouds = $contents['offers'];

        $insertClouds = [];

        foreach ($clouds as $cloud) {
            $hosting_type = $cloud == 1 ? 'datacenter' : 'Host';
            $data = [
                'name' => $cloud['gpu_lanes'] . ' ' . $cloud['gpu_name'],
                'provider' => $hosting_type.':'.$cloud['host_id'],
                'location' => $cloud['geolocation'] ?? "-",
                'ram_capacity' => floor($cloud['gpu_ram'] / 1000),
                'ram_bandwith' => round($cloud['gpu_mem_bw'], 1),
                'cpu' => $cloud['cpu_name'] ?? '-',
                'disk_name' => $cloud['disk_name'] ?? "-",
                'disk_bandwith' => $cloud['disk_bw'] ?? 0,
                'disk_capacity' => $cloud['disk_space'] ?? 0,
                'price' => sprintf('%f', floatval(round($cloud['discounted_dph_total'], 3) * 0.00028)),
            ];
            Product::create($data);
        }

        echo "Success";
    }
}
