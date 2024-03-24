@extends('layouts.master')

@section('content')
    @if (Auth::user() && Auth::user()->role == 'Guest')
        <dialog id="modal_claim" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Claim Revenue</h3>
                <div class="py-4">
                    <form action="{{ route('frontend.claim') }}" method="POST">
                        @csrf
                        <input name="value" type="hidden" value="15000">
                        <div class="w-full flex justify-between items-center mb-4">
                            <span>Balance</span>
                            <span>15.000 ETH</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Claim</button>
                    </form>
                </div>
            </div>
        </dialog>
        <div class="w-full mb-[20px]">
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex justify-between items-center">
                        <div class="text-xl font-semibold">Revenue Share</div>
                        <div>
                            <button class="btn btn-primary" onclick="modal_claim.showModal()">Claim Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
