@extends('layouts.master')

@section('content')
    @if ($transaction->status == 'Process')
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
                @if ($transaction->product_type == 'GPU')
                    <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                        <div class="card-body">
                            <div class="font-semibold text-white text-xl mb-[14px]">GPU Detail</div>
                            <div class="w-full grid grid-cols-3 md:gap-6">
                                <div>
                                    <div class="font-bold text-[16px]">{{ $product->name }}</div>
                                    <div class="flex space-x-2">
                                        <span class="text-[#606a74]">{{ $product->memory_capacity }}GB</span>
                                        <span class="text-[#606a74]">{{ $product->memory_type }}</span>
                                        <span class="text-[#606a74]">{{ $product->bandwith }}</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Form Factor</div>
                                    <div class="font-semibold">{{ $product->form_factor }}</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Cost per Month</div>
                                    <div class="font-semibold">{{ $product->cost_per_month }} ETH</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Max vCPUs per GPU</div>
                                    <div class="font-semibold">{{ $product->max_cpu_per_gpu }}</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Max Memory (GB) per GPU</div>
                                    <div class="font-semibold">{{ $product->max_memory_per_gpu }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($transaction->product_type == 'CPU')
                    <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                        <div class="card-body">
                            <div class="font-semibold text-white text-xl mb-[14px]">CPU Detail</div>
                            <div class="w-full grid grid-cols-2">
                                <div>
                                    <div class="text-[#606a74]">Datacenter</div>
                                    <div class="font-semibold">{{ $product->datacenter }}</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Cost per Month</div>
                                    <div class="font-semibold">{{ $product->cost_per_month }} ETH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($transaction->product_type == 'MEMORY')
                    <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                        <div class="card-body">
                            <div class="font-semibold text-white text-xl mb-[14px]">Memory Detail</div>
                            <div class="w-full grid grid-cols-2">
                                <div>
                                    <div class="text-[#606a74]">Datacenter</div>
                                    <div class="font-semibold">{{ $product->datacenter }}</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Cost per Month</div>
                                    <div class="font-semibold">{{ $product->cost_per_month }} ETH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($transaction->product_type == 'STORAGE')
                    <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                        <div class="card-body">
                            <div class="font-semibold text-white text-xl mb-[14px]">Storage Detail</div>
                            <div class="w-full grid grid-cols-2">
                                <div>
                                    <div class="text-[#606a74]">Datacenter</div>
                                    <div class="font-semibold">{{ $product->datacenter }}</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Cost per Month</div>
                                    <div class="font-semibold">{{ $product->cost_per_month }} ETH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($transaction->product_type == 'VPC')
                    <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                        <div class="card-body">
                            <div class="font-semibold text-white text-xl mb-[14px]">VPC Detail</div>
                            <div class="w-full grid grid-cols-2">
                                <div>
                                    <div class="text-[#606a74]">Datacenter</div>
                                    <div class="font-semibold">{{ $product->datacenter }}</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Cost per Month</div>
                                    <div class="font-semibold">{{ $product->cost_per_month }} ETH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($transaction->product_type == 'IPV4')
                    <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                        <div class="card-body">
                            <div class="font-semibold text-white text-xl mb-[14px]">IPv4 Detail</div>
                            <div class="w-full grid grid-cols-2">
                                <div>
                                    <div class="text-[#606a74]">Datacenter</div>
                                    <div class="font-semibold">{{ $product->datacenter }}</div>
                                </div>
                                <div>
                                    <div class="text-[#606a74]">Cost per Month</div>
                                    <div class="font-semibold">{{ $product->cost_per_month }} ETH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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
                        <div class="w-full flex flex-wrap justify-between">
                            <div class="text-ellipsis overflow-hidden w-2/3">
                                {{ $transaction->customer->eth_address }}
                            </div>
                            <div><i class="fa-solid fa-up-right-from-square"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
