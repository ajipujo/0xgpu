<div class="w-full flex justify-between items-center h-[80px] px-5">
    <div>
        <label for="my-drawer-2" class="drawer-button lg:hidden">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>
    <div>
        <div class="flex space-x-3 items-center">
            @guest
                <button class="btn btn-primary" onclick="web3Login()">Login with Metamask</button>
            @endguest
            @auth
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn m-1 space-x-1">
                        <span>{{ Auth::user()->role }}</span>
                        <div class="w-[32px] h-[32px] rounded-full object-cover overflow-hidden cursor-pointer">
                            <img src="{{ asset('images/user-avatar.avif') }}" />
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="dropdown-content border border-[#333c45] z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        {{-- <li><a>Profile</a></li> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li>
                                <button type="submit" class="w-full">Logout</button>
                            </li>
                        </form>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</div>
