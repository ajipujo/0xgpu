@extends('layouts.master')

@section('content')
    <div class="w-full mb-4 flex justify-between items-center space-x-2">
        <span class="font-semibold text-2xl leading-none text-white">GPU List</span>
        <a href="{{ route('gpu.create') }}" class="btn btn-primary">Create +</a>
    </div>
    <div class="w-full space-y-4 mb-4">
        @foreach ($gpus as $gpu)
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex items-center justify-between">
                        <div>
                            <div class="font-bold text-[16px]">{{ $gpu->name }}</div>
                            <div class="flex space-x-2">
                                <span class="text-[#606a74]">{{ $gpu->memory_capacity }}GB</span>
                                <span class="text-[#606a74]">{{ $gpu->memory_type }}</span>
                                <span class="text-[#606a74]">{{ $gpu->bandwith }}</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Form Factor</div>
                            <div class="font-semibold">{{ $gpu->form_factor }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Max CPU per GPU</div>
                            <div class="font-semibold">{{ $gpu->max_cpu_per_gpu }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Max Memory per GPU</div>
                            <div class="font-semibold">{{ $gpu->max_memory_per_gpu }}</div>
                        </div>
                        <div>
                            <div class="text-[#606a74]">Price per Hour</div>
                            <div class="font-semibold">{{ $gpu->price_per_hour }} ETH</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('gpu.edit', ['gpu' => $gpu->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('gpu.destroy', ['gpu' => $gpu->id]) }}" method="POST">
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
    {{ $gpus->links() }}
@endsection
