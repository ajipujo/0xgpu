@extends('layouts.master')

@section('content')
    @if ($transaction->status == 'Paid')
        <div class="w-full">
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
                            <a href="{{ route('transaction.index') }}" type="submit" class="btn btn-primary btn-block">Back
                                to
                                transaction page
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (in_array($transaction->status, ['Completed', 'Reject']))
        <div class="w-full grid xs:grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
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
                                    <div class="tooltip"
                                        data-tip="Max. Disk Available Storage: {{ $product->disk_capacity }}">
                                        <div class="text-end text-xs">{{ $product->disk_capacity }} GB</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1">
                <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                    <div class="card-body">
                        <div class="w-full text-[#606a74]">Status:</div>
                        <div class="w-full mb-3">
                            <span class="badge badge-primary">
                                {{ $transaction->status }}
                            </span>
                        </div>
                        <div class="w-full text-[#606a74]">ETH Wallet:</div>
                        <div class="w-full">
                            <p class="text-wrap">
                                {{ $transaction->customer->eth_address }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
