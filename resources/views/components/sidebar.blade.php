<div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 w-64 min-h-full bg-base-200 text-base-content">
        <!-- Sidebar content here -->
        <div class="mb-[16px]">
            <img src="{{ asset('images/logo.png') }}" alt="0xGPU" width="130px">
        </div>
        @if (Auth::user() && Auth::user()->role)
            <li class="{{ Route::currentRouteName() == '/' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a>
                    <i class="fa-solid fa-house text-lg"></i>
                    <span class="ml-2">Home</span>
                </a>
            </li>
            <li
                class="{{ in_array(Route::currentRouteName(), ['clouds.index', 'clouds.create', 'clouds.edit']) == 'clouds.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a href="{{ route('clouds.index') }}">
                    <i class="fa-solid fa-server text-lg"></i>
                    <span class="ml-2">AI Clouds</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'transactions.index' ? 'bg-[#282C32] rounded-md' : '' }} mb-2">
                <a>
                    <i class="fa-solid fa-credit-card text-lg"></i>
                    <span class="ml-2">Transactions</span>
                </a>
            </li>
        @else
            <li>
                <a>
                    <i class="fa-solid fa-house text-lg"></i>
                    <span class="ml-2">Home</span>
                </a>
            </li>
            <li>
                <a>
                    <i class="fa-solid fa-server text-lg"></i>
                    <span class="ml-2">AI Clouds</span>
                </a>
            </li>
            <li>
                <a>
                    <i class="fa-solid fa-globe text-lg"></i>
                    <span class="ml-2">AI VPN</span>
                </a>
            </li>
        @endif
    </ul>
</div>
