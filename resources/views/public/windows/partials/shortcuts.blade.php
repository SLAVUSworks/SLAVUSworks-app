<div class="w-full md:w-[210px] flex flex-col md:flex-col items-center gap-2 sm:gap-3 md:gap-4 
            border-b md:border-b-0 md:border-r border-black pb-3 md:pb-0 md:pr-4">
    
    <img src="{{ asset('storage/' . $window['img']) }}" 
         alt="Profile Image" 
         class="w-fit h-40 hidden md:block" />
    
    <div class="w-full flex flex-col gap-2 sm:gap-2 md:gap-3">
        <a href="{{ route('biography') }}" class="w-full">
            <button class="w-full h-9 sm:h-10 bg-white border border-black text-xs sm:text-sm font-medium hover:bg-gray-50 active:bg-gray-100 transition">
                About Me
            </button>
        </a>
        <a href="{{ route('slavusworks') }}" class="w-full">
            <button class="w-full h-9 sm:h-10 bg-white border border-black text-xs sm:text-sm font-medium hover:bg-gray-50 active:bg-gray-100 transition">
                SLAVUSworks
            </button>
        </a>
        <a href="{{ route('contact') }}" class="w-full">
            <button class="w-full h-9 sm:h-10 bg-white border border-black text-xs sm:text-sm font-medium hover:bg-gray-50 active:bg-gray-100 transition">
                Contact
            </button>
        </a>
    </div>

    <div class="hidden md:grid w-full grid-cols-3 gap-1 sm:gap-2 md:gap-2">
        <a href="https://www.instagram.com/aghaslavus" target="_blank" class="flex items-center justify-center aspect-square border border-gray-300 bg-white hover:bg-gray-50 transition">
            <img src="{{ asset('assets/img/ig.png') }}" alt="Facebook" class="h-4 sm:h-5 md:h-6 filter grayscale hover:grayscale-0 transition" />
        </a>
        <a href="https://github.com/SLAVUSworks" target="_blank" class="flex items-center justify-center aspect-square border border-gray-300 bg-white hover:bg-gray-50 transition">
            <img src="{{ asset('assets/img/github.png') }}" alt="Github" class="h-4 sm:h-5 md:h-6 filter grayscale hover:grayscale-0 transition" />
        </a>
        <a href="https://slavusworks.my.id" target="_blank" class="flex items-center justify-center aspect-square border border-gray-300 bg-white hover:bg-gray-50 transition">
            <img src="{{ asset('assets/img/web.png') }}" alt="Web" class="h-4 sm:h-5 md:h-6 filter grayscale hover:grayscale-0 transition" />
        </a>
    </div>

    <button onclick="closeWindow('{{ $windowId }}')" class="md:hidden w-full h-10 bg-blue-600 border border-blue-800 text-white font-medium hover:bg-blue-700 active:bg-blue-800 transition">
        More
    </button>
</div>