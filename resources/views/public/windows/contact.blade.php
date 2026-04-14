@extends('public.desktop')

@section('title', 'Contact')

@section('window')
    @php
        $routePrefix = Route::currentRouteName();
    @endphp

    @foreach ($windows as $i => $window)
        @php
            $windowId = $routePrefix . '-' . $window['id'] . '-' . $i;
        @endphp

        <div id="{{ $windowId }}"
            class="window w-full md:w-[1000px] max-w-full mx-auto shadow-xl border border-gray-700 bg-gray-100 z-10
                absolute md:top-[5%] md:left-[10%] top-0 left-0
                md:rounded-none rounded-none"
            @if ($i === 0) data-default="true" @endif>

            @include('public.windows.partials.navigation-bar')

            <div class="window-body p-3 sm:p-4 md:p-6 bg-gray-200 text-sm">
                <div class="flex flex-col md:flex-row gap-3 sm:gap-4 md:gap-6">

                    <div class="w-full md:w-[210px] shrink-0 order-2 md:order-1">
                        @include('public.windows.partials.shortcuts')
                    </div>

                    <div class="flex-1 order-1 md:order-2 min-w-0">
                        <p class="text-xl sm:text-2xl font-bold">{{ $window['heading'] }}</p>
                        <p class="text-gray-700 mb-2 text-sm sm:text-base">{{ $window['subheading'] }}</p>
                        <hr class="border-black mb-4">

                        <p class="text-lg sm:text-xl font-semibold mb-4">{{ $window['title'] }}</p>

                        {!! $window['content'] !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
