@extends('layouts.master')

@section('content')
    <dialog id="modal_claim" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Hello!</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action">
        <form method="dialog">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
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
