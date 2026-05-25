@extends('public.desktop')

@section('title', 'Experience')

@section('window')
    @php
        $windowId = 'experienceWindow';
    @endphp

    <div id="{{ $windowId }}"
        class="window w-full md:w-[1000px] max-w-full h-[calc(100%-28px)] top-0 md:h-[83vh] absolute md:top-[5%] md:left-[10%] left-0 z-10 border border-gray-700 bg-gray-100 shadow-xl"
        data-default="true" style="display: none;">

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


        <div class="p-3 sm:p-4 overflow-auto bg-[#c0c0c0] h-[calc(100%-50px)]">
            <div class="bg-blue-400 text-black mb-4 p-3 sm:p-4 border border-gray-500 shadow-inner flex flex-col font-sans text-sm"
                style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">
                <h1 class="text-white text-lg sm:text-xl font-semibold">Experience</h1>
                <p class="text-white text-xs sm:text-sm mt-2">Work, Training & Education</p>
            </div>

            @php
                $groupedExperiences = $experiences
                    ->groupBy('category')
                    ->sortBy(function ($items) {
                        return $items->min('created_at'); // or created_date
                    });
            @endphp

            @foreach ($groupedExperiences as $category => $categoryExperiences)
                <div class="bg-yellow-500 text-black mb-3 p-2 sm:p-3 border border-gray-500 shadow-inner font-sans font-bold text-sm sm:text-base"
                    style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">
                    {{ ucfirst($category) }}
                </div>

                @foreach ($categoryExperiences as $index => $experience)
                    <div class="border-r border-black">
                        <div class="flex mb-4 overflow-hidden relative px-1 py-1 text-black bg-gray-200 border border-gray-500 shadow-inner font-sans cursor-pointer"
                            style="box-shadow: inset -2px -2px 0px #ffffff, inset 2px 2px 0px #888888;">

                            <div class="relative w-16 sm:w-20 bg-blue-300 text-black text-2xl sm:text-3xl font-bold flex items-center justify-center z-10 border-r border-gray-500 shrink-0"
                                style="box-shadow: inset -2px -2px 0px #ffffff, inset 2px 2px 0px #888888;">
                                {{ $loop->iteration }}
                            </div>

                            <div class="flex-1 p-3 sm:p-4 relative z-0 font-sans min-w-0">
                                <div class="flex justify-between items-center flex-col md:flex-row gap-2">
                                    <div class="w-full md:w-auto">
                                        <div class="font-bold text-lg sm:text-xl">{{ $experience->job_title }}</div>
                                        <div class="text-gray-700 text-xs sm:text-sm">{{ $experience->company_name }}</div>
                                        <div class="text-sm sm:text-base mt-1">{{ $experience->job_position ?? '-' }}</div>
                                    </div>
                                    <div class="text-right font-semibold text-xs sm:text-sm whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} –
                                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                    </div>
                                </div>

                                @if ($experience->description)
                                    <div class="mt-2 sm:mt-3 p-2 text-xs sm:text-sm text-black bg-white border border-gray-500 shadow-inner overflow-auto line-clamp-2"
                                        style="box-shadow: inset -1px -1px 0 #ffffff, inset 1px 1px 0 #888888;">
                                        {!! nl2br(e($experience->description)) !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="h-6 w-full bg-gray-300 border-t border-gray-500 text-xs px-4 text-black flex items-center justify-between flex-shrink-0"
            style="box-shadow: inset -1px -1px 0 #ffffff, inset 1px 1px 0 #888888;">
            <span class="font-bold">{{ $experiences->count() }} items</span>
        </div>
    </div>
@endsection
