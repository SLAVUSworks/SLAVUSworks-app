<div class="flex flex-col items-center gap-4 border-r border-black pr-4 w-[15em]">
    <img src="{{ asset('storage/' . $window['img']) }}" alt="ini img" class="w-fit h-40" />
    <a class="w-full h-10" href="{{ route('biography') }}"><button class="w-full h-10 bg-white border border-black">About
            Me</button></a>
    <a class="w-full h-10" href="{{ route('slavusworks') }}"><button
            class="w-full h-10 bg-white border border-black">SLAVUSworks</button></a>
    <a class="w-full h-10" href="{{ route('contact') }}"><button
            class="w-full h-10 bg-white border border-black">Contact</button></a>
    <div class="w-full grid grid-cols-3">
        <a href="https://facebook.com" target="_blank" class="flex items-center justify-center h-12">
            <img src="{{ asset('assets/img/ig.png') }}" alt="Facebook" class="h-6 filter grayscale" />
        </a>
        <a href="https://github.com" target="_blank" class="flex items-center justify-center h-12">
            <img src="{{ asset('assets/img/github.png') }}" alt="Github" class="h-6 filter grayscale " />
        </a>
        <a href="https://test.com" target="_blank" class="flex items-center justify-center h-12">
            <img src="{{ asset('assets/img/web.png') }}" alt="Web" class="h-6 filter grayscale" />
        </a>
    </div>
</div>
