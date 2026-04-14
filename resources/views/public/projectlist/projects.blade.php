@extends('public.desktop')

@section('title', 'Projects')

@section('window')
    @php
        $windowId = 'projectsWindow';
    @endphp

    <div id="{{ $windowId }}" class="window w-full h-[calc(100%-28px)] absolute top-0 left-0 z-10" data-default="true"
        style="display:none;">

        <div class="title-bar">
            <div class="title-bar-text">Projects</div>
            <div class="title-bar-controls">
                <button class="bg-white text-black border border-gray-500" aria-label="Minimize"
                    onclick="minimizeWindow('{{ $windowId }}')"></button>
                <a href="{{ route('desktop') }}"><button class="bg-white text-black border border-gray-500"
                        aria-label="Close" onclick="closeWindow('{{ $windowId }}')"></button>
                </a>
            </div>
        </div>

        <div class="p-4 overflow-auto h-[calc(100%-50px)]">
            <div class="bg-blue-400 text-black mb-4 p-4 border border-gray-500 shadow-inner flex flex-col font-sans text-sm"
                style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">
                <h1 class="text-white text-xl font-semibold">Projects Portofolio.</h1>
                <p class="text-white text-sm mt-2">Here are the projects I have built to serve digital solution users.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($windows as $project)
                    <div class="flex flex-col items-start p-3 bg-gray-200 border border-gray-500 shadow-inner cursor-pointer select-none text-black font-sans text-sm"
                        style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">

                        <div class="w-full h-48 bg-gray-300 overflow-hidden border border-gray-500"
                            style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">
                            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('assets/icons/default.png') }}"
                                alt="{{ $project->title }}" class="w-full h-full object-contain p-2" />
                        </div>

                        <h2 class="text-base font-bold text-black mt-3 truncate w-full">
                            {{ $project->title }}
                        </h2>

                        @if ($project->year)
                            <span class="text-gray-700 text-xs mt-1">{{ $project->year }}</span>
                        @endif

                        <p class="text-xs text-black my-2 w-full break-words">
                            {{ $project->content }}
                        </p>

                        <div class="flex-grow"></div>

                        @if ($project->stacks)
                            <div class="border-t pt-3 w-full border-gray-500 mt-auto">
                                <h3 class="text-right text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">
                                    Stacks</h3>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach (explode(',', $project->stacks) as $tag)
                                        <span
                                            class="bg-white text-black border border-gray-500 text-xs px-2 py-[1px] font-medium shadow-inner"
                                            style="box-shadow: inset -1px -1px 0 #888888, inset 1px 1px 0 #ffffff;">
                                            {{ trim($tag) }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="h-6 w-full bg-gray-300 border-t border-gray-500 text-xs px-4 text-black flex items-center justify-between flex-shrink-0"
            style="box-shadow: inset -1px -1px 0 #ffffff, inset 1px 1px 0 #888888;">
            <span class="font-bold">{{ $windows->count() }} items</span>
        </div>
    </div>
@endsection
