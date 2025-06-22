<nav id="nav-dash" class="fixed top-0 z-50 w-full shadow flex items-center justify-between px-6 py-3 h-16">
    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
        <i class="fas fa-cog text-gray-800 text-2xl"></i>
        <h1 class="text-lg font-bold text-white leading-tight">
            SLAVUSworks<br>
            <span class="text-l">Web Control Panel</span> <span class="text-xs font-thin">v2.1</span>
        </h1>
    </a>

    {{-- <div class="flex items-center space-x-4">
        @include('layouts.partials.navbar-notification')
        @include('layouts.partials.navbar-user')
    </div> --}}
</nav>
