@extends('layouts.master')

@section('content')
    <div class="w-full mb-4 flex justify-between items-center space-x-2">
        <span class="font-semibold text-2xl leading-none text-white">Memory List</span>
        <a href="{{ route('memory.create') }}" class="btn btn-primary">Create +</a>
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($memories as $memory)
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex items-center justify-between">
                        <div>
                            <div class="text-[#606a74]">Data Center</div>
                            <div class="font-semibold">{{ $memory->datacenter }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Cost per Month</div>
                            <div class="font-semibold">{{ $memory->cost_per_month }} ETH</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('memory.edit', ['memory' => $memory->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('memory.destroy', ['memory' => $memory->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-error btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $memories->links() }}
@endsection
