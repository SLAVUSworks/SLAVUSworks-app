@extends('public.desktop')

@section('title', 'Skills')

@section('window')
    @php
        $windowId = 'skillsWindow';
    @endphp

    <div id="{{ $windowId }}"
        class="window w-[1000px] max-w-[95vw] h-[80vh] absolute top-[10%] left-[10%] z-10 border border-gray-700 bg-gray-100 shadow-xl"
        data-default="true" style="display: none;">

        <div class="title-bar">
            <div class="title-bar-text">Skills</div>
            <div class="title-bar-controls">
                <button class="bg-white text-black border border-gray-500" aria-label="Minimize"
                    onclick="minimizeWindow('{{ $windowId }}')"></button>
                <a href="{{ route('desktop') }}"><button class="bg-white text-black border border-gray-500"
                        aria-label="Close" onclick="closeWindow('{{ $windowId }}')"></button>
                </a>
            </div>
        </div>

        <div class="bg-red-500 text-white text-xl font-semibold px-4 py-6">
            Skills
        </div>

        <div class="p-4 overflow-auto bg-[#c0c0c0] h-[calc(100%-125px)]">
            @foreach ($skills as $main)
                <div class="mb-8">
                    <h2 class="text-base md:text-lg font-bold text-gray-800 mb-4">{{ $main->name }}</h2>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($main->children as $sub)
                            <div class="bg-gray-200 text-black p-4 border border-gray-500 shadow-inner flex flex-col font-sans text-sm"
                                style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">

                                <h3 class="font-bold text-base mb-2">{{ $sub->name }}</h3>

                                <ul class="list-disc list-inside mt-auto">
                                    @foreach ($sub->children as $set)
                                        <li>{{ $set->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="h-6 w-full bg-gray-300 border-t border-gray-500 text-xs px-4 text-black flex items-center justify-between flex-shrink-0"
            style="box-shadow: inset -1px -1px 0 #ffffff, inset 1px 1px 0 #888888;">
            <span class="font-bold">{{ $skills->count() }} items</span>
        </div>
    </div>
@endsection
