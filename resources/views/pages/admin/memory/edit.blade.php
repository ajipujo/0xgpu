@extends('layouts.master')

@section('content')
    <div class="w-full">
        <div class="card w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="p-8">
                <div class="w-full mb-4 flex justify-between items-center space-x-2">
                    <span class="font-semibold text-2xl leading-none text-white">Update Memory</span>
                </div>
                <form action="{{ route('memory.update', ['memory' => $memory->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="w-full mb-3">
                        <label className="label-text" for="datacenter">Data center</label>
                        <input id="datacenter" name="datacenter" type="text" class="input input-bordered w-full mt-1"
                            required placeholder="Input datacenter" value="{{ $memory->datacenter }}">
                    </div>
                    <div class="w-full mb-3">
                        <label className="label-text" for="cost_per_month">Cost per Month</label>
                        <input id="cost_per_month" name="cost_per_month" type="text"
                            class="input input-bordered w-full mt-1" required placeholder="Input cost"
                            value="{{ $memory->cost_per_month }}">
                    </div>
                    <button class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
