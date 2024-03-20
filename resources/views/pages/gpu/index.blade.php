@extends('layouts.master')

@section('content')
    <div class="w-full flex justify-center">
        <span class="text-2xl font-bold">GPUs</span>
    </div>
    <div class="w-full text-center mb-[30px] text-[#606a74]">
        Access high-performance GPUs when you need them and only pay for what you use
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($gpus as $gpu)
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex items-center justify-between">
                        <div>
                            <div class="font-bold text-[16px]">{{ $gpu->name }}</div>
                            <div class="flex space-x-2">
                                <span class="text-[#606a74]">{{ $gpu->memory_capacity }}GB</span>
                                <span class="text-[#606a74]">{{ $gpu->memory_type }}</span>
                                <span class="text-[#606a74]">{{ $gpu->bandwith }}</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Form Factor</div>
                            <div class="font-semibold">{{ $gpu->form_factor }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Max vCPUs per GPU</div>
                            <div class="font-semibold">{{ $gpu->max_cpu_per_gpu }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Max Memory (GB) per GPU</div>
                            <div class="font-semibold">{{ $gpu->max_memory_per_gpu }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Price per Hour</div>
                            <div class="font-semibold">{{ $gpu->price_per_hour }} ETH</div>
                        </div>
                        <div>
                            <form action="{{ route('transaction.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $gpu->id }}">
                                <input type="hidden" name="product_type" value="GPU">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $gpus->links() }}
@endsection
