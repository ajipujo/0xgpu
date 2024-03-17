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
                        <div class="space-x-1">
                            @if ($transaction->status == 'Completed')
                                <dialog id="order_notes_{{ $transaction->id }}" class="modal">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg mb-4">Order Notes</h3>
                                        <div class="w-full border border-[#2f373f] rounded-lg p-4">
                                            <div>{!! html_entity_decode($transaction->notes) !!}</div>
                                        </div>
                                        <div class="modal-action">
                                            <form method="dialog">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <button class="btn">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </dialog>
                                <button title="Order Notes" class="btn btn-primary btn-sm"
                                    onclick="order_notes_{{ $transaction->id }}.showModal()">
                                    <i class="fa-solid fa-file-invoice"></i>
                                </button>
                            @endif
                            <a href="{{ route('transaction.show', ['transaction' => $transaction->id]) }}"
                                class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $transactions->links() }}
@endsection
