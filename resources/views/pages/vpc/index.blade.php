@extends('layouts.master')

@section('content')
    <div class="w-full flex justify-center">
        <span class="text-2xl font-bold">Private networks (VPC)</span>
    </div>
    <div class="w-full text-center mb-[30px] text-[#606a74]">
        Securely connect your virtual machines with private networks
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($vpcs as $vpc)
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex items-center justify-between">
                        <div>
                            <div class="text-[#606a74]">Data Center</div>
                            <div class="font-semibold">{{ $vpc->datacenter }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Cost per Hour</div>
                            <div class="font-semibold">{{ $vpc->cost_per_hour }} ETH</div>
                        </div>
                        <div>
                            <form action="{{ route('transaction.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $vpc->id }}">
                                <input type="hidden" name="product_type" value="VPC">
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
    {{ $vpcs->links() }}
@endsection
