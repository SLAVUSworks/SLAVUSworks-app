<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Desktop')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/98.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/root.css') }}">
</head>

<body
    class="bg-[#2f9b9e] bg-[url('{{ asset('assets/img/SLAVUSbg.png') }}')] bg-[length:800px_auto] bg-no-repeat bg-bottom flex flex-col justify-end min-h-screen text-sm">

    @yield('window')

    <div class="absolute top-2 left-3 flex flex-col gap-2 z-0">
        <a href="{{ route('welcome') }}" onclick="openWindow('welcomeWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/computer_explorer_cool-0.png') }}"
                class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">Welcome</span>
        </a>

        <a href="{{ route('biography') }}" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/user_card.png') }}" class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">About Me</span>
        </a>

        <a href="{{ route('slavusworks') }}" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/slavusworks.png') }}" class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">SLAVUS<br>works</span>
        </a>

        <a href="{{ route('contact') }}" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/write_card_phone.png') }}" class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">Contact</span>
        </a>

        <a href="{{ route('projectslist') }}" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/directory_open_file_mydocs_2k-2.png') }}"
                class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">Projects</span>
        </a>
    </div>
    <div class="absolute top-2 right-3 flex flex-col gap-2 z-0">
        <a href="{{ route('skills') }}" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/msagent-4.png') }}" class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">Skills</span>
        </a>

        <a href="{{ route('experience') }}" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/certificate-0.png') }}" class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">Experience</span>
        </a>

        <a href="{{ route('caseStudies') }}" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/help_book_cool-4.png') }}"
                class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">Case<br>Studies</span>
        </a>

        <a href="#" onclick="openWindow('projectsWindow')"
            class="flex flex-col items-center w-[60px] cursor-pointer select-none">
            <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/desktop-2.png') }}" class="w-8 h-8" />
            <span class="text-white text-xs text-center mt-1 drop-shadow">Blog</span>
        </a>
    </div>

    <div
        class="fixed bottom-0 left-0 w-full bg-gray-300 border-t border-gray-400 p-[2px] flex items-center h-[30px] shadow-inner z-20">

        <button class="button h-full px-2 mx-1 flex items-center gap-2">
            <img src="https://github.com/SLAVUSworks/HL-Web-ICON/blob/master/slavusworks.png?raw=true" alt="Start"
                class="h-5 w-5" />
            <span class="text-sm font-bold">SLAVUSworks</span>
        </button>

        <div class="h-[60%] w-px bg-gray-500 mx-1"></div>

        <div id="taskbar" class="flex-1 flex items-center gap-[2px] h-full overflow-x-auto px-[2px]"></div>

        <div id="clock"
            class="bg-white border border-gray-400 mx-2 px-2 h-full text-xs shadow-inner flex items-center">
            🕔 --
        </div>
    </div>
    @stack('scripts')
    <script src="{{ asset('frontend/js/welcome_function.js') }}"></script>
</body>

</html>
