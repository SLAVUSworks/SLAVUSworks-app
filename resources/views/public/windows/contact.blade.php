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
            class="window w-[1000px] max-w-full mx-auto shadow-xl absolute top-[5%] left-[10%] border border-gray-700 bg-gray-100 z-10"
            @if ($i === 0) data-default="true" @endif>

            @include('public.windows.partials.navigation-bar')

            <div class="window-body p-4 bg-gray-200 text-sm">
                <div class="flex flex-col md:flex-row gap-4">

                    @include('public.windows.partials.shortcuts')

                    <div class="flex-1">
                        <p class="text-2xl font-bold">{{ $window['heading'] }}</p>
                        <p class="text-gray-700 mb-2">{{ $window['subheading'] }}</p>
                        <hr class="border-black mb-4">

                        <p class="text-xl font-semibold mb-4">{{ $window['title'] }}</p>

                        {!! $window['content'] !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
