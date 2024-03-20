@extends('layouts.master')

@section('content')
    <div class="w-full">
        <div class="card w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="p-8">
                <div class="w-full mb-4 flex justify-between items-center space-x-2">
                    <span class="font-semibold text-2xl leading-none text-white">Create GPU</span>
                </div>
                <form action="{{ route('gpu.store') }}" method="POST">
                    @csrf
                    <div class="w-full">
                        <div class="w-full mb-3">
                            <label className="label-text" for="name">Name</label>
                            <input id="name" name="name" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input name">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="memory_capacity">Memory Capacity</label>
                            <input id="memory_capacity" name="memory_capacity" type="text"
                                class="input input-bordered w-full mt-1" required placeholder="Input capacity">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="memory_type">Memory Type</label>
                            <input id="memory_type" name="memory_type" type="text"
                                class="input input-bordered w-full mt-1" required placeholder="Input type">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="bandwith">Memory Bandwith</label>
                            <input id="bandwith" name="bandwith" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input bandwith">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="form_factor">Form Factor</label>
                            <input id="form_factor" name="form_factor" type="text"
                                class="input input-bordered w-full mt-1" required placeholder="Input form factor">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="max_cpu_per_gpu">Max CPU per GPU</label>
                            <input id="max_cpu_per_gpu" name="max_cpu_per_gpu" type="text"
                                class="input input-bordered w-full mt-1" required placeholder="Input value">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="max_memory_per_gpu">Max Memory per CPU</label>
                            <input id="max_memory_per_gpu" name="max_memory_per_gpu" type="text"
                                class="input input-bordered w-full mt-1" required placeholder="Input value">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="cost_per_month">Price</label>
                            <input id="cost_per_month" name="cost_per_month" type="text"
                                class="input input-bordered w-full mt-1" required placeholder="Input price">
                        </div>
                        <button class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
