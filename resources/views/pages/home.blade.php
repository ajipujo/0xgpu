@extends('layouts.master')

@section('content')
    <div class="w-full grid xs:grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-server text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">AI Cloud</div>
                        <div class="text-[#606a74]">{{ $cloud_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-globe text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">AI VPN</div>
                        <div class="text-[#606a74]">3 Items</div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
