@extends('layouts.master')

@section('content')
    <div class="w-full">
        {{-- @if ($transaction->status == 'Process') --}}
        <div class="w-full flex justify-center">
            <div class="card card-compact w-full md:w-1/3 bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex justify-center">
                        <span class="text-2xl text-white font-semibold">Payment</span>
                    </div>
                    <div class="text-center mb-4">status: <span
                            class="badge badge-primary font-bold text-white">{{ $transaction->status }}</span>
                    </div>
                    <div class="w-full flex justify-center mb-[10px]">
                        <img src="{{ asset('images/qr-payment.png') }}" width="70%" />
                    </div>
                    <p class="text-center">scan for wallet address</p>
                    <div class="w-full flex justify-center mb-[20px]">
                        <span class="font-bold text-xl">{{ $transaction->product_price }} ETH</span>
                    </div>
                    @if ($transaction->status == 'Process')
                        <form action="{{ route('transaction.update', ['transaction' => $transaction->id]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary btn-block">I already paid
                            </button>
                        </form>
                    @else
                        <a href="{{ route('transaction.index') }}" type="submit" class="btn btn-primary btn-block">Back to
                            transaction page
                        </a>
                    @endif
                </div>
            </div>
        </div>
        {{-- @endif --}}
    </div>
@endsection
