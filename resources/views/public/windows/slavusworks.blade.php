@extends('public.desktop')

@section('title', 'SLAVUSworks')

@section('window')
    @php
        $routePrefix = Route::currentRouteName();
    @endphp

    @foreach ($windows as $i => $window)
        @php
            $windowId = $routePrefix . '-' . $window['id'] . '-' . $i;
        @endphp

        <div id="{{ $windowId }}"
            class="window w-[720px] max-w-full mx-auto shadow-xl absolute top-[10%] left-[10%] border border-gray-700 bg-gray-100 z-10"
            @if ($i === 0) data-default="true" @endif>

            <div class="title-bar flex items-center justify-between px-2 bg-blue-700 text-white h-6">
                <span class="title-bar-text font-bold text-sm">{{ $window['title'] }}</span>
                <div class="title-bar-controls flex gap-1">
                    <button onclick="minimizeWindow('{{ $windowId }}')"
                        class="w-4 h-4 bg-white text-black border border-gray-500">–</button>
                    <a href="{{ route('desktop') }}">
                        <button class="w-4 h-4 bg-white text-black border border-gray-500"
                            onclick="closeWindow('{{ $windowId }}')">×</button>
                    </a>
                </div>
            </div>

            <div class="window-body p-4 bg-gray-200 text-sm">
                <div class="flex gap-4">
                    <div class="flex flex-col items-center gap-4 border-r border-black pr-4">
                        <img src="{{ asset('storage/' . $window['img']) }}" alt="ini img" class="w-full h-40" />
                        <a class="w-full h-10" href="{{ route('biography') }}"><button
                                class="w-full h-10 bg-white border border-black">About Me</button></a>
                        <a class="w-full h-10" href="{{ route('slavusworks') }}"><button
                                class="w-full h-10 bg-white border border-black">SLAVUSworks</button></a>
                        <a class="w-full h-10" href="{{ route('contact') }}"><button
                                class="w-full h-10 bg-white border border-black">Contact</button></a>
                    </div>

                    <div class="flex-1">
                        <p class="text-2xl font-bold">{{ $window['heading'] }}</p>
                        <p class="text-gray-700 mb-2">{{ $window['subheading'] }}</p>
                        <hr class="border-black mb-4">

                        <p class="text-xl font-semibold">{{ $window['title'] }}</p>
                        <p>{{ $window['content'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
