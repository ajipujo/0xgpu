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
                        <div class="flex space-x-2">
                            <a href="{{ route('dashboard.transaction.show', ['transaction' => $transaction->id]) }}"
                                class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            @if ($transaction->status == 'Paid')
                                <form
                                    action="{{ route('dashboard.transaction.accept', ['transaction' => $transaction->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                </form>
                                <form
                                    action="{{ route('dashboard.transaction.reject', ['transaction' => $transaction->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-error btn-sm">
                                        <i class="fa-solid fa-ban"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <hr class="border border-[#252C33]">
                    <div class="w-full flex space-x-2">
                        <span class="text-[#606a74]">customer:</span>
                        <span>{{ $transaction->customer->eth_address }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $transactions->links() }}
@endsection
