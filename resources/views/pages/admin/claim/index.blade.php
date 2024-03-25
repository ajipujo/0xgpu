@extends('layouts.master')

@section('content')
    <div class="w-full mb-4">
        <span class="font-semibold text-2xl leading-none text-white">Claim Request</span>
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($claims as $claim)
            <dialog id="modal_accept_{{ $claim->id }}" class="modal">
                <div class="modal-box">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <form action="{{ route('claim.update', ['claim' => $claim->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="Completed">
                        <h3 class="font-bold text-lg mb-5">Approve Claim Request</h3>
                        <textarea name="content" id="richeditor"></textarea>
                        <div class="modal-action">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </dialog>
            <dialog id="modal_reject_{{ $claim->id }}" class="modal">
                <div class="modal-box">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <form action="{{ route('claim.update', ['claim' => $claim->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="Completed">
                        <h3 class="font-bold text-lg mb-5">Reject Claim Request</h3>
                        {{-- <p class="py-4">Press ESC key or click the button below to close</p> --}}
                        <textarea name="content" id="richeditor"></textarea>
                        <div class="modal-action">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </dialog>
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="flex space-x-2">
                                <span class="text-[#606a74]">Wallet Address:</span>
                                <span>{{ $claim->customer->eth_address }}</span>
                            </div>
                            <div class="flex space-x-2">
                                <span class="text-[#606a74]">Revenue:</span>
                                <span>{{ $claim->value }} ETH</span>
                            </div>
                        </div>
                        <div>
                            <span class="text-[#606a74]">Status:</span>
                            @if ($claim->status == 'Process')
                                <div class="badge badge-primary">
                                    {{ $claim->status }}
                                </div>
                            @endif
                            @if ($claim->status == 'Completed')
                                <div class="badge badge-success">
                                    {{ $claim->status }}
                                </div>
                            @endif
                            @if ($claim->status == 'Reject')
                                <div class="badge badge-error">
                                    {{ $claim->status }}
                                </div>
                            @endif
                        </div>
                        <div>
                            @if ($claim->status != 'Process')
                                <dialog id="claim_notes_{{ $claim->id }}" class="modal">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg mb-4">Claim Notes</h3>
                                        <div class="w-full border border-[#2f373f] rounded-lg p-4">
                                            <div>{!! html_entity_decode($claim->notes) !!}</div>
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
                                    onclick="claim_notes_{{ $claim->id }}.showModal()">
                                    <i class="fa-solid fa-file-invoice"></i>
                                </button>
                            @endif
                            @if ($claim->status == 'Process')
                                <button onclick="modal_accept_{{ $claim->id }}.showModal()" type="button"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-circle-check"></i>
                                </button>
                                <button onclick="modal_reject_{{ $claim->id }}.showModal()"
                                    class="btn btn-error btn-sm">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $claims->links() }}
@endsection
