@extends('layouts.master')

@section('content')
    <div class="w-full mb-4">
        <span class="font-semibold text-2xl leading-none text-white">Transactions</span>
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($transactions as $transaction)
            <dialog id="modal_accept_{{ $transaction->id }}" class="modal">
                <div class="modal-box">
                    <form action="{{ route('dashboard.transaction.accept', ['transaction' => $transaction->id]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <h3 class="font-bold text-lg mb-5">Approve Order</h3>
                        <textarea name="content" id="richeditor"></textarea>
                        <div class="modal-action">
                            <div class="w-full flex justify-end space-x-2">
                                <button class="btn">Close</button>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <dialog id="modal_reject_{{ $transaction->id }}" class="modal">
                <div class="modal-box">
                    <form action="{{ route('dashboard.transaction.reject', ['transaction' => $transaction->id]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <h3 class="font-bold text-lg mb-5">Reject Order</h3>
                        {{-- <p class="py-4">Press ESC key or click the button below to close</p> --}}
                        <textarea name="content" id="richeditor"></textarea>
                        <div class="modal-action">
                            <div class="w-full flex justify-end space-x-2">
                                <button class="btn">Close</button>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full grid grid-cols-4">
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
                        <div class="flex justify-start items-center space-x-2 pl-8">
                            <span>Status:</span>
                            @if ($transaction->status == 'Process' || $transaction->status == 'Paid')
                                <div class="badge badge-primary">
                                    {{ $transaction->status }}
                                </div>
                            @endif
                            @if ($transaction->status == 'Completed')
                                <div class="badge badge-success">
                                    {{ $transaction->status }}
                                </div>
                            @endif
                            @if ($transaction->status == 'Reject')
                                <div class="badge badge-error">
                                    {{ $transaction->status }}
                                </div>
                            @endif
                        </div>
                        <div class="flex space-x-2 items-center justify-end">
                            <a href="{{ route('dashboard.transaction.show', ['transaction' => $transaction->id]) }}"
                                class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            @if ($transaction->status == 'Paid')
                                <button onclick="modal_accept_{{ $transaction->id }}.showModal()" type="button"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-circle-check"></i>
                                </button>
                                <button onclick="modal_reject_{{ $transaction->id }}.showModal()"
                                    class="btn btn-error btn-sm">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
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
