@extends('public.desktop')

@section('title', 'Skills')

@section('window')
    @php
        $windowId = 'skillsWindow';
    @endphp

    <div id="{{ $windowId }}" class="window w-full h-[calc(100%-28px)] absolute top-0 left-0 z-10" data-default="true"
        style="display:none;">

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

        <div class="p-4 overflow-auto h-[calc(100%-96px)]">
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
    </div>
@endsection
