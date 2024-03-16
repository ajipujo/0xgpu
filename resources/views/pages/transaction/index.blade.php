@extends('layouts.master')

@section('content')
    <div class="w-full mb-4">
        <span class="font-semibold text-2xl leading-none text-white">Transactions</span>
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($transactions as $transaction)
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex justify-between items-center">
                        <div>
                            <div class="text-xl font-semibold mb-1">{{ $transaction->product_name }}</div>
                            <div class="text-[#606a74]">{{ $transaction->product_price }} ETH</div>
                        </div>
                        <div class="space-y-1">
                            <div class="flex space-x-1">
                                <span class="text-[#606a74]">Type:</span>
                                <div class="font-semibold flex items-center">
                                    <span>{{ $transaction->product_type }}</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[#606a74]">Order Date:</span>
                                <span>{{ $transaction->created_at }}</span>
                            </div>
                        </div>
                        <div>
                            Status:
                            <div class="badge badge-primary">
                                {{ $transaction->status }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $transactions->links() }}
@endsection
