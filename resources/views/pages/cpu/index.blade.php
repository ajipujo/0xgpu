@extends('layouts.master')

@section('content')
    <div class="w-full flex justify-center">
        <span class="text-2xl font-bold">CPUs</span>
    </div>
    <div class="w-full text-center mb-[30px] text-[#606a74]">
        High-performance virtual CPUs for your virtual machines
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($cpus as $cpu)
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex items-center justify-between">
                        <div>
                            <div class="text-[#606a74]">Data Center</div>
                            <div class="font-semibold">{{ $cpu->datacenter }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Cost per Month</div>
                            <div class="font-semibold">{{ $cpu->cost_per_month }} ETH</div>
                        </div>
                        <div>
                            @if (Auth::user() && Auth::user()->role == 'Guest')
                                <form action="{{ route('transaction.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $cpu->id }}">
                                    <input type="hidden" name="product_type" value="CPU">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                </form>
                            @endif
                            @if (!Auth::user())
                                <button class="btn btn-primary btn-sm" onclick="web3Login()">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $cpus->links() }}
@endsection
