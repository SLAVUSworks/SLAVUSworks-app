<div class="title-bar flex items-center justify-between px-2 bg-blue-700 text-white h-6">
    <span class="title-bar-text font-bold text-sm">{{ $window['title'] }}</span>
    <div class="title-bar-controls flex gap-1">
        <button onclick="minimizeWindow('{{ $windowId }}')"
            class="w-4 h-4 bg-white text-black border border-gray-500">–</button>
        <a href="{{ route('desktop') }}">
            <button class="w-4 h-4 bg-white text-black border border-gray-500"
                onclick="closeWindow('{{ $windowId }}')">×</button>
        </a>
    </div>
</div>
