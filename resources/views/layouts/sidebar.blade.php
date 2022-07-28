<nav
    class="h-screen border border-gray-300 sidebar-wrapper w-60 h-full max-h-full fixed top-0 -left-96 lg:left-0 z-999 bg-white">
    <div class="sidebar-content">
        <div class="lg:hidden relative">
            <div id="close-sidebar" class="bg-green-300" onclick="closeSidebar()">
                <span class="absolute -right-4 top-0 cursor-pointer">
                    <i class="fad fa-times-octagon fa-2x text-primary h-full flex justify-center items-center"></i>
                </span>
            </div>
        </div>

        <div class="flex flex-col mt-4 justify-between">
            <div class="flex px-8">
                <p class="font-semibold">
                    <img src="https://moesaid.github.io/cleopatra/img/logo.png" alt="" class="w-8">
                </p>
                <p class="font-semibold">
                    {{ config('app.name') }}
                </p>
            </div>

            <div class="flex flex-col mt-20 px-8 space-y-8 h-128 overflow-auto" style="scrollbar-width: thin;">
                <div class="flex items-center cursor-pointer hover:text-primary duration-200">
                    <i class="fad fa-home-lg fa-lg {{ $current === 'home' ? 'text-primary' : '' }}"></i>
                    <span class="mx-4 {{ $current === 'home' ? 'text-primary' : '' }}">HOME</span>
                </div>
                <div class="flex items-center cursor-pointer hover:text-primary duration-200">
                    <a href="/charts">
                    <i class="fad fa-chart-pie fa-lg {{ $current === 'charts' ? 'text-primary' : '' }}"></i>
                    <span class="ml-4  {{ $current === 'charts' ? 'text-primary' : '' }}">CHARTS</span>
                    </a>
                </div>

                <div class="flex items-center cursor-pointer hover:text-primary duration-200">
                    <a href="/fields">
                        <i class="fad fa-folders fa-lg {{ $current === 'fields' ? 'text-primary' : '' }}"></i>
                        <span class="ml-4 {{ $current === 'fields' ? 'text-primary' : '' }}">FIELDS</span>
                    </a>
                </div>

                <div class="flex items-center cursor-pointer hover:text-primary duration-200">
                    <a href="/table">
                        <i class="fad fa-folders fa-lg {{ $current === 'table' ? 'text-primary' : '' }}"></i>
                        <span class="ml-4 {{ $current === 'table' ? 'text-primary' : '' }}">TABLE</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute w-full bottom-0 flex justify-between space-x-8">
            <a href="#" class="flex-grow text-center h-7 relative cursor-pointer hover:text-primary duration-200">
                <i class="fad fa-bells"></i>
                <span class="absolute -top-2">3</span>
            </a>
            <a href="#" class="flex-grow text-center h-7 relative cursor-pointer hover:text-primary duration-200">
                <i class="fad fa-cog"></i>
            </a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="flex-grow text-center h-7 relative cursor-pointer hover:text-primary duration-200">
                <i class="fad fa-power-off"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</nav>

@section('js-after')
    <script>
        function showSidebar() {
            var pageWrappers = document.getElementsByClassName('sidebar-wrapper')
            for (var i = 0; i < pageWrappers.length; i++) {
                pageWrappers[i].classList.add('toggled');
            }

            document.getElementById('openSidebar').classList.add("opacity-0")
        }

        function closeSidebar() {
            var pageWrappers = document.getElementsByClassName('sidebar-wrapper')
            for (var i = 0; i < pageWrappers.length; i++) {
                pageWrappers[i].classList.remove('toggled');
            }

            document.getElementById('openSidebar').classList.remove("opacity-0")
        }
    </script>
@endsection
