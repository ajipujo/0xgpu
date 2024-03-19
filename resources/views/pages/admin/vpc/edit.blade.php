@extends('layouts.master')

@section('content')
    <div class="w-full">
        <div class="card w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="p-8">
                <div class="w-full mb-4 flex justify-between items-center space-x-2">
                    <span class="font-semibold text-2xl leading-none text-white">Update VPC</span>
                </div>
                <form action="{{ route('vpc.update', ['vpc' => $vpc->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="w-full mb-3">
                        <label className="label-text" for="datacenter">Datacenter</label>
                        <input id="datacenter" name="datacenter" type="text" class="input input-bordered w-full mt-1"
                            required placeholder="Input datacenter" value="{{ $vpc->datacenter }}">
                    </div>
                    <div class="w-full mb-3">
                        <label className="label-text" for="cost_per_hour">Cost per Hour</label>
                        <input id="cost_per_hour" name="cost_per_hour" type="text"
                            class="input input-bordered w-full mt-1" required placeholder="Input cost"
                            value="{{ $vpc->cost_per_hour }}">
                    </div>
                    <button class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
