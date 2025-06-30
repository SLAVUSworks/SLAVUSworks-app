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

        <div class="bg-[#2f9b9e] text-white text-xl font-semibold px-4 py-6">
            Slavus Projects List
        </div>

        <div class="p-4 overflow-auto h-[calc(100%-96px)]">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($windows as $project)
                    <div
                        class="flex flex-col items-start p-4 shadow-sm bg-white hover:shadow-md hover:bg-gray-100 transition-all duration-200 w-full h-full cursor-pointer select-none">

                        <div class="w-full h-48 bg-neutral-200 overflow-hidden">
                            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('assets/icons/default.png') }}"
                                alt="{{ $project->title }}" class="w-full h-full object-contain p-2" />
                        </div>

                        <h2 class="text-base md:text-lg font-semibold text-gray-900 mt-3 truncate w-full">
                            {{ $project->title }}
                        </h2>

                        @if ($project->year)
                            <span class="text-gray-500 text-xs mt-1">{{ $project->year }}</span>
                        @endif

                        <p class="text-sm text-gray-700 mt-2 w-full break-words">
                            {{ $project->content }}
                        </p>

                        @if ($project->stacks)
                            <div class="border-t mt-4 pt-3 w-full">
                                <h3 class="text-lg text-right font-semibold text-gray-600 mb-2 uppercase tracking-wide">
                                    Stacks</h3>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach (explode(',', $project->stacks) as $tag)
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">
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



    </div>
@endsection
