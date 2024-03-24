<div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 w-64 min-h-full bg-base-200 text-base-content">
        <!-- Sidebar content here -->
        <div class="mb-[16px]">
            <img src="{{ asset('images/logo.png') }}" alt="0xGPU" width="130px">
        </div>
        @if (Auth::user() && Auth::user()->role == 'Admin')
            <li class="{{ Route::currentRouteName() == 'dashboard.home' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('dashboard.home') }}">
                    <i class="fa-solid fa-house text-lg"></i>
                    <span class="ml-2">Home</span>
                </a>
            </li>
            {{-- <li
                class="{{ in_array(Route::currentRouteName(), ['clouds.index', 'clouds.create', 'clouds.edit']) == 'clouds.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('clouds.index') }}">
                    <i class="fa-solid fa-server text-lg"></i>
                    <span class="ml-2">AI Clouds</span>
                </a>
            </li> --}}
            <li
                class="{{ in_array(Route::currentRouteName(), ['gpu.index', 'gpu.create', 'gpu.edit']) == 'gpu.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('gpu.index') }}">
                    <i class="fa-solid fa-hard-drive text-lg"></i>
                    <span class="ml-2">GPU's</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['cpu.index', 'cpu.create', 'cpu.edit']) == 'cpu.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('cpu.index') }}">
                    <i class="fa-solid fa-microchip text-lg"></i>
                    <span class="ml-2">Virtual CPU's</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['memory.index', 'memory.create', 'memory.edit']) == 'memory.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('memory.index') }}">
                    <i class="fa-solid fa-memory text-lg"></i>
                    <span class="ml-2">Memory</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['storage.index', 'storage.create', 'storage.edit']) == 'storage.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('storage.index') }}">
                    <i class="fa-solid fa-database text-lg"></i>
                    <span class="ml-2">Storage Disks</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['vpc.index', 'vpc.create', 'vpc.edit']) == 'vpc.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('vpc.index') }}">
                    <i class="fa-solid fa-globe text-lg"></i>
                    <span class="ml-2">Private networks (VPC)</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['ipv4.index', 'ipv4.create', 'ipv4.edit']) == 'ipv4.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('ipv4.index') }}">
                    <i class="fa-solid fa-circle-nodes text-lg"></i>
                    <span class="ml-2">IPv4 addresses</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['dashboard.transactions', 'dashboard.transaction.show']) ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('dashboard.transactions') }}">
                    <i class="fa-solid fa-credit-card text-lg"></i>
                    <span class="ml-2">Transactions</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['claim.index']) ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('claim.index') }}">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span class="ml-2">Claim Request</span>
                </a>
            </li>
        @else
            <li class="{{ Route::currentRouteName() == 'frontend.home' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.home') }}">
                    <i class="fa-solid fa-house text-lg"></i>
                    <span class="ml-2">Home</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'frontend.gpu' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.gpu') }}">
                    <i class="fa-solid fa-hard-drive text-lg"></i>
                    <span class="ml-2">GPU's</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'frontend.cpu' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.cpu') }}">
                    <i class="fa-solid fa-microchip text-lg"></i>
                    <span class="ml-2">Virtual CPU's</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'frontend.memory' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.memory') }}">
                    <i class="fa-solid fa-memory text-lg"></i>
                    <span class="ml-2">Memory</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'frontend.storage' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.storage') }}">
                    <i class="fa-solid fa-database text-lg"></i>
                    <span class="ml-2">Storage Disks</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'frontend.vpc' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.vpc') }}">
                    <i class="fa-solid fa-globe text-lg"></i>
                    <span class="ml-2">Private networks (VPC)</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'frontend.ipv4' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.ipv4') }}">
                    <i class="fa-solid fa-circle-nodes text-lg"></i>
                    <span class="ml-2">IPv4 addresses</span>
                </a>
            </li>
            {{-- <li
                class="{{ in_array(Route::currentRouteName(), ['frontend.clouds', 'frontend.cloud']) ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('frontend.clouds') }}">
                    <i class="fa-solid
                fa-server text-lg"></i>
                    <span class="ml-2">AI Clouds</span>
                </a>
            </li> --}}
            @if (Auth::user() && Auth::user()->role == 'Guest')
                <li
                    class="{{ in_array(Route::currentRouteName(), ['transaction.index', 'transaction.show']) ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                    <a href="{{ route('transaction.index') }}">
                        <i class="fa-solid fa-credit-card text-lg"></i>
                        <span class="ml-2">My Transactions</span>
                    </a>
                </li>
            @endif
        @endif
    </ul>
</div>
