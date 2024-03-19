@extends('layouts.master')

@section('content')
    <div class="w-full grid xs:grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-hard-drive text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">GPU's</div>
                        <div class="text-[#606a74]">{{ $gpu_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-microchip text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">CPU's</div>
                        <div class="text-[#606a74]">{{ $cpu_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-memory text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">Memory</div>
                        <div class="text-[#606a74]">{{ $memory_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-database text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">Storage Disks</div>
                        <div class="text-[#606a74]">{{ $storage_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-globe text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">Private networks (VPC)</div>
                        <div class="text-[#606a74]">{{ $vpc_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-circle-nodes text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">IPv4 addresses</div>
                        <div class="text-[#606a74]">{{ $ipv4_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
