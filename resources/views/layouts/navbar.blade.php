<nav class="flex justify-between items-center py-4 px-2 relative bg-white">
    <div class="flex">
    </div>

    @auth
        <div class="lg:hidden">
            <i class="fad fa-bars fa-2x text-primary transition duration-500 ease-in-out cursor-pointer"
               onclick="showSidebar()" id="openSidebar"></i>
        </div>
    @endauth

    <div class="flex justify-end items-center space-x-6">
        @guest
            @if (Route::has('login'))
                <p>
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </p>
            @endif

            @if (Route::has('register'))
                <p>
                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                </p>
            @endif
        @else
            <div class="flex items-center space-x-2">
                <div class="rounded-full w-12 h-12"
                     style="background: url('https://png.pngtree.com/png-vector/20190704/ourlarge/pngtree-businessman-user-avatar-free-vector-png-image_1538405.jpg') center center no-repeat;
                            background-size: contain"
                >
                </div>
                <p>{{ auth('web')->user()->name }}</p>
            </div>
        @endguest
    </div>
</nav>

