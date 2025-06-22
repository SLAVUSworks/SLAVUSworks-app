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
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($windows as $project)
                    <a href="{{ route('projectshow', $project->slug) }}"
                        onclick="openWindow('project-{{ $project->slug }}')"
                        class="flex flex-col items-start cursor-pointer select-none hover:bg-gray-300 p-2 rounded">

                        <div class="w-full aspect-square bg-neutral-800 overflow-hidden">
                            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('assets/icons/default.png') }}"
                                alt="{{ $project->title }}" class="w-full h-full object-cover" />
                        </div>

                        <h2 class="text-xl font-bold text-gray-800 mt-2">
                            {{ $project->title }}
                        </h2>

                        <span class="text-gray-600 text-sm">202x</span> {{-- Ganti ini jika kamu punya data tahun --}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
