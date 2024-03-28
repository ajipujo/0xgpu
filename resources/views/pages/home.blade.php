@extends('layouts.master')

@section('content')
    @if (Auth::user() && Auth::user()->role == 'Guest')
        <dialog id="modal_claim" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Claim Revenue</h3>
                <div class="py-4">
                    <form action="{{ route('frontend.claim') }}" method="POST" id="formClaim">
                        @csrf
                        <input name="value" id="value" type="hidden" value="0">
                        <div class="w-full flex justify-between items-center mb-4">
                            <span>Balance</span>
                            <div class="flex space-x-2 items-center">
                                <span id="balanceToken"></span>
                                <span class="text-[#606a74] font-semibold">0xG</span>
                            </div>
                        </div>
                        <div class="w-full flex justify-between items-center mb-4">
                            <span>Revenue</span>
                            <div class="flex space-x-2 items-center">
                                <span id="revenueToken"></span>
                                <span class="text-[#606a74] font-semibold">ETH</span>
                            </div>
                        </div>
                        <button id="btnSubmit1" type="submit" class="btn btn-primary btn-block">Claim Now</button>
                        <button id="btnSubmit2" type="button" class="btn btn-primary btn-disabled btn-block">Claim
                            Now</button>
                    </form>
                </div>
            </div>
        </dialog>
        <div class="w-full mb-[20px]">
            <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
                <div class="card-body">
                    <div class="w-full flex justify-between items-center {{ count($claims) > 0 ? 'mb-3' : '' }}">
                        <div class="text-xl font-semibold">Revenue Share</div>
                        <div>
                            @if (!$last_claim)
                                <button class="btn btn-primary" onclick="modal_claim.showModal()">Claim Now</button>
                            @endif
                        </div>
                    </div>
                    @if (count($claims) > 0)
                        <div class="h-[140px] overflow-y-scroll space-y-4">
                            @foreach ($claims as $claim)
                                <div class="card card-compact w-full bg-base-100 border border-[#252C33]">
                                    <div class="card-body">
                                        <div class="w-full flex justify-between items-center">
                                            <div class="">{{ $claim->value }} <span
                                                    class="font-semibold text-[#606a74]">ETH</span>
                                            </div>
                                            <div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="w-full grid xs:grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-hard-drive text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">GPU's</div>
                        <div class="text-[#606a74]">{{ $gpu_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-microchip text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">CPU's</div>
                        <div class="text-[#606a74]">{{ $cpu_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-memory text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">Memory</div>
                        <div class="text-[#606a74]">{{ $memory_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-database text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">Storage Disks</div>
                        <div class="text-[#606a74]">{{ $storage_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-globe text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">Private networks (VPC)</div>
                        <div class="text-[#606a74]">{{ $vpc_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-compact w-full bg-base-100 border border-[#252C33] shadow-xl">
            <div class="card-body">
                <div class="w-full flex space-x-4">
                    <div>
                        <i class="fa-solid fa-circle-nodes text-[40px]"></i>
                    </div>
                    <div>
                        <div class="w-full font-bold text-[18px]">IPv4 addresses</div>
                        <div class="text-[#606a74]">{{ $ipv4_length }} Items</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if (Auth::user() && Auth::user()->role == 'Guest')
    @section('script')
        <script>
            const user = <?php echo json_encode(Auth::user()); ?>;
            const ERC20ABI = [{
                    "constant": true,
                    "inputs": [],
                    "name": "name",
                    "outputs": [{
                        "name": "",
                        "type": "string"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": false,
                    "inputs": [{
                            "name": "_spender",
                            "type": "address"
                        },
                        {
                            "name": "_value",
                            "type": "uint256"
                        }
                    ],
                    "name": "approve",
                    "outputs": [{
                        "name": "",
                        "type": "bool"
                    }],
                    "payable": false,
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "totalSupply",
                    "outputs": [{
                        "name": "",
                        "type": "uint256"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": false,
                    "inputs": [{
                            "name": "_from",
                            "type": "address"
                        },
                        {
                            "name": "_to",
                            "type": "address"
                        },
                        {
                            "name": "_value",
                            "type": "uint256"
                        }
                    ],
                    "name": "transferFrom",
                    "outputs": [{
                        "name": "",
                        "type": "bool"
                    }],
                    "payable": false,
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "decimals",
                    "outputs": [{
                        "name": "",
                        "type": "uint8"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [{
                        "name": "_owner",
                        "type": "address"
                    }],
                    "name": "balanceOf",
                    "outputs": [{
                        "name": "balance",
                        "type": "uint256"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "symbol",
                    "outputs": [{
                        "name": "",
                        "type": "string"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": false,
                    "inputs": [{
                            "name": "_to",
                            "type": "address"
                        },
                        {
                            "name": "_value",
                            "type": "uint256"
                        }
                    ],
                    "name": "transfer",
                    "outputs": [{
                        "name": "",
                        "type": "bool"
                    }],
                    "payable": false,
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [{
                            "name": "_owner",
                            "type": "address"
                        },
                        {
                            "name": "_spender",
                            "type": "address"
                        }
                    ],
                    "name": "allowance",
                    "outputs": [{
                        "name": "",
                        "type": "uint256"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "payable": true,
                    "stateMutability": "payable",
                    "type": "fallback"
                },
                {
                    "anonymous": false,
                    "inputs": [{
                            "indexed": true,
                            "name": "owner",
                            "type": "address"
                        },
                        {
                            "indexed": true,
                            "name": "spender",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "name": "value",
                            "type": "uint256"
                        }
                    ],
                    "name": "Approval",
                    "type": "event"
                },
                {
                    "anonymous": false,
                    "inputs": [{
                            "indexed": true,
                            "name": "from",
                            "type": "address"
                        },
                        {
                            "indexed": true,
                            "name": "to",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "name": "value",
                            "type": "uint256"
                        }
                    ],
                    "name": "Transfer",
                    "type": "event"
                }
            ];

            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('formClaim');

                form.addEventListener('submit', async function(event) {
                    // Prevent the default form submission
                    event.preventDefault();

                    // Your custom code here, e.g., validation, sending data via AJAX, etc.
                    const provider = new ethers.providers.Web3Provider(window.ethereum);

                    const DAI_ADDRESS = "0x486D95c40FEba650c38E98Cd9d7979D9cD88CeA0";

                    const DAI = new ethers.Contract(DAI_ADDRESS, ERC20ABI, provider);
                    const DAIBalance = await DAI.balanceOf(user.eth_address);

                    const formattedBalance = ethers.utils.formatEther(DAIBalance);
                    document.getElementById("value").value = formattedBalance;

                    // You can optionally submit the form programmatically here if needed
                    form.submit();
                });

                async function GetBalance() {
                    document.getElementById("btnSubmit1").classList.add("hidden");
                    document.getElementById("btnSubmit2").classList.add("hidden");

                    const provider = new ethers.providers.Web3Provider(window.ethereum);

                    const DAI_ADDRESS = "0x486D95c40FEba650c38E98Cd9d7979D9cD88CeA0";

                    const DAI = new ethers.Contract(DAI_ADDRESS, ERC20ABI, provider);
                    const DAIBalance = await DAI.balanceOf(user.eth_address);

                    const formattedBalance = ethers.utils.formatEther(DAIBalance);

                    const onePercent = 100000.1;
                    const halfPercent = 50000.1;

                    let revenue = 0;

                    if (formattedBalance > onePercent) {
                        revenue = 0.05;
                        document.getElementById("btnSubmit1").classList.remove("hidden");
                    }

                    if (formattedBalance > halfPercent && formattedBalance < onePercent) {
                        revenue = 0.025;
                        document.getElementById("btnSubmit1").classList.remove("hidden");
                    }

                    if (revenue == 0) {
                        document.getElementById("btnSubmit2").classList.remove("hidden");
                    }

                    document.getElementById('balanceToken').innerHTML = Number(formattedBalance).toFixed(2);
                    document.getElementById('revenueToken').innerHTML = revenue;
                }

                GetBalance();
            });
        </script>
    @endsection
@endif
