@extends('layouts.master')

@section('content')
    <div class="w-full grid xs:grid-cols-1 md:grid-cols-3 md:gap-6">
        <div class="col-span-2">
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="p-6">
                    <div class="w-full flex justify-between items-center mb-[20px]">
                        <div>
                            <h2 class="card-title">{{ $product->name }}</h2>
                        </div>
                    </div>
                    <div class="w-full divide-y divide-[#2f373f] mb-[20px]">
                        <div class="w-full flex justify-between py-3">
                            <span>Provider ID</span>
                            <span>{{ $product->provider }}</span>
                        </div>
                        <div class="w-full flex justify-between py-3">
                            <span>Location</span>
                            <span>{{ $product->location }}</span>
                        </div>
                        <div class="w-full flex justify-between py-3">
                            <span>GPU RAM:</span>
                            <span>{{ $product->ram_capacity }} GB</span>
                        </div>
                        <div class="w-full flex justify-between py-3">
                            <span>GPU Memory Bandwith:</span>
                            <span>{{ $product->ram_bandwith }} GB/s</span>
                        </div>
                    </div>
                    <div class="w-full grid grid-cols-2 divide-x divide-[#2f373f]">
                        <div class="pr-4">
                            <div class="text-[#606a74]">CPU</div>
                            <div class="tooltip" data-tip="{{ $product->cpu }}">
                                <div class="line-clamp-1 text-start">{{ $product->cpu }}</div>
                            </div>
                        </div>
                        <div class="pl-4 flex justify-between items-center">
                            <div>
                                <div class="text-[#606a74]">Disk</div>
                                <div class="tooltip" data-tip="{{ $product->disk_name }}">
                                    <div class="line-clamp-1 text-start">{{ $product->disk_name }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="tooltip" data-tip="Disk Bandwith: {{ $product->disk_bandwith }}">
                                    <div class="text-end text-xs">{{ $product->disk_bandwith }} MB/s</div>
                                </div>
                                <div class="tooltip" data-tip="Max. Disk Available Storage: {{ $product->disk_capacity }}">
                                    <div class="text-end text-xs">{{ $product->disk_capacity }} GB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <form action="{{ route('frontend.cloud.transaction', ['cloud' => $product->id]) }}" method="POST">
                        @csrf
                        <div class="w-full flex justify-between items-center mb-2">
                            <span class="text-[#606a74]">Price/Hr</span>
                            <span>{{ $product->price }} ETH</span>
                        </div>
                        <div class="w-full flex justify-between items-center mb-2">
                            <span class="text-[#606a74]">Price/Day</span>
                            <span>{{ $product->price * 24 }} ETH</span>
                        </div>
                        <div class="w-full flex justify-between items-center mb-4">
                            <span class="text-[#606a74]">Price/Month</span>
                            <span>{{ $product->price * 24 * 31 }} ETH</span>
                        </div>
                        <hr class="border border-[#2f373f] mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Rent</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
