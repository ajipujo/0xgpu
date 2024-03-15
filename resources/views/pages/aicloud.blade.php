@extends('layouts.master')

@section('content')
    <div class="w-full mb-4">
        <span class="font-semibold text-2xl leading-none text-white">Cloud List</span>
    </div>
    <div class="w-full grid xs:grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        @foreach ($products as $product)
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex justify-between items-center mb-[20px]">
                        <div>
                            <h2 class="card-title">{{ $product->name }}</h2>
                            <span class="text-sm text-[#606a74]">{{ $product->price }} ETH</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                            {{-- <a href="{{ route('clouds.edit', ['cloud' => $product->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('clouds.destroy', ['cloud' => $product->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-error btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form> --}}
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
                        <div>
                            <div class="text-[#606a74]">CPU</div>
                            <div class="tooltip" data-tip="{{ $product->cpu }}">
                                <div class="line-clamp-1 text-start">{{ $product->cpu }}</div>
                            </div>
                        </div>
                        <div class="px-4">
                            <div class="text-[#606a74]">Disk</div>
                            <div class="tooltip" data-tip="{{ $product->disk_name }}">
                                <div class="line-clamp-1 text-start">{{ $product->disk_name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
@endsection
