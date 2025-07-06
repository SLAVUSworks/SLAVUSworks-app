@extends('public.desktop')

@section('title', 'Experience')

@section('window')
    @php
        $windowId = 'experienceWindow';
    @endphp

    <div id="{{ $windowId }}" class="window w-full h-[calc(100%-28px)] absolute top-0 left-0 z-10" data-default="true"
        style="display:none;">

        <div class="title-bar">
            <div class="title-bar-text">Experience</div>
            <div class="title-bar-controls">
                <button class="bg-white text-black border border-gray-500" aria-label="Minimize"
                    onclick="minimizeWindow('{{ $windowId }}')"></button>
                <a href="{{ route('desktop') }}">
                    <button class="bg-white text-black border border-gray-500" aria-label="Close"
                        onclick="closeWindow('{{ $windowId }}')"></button>
                </a>
            </div>
        </div>

        <div class="bg-blue-400 text-white text-xl font-semibold px-4 py-6">
            Experience
        </div>

        <div class="p-4 px-[20em] overflow-auto h-[calc(100%-96px)]">
            @foreach ($experiences as $index => $experience)
                <div class="border-r border-black pr-1">
                    <div class="flex mb-8 overflow-hidden relative px-1 py-1 text-black bg-gray-200 border border-gray-500 shadow-inner font-sans cursor-pointer"
                        style="box-shadow: inset -2px -2px 0px #ffffff, inset 2px 2px 0px #888888;">

                        <div class="relative w-20 bg-blue-300 text-black text-3xl font-bold flex items-center justify-center z-10 border-r border-gray-500"
                            style="box-shadow: inset -2px -2px 0px #ffffff, inset 2px 2px 0px #888888;">
                            {{ $index + 1 }}
                        </div>

                        <div class="flex-1 p-4 relative z-0 font-sans">
                            <div class="flex justify-between items-center flex-col md:flex-row gap-2">
                                <div>
                                    <div class="font-bold text-2xl">{{ $experience->job_title }}</div>
                                    <div class="text-gray-700 text-lg">{{ $experience->company_name }}</div>
                                    <div class="text-xl mt-2">{{ $experience->job_position ?? '-' }}</div>
                                </div>
                                <div class="text-right font-semibold text-base whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} –
                                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                </div>
                            </div>

                            @if ($experience->description)
                                <div class="mt-4 p-2 text-lg text-justify text-black bg-white border border-gray-500 shadow-inner"
                                    style="box-shadow: inset -1px -1px 0 #ffffff, inset 1px 1px 0 #888888;">
                                    {!! nl2br(e($experience->description)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
