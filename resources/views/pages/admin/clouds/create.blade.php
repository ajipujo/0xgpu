@extends('layouts.master')

@section('content')
    <div class="w-full">
        <div class="card w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="p-8">
                <div class="w-full mb-4 flex justify-between items-center space-x-2">
                    <span class="font-semibold text-2xl leading-none text-white">Create Cloud</span>
                </div>
                <div class="w-full">
                    <form action="{{ route('clouds.store') }}" method="POST">
                        @csrf
                        <div class="w-full mb-3">
                            <label className="label-text" for="name">Product Name</label>
                            <input id="name" name="name" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input product name...">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="provider">Provider ID</label>
                            <input id="provider" name="provider" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input provider...">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="location">Location</label>
                            <input id="location" name="location" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input location...">
                        </div>
                        <div class="w-full grid grid-cols-2 gap-6 mb-3">
                            <div class="col-span-1">
                                <label className="label-text" for="ram_capacity">GPU RAM</label>
                                <input id="ram_capacity" name="ram_capacity" type="text"
                                    class="input input-bordered w-full mt-1" required placeholder="Input capacity (GB)...">
                            </div>
                            <div class="col-span-1">
                                <label className="label-text" for="ram_bandwith">GPU Memory Bandwith</label>
                                <input id="ram_bandwith" name="ram_bandwith" type="text"
                                    class="input input-bordered w-full mt-1" required
                                    placeholder="Input bandwith (GB/s)...">
                            </div>
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="cpu">CPU</label>
                            <input id="cpu" name="cpu" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input CPU name...">
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="disk_name">Disk Name</label>
                            <input id="disk_name" name="disk_name" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input disk name...">
                        </div>
                        <div class="w-full grid grid-cols-2 gap-6 mb-3">
                            <div class="col-span-1">
                                <label className="label-text" for="disk_bandwith">Disk Bandwith</label>
                                <input id="disk_bandwith" name="disk_bandwith" type="text"
                                    class="input input-bordered w-full mt-1" required
                                    placeholder="Input disk bandwith (MB/s)...">
                            </div>
                            <div class="col-span-1">
                                <label className="label-text" for="disk_capacity">Disk Available Storage</label>
                                <input id="disk_capacity" name="disk_capacity" type="text"
                                    class="input input-bordered w-full mt-1" required
                                    placeholder="Input available disk storage (GB)...">
                            </div>
                        </div>
                        <div class="w-full mb-3">
                            <label className="label-text" for="price">Price</label>
                            <input id="price" name="price" type="text" class="input input-bordered w-full mt-1"
                                required placeholder="Input price (ETH)...">
                        </div>
                        <button class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
