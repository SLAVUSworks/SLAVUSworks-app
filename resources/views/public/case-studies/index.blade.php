@extends('public.desktop')

@section('title', 'Case Studies')

@section('window')
    @php $windowId = 'caseStudiesWindow'; @endphp

    <div id="{{ $windowId }}"
        class="window w-full md:w-[1100px] max-w-full h-[calc(100%-28px)] top-0 md:h-[83vh] absolute md:top-[10%] md:left-[10%] left-0 z-10 border border-gray-700 bg-gray-100 shadow-xl flex flex-col"
        data-default="true" style="display: none;">

        <div class="title-bar">
            <div class="title-bar-text">Case Studies</div>
            <div class="title-bar-controls">
                <button class="bg-white text-black border border-gray-500" aria-label="Minimize"
                    onclick="minimizeWindow('{{ $windowId }}')"></button>
                <a href="{{ route('desktop') }}">
                    <button class="bg-white text-black border border-gray-500" aria-label="Close"
                        onclick="closeWindow('{{ $windowId }}')"></button>
                </a>
            </div>
        </div>


        <div class="p-3 sm:p-4 overflow-auto bg-[#c0c0c0] h-[calc(100%-50px)] space-y-6 sm:space-y-10 w-full box-border">
            <div class="bg-blue-400 text-black p-3 sm:p-4 border border-gray-500 shadow-inner flex flex-col font-sans text-xs sm:text-sm"
                style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">
                <h1 class="text-white text-lg sm:text-xl font-semibold">Project Based Case Studies.</h1>
                <p class="text-white text-xs sm:text-sm mt-2">Implementing the project in a real case scenario to solve problems and
                    improve work efficiency.</p>
            </div>
            @foreach ($caseStudies as $case)
                <div class="p-3 sm:p-4 border border-gray-500 shadow-inner font-sans text-black bg-gray-200"
                    style="box-shadow: inset -2px -2px 0px #ffffff, inset 2px 2px 0px #888888;">
                    <div class="text-xl sm:text-2xl font-bold text-black">{{ $case->title }}</div>
                    <div class="text-red-600 text-sm sm:text-base">{{ $case->company }}
                        <span class="text-black"> - {{ $case->duration }}</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 sm:gap-4 mt-4">
                        <div class="md:col-span-2 bg-gray-100 text-red-600 p-2 sm:p-3"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-lg sm:text-xl mb-2">Core Problem</h3>
                            <div class="text-black text-sm sm:text-lg [&>ul]:list-disc [&>ul]:pl-6 [&>ul>li]:mb-2">
                                {!! $case->core_problem !!}
                            </div>
                        </div>

                        <div class="bg-gray-100 p-3 sm:p-4"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-lg sm:text-xl text-yellow-600 mb-3">
                                Technologies
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach (explode(',', $case->technologies_used ?? '') as $stack)
                                    <span
                                        class="inline-flex items-center border border-gray-700 bg-white px-3 py-1 text-xs sm:text-sm text-black shadow-sm hover:bg-gray-50 transition">
                                        {{ trim($stack) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="md:col-span-2 bg-gray-100 text-green-600 p-2 sm:p-3"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-lg sm:text-xl mb-2">Solutions</h3>
                            <div class="text-black text-sm sm:text-lg [&>ul]:list-disc [&>ul]:pl-6 [&>ul>li]:mb-2">
                                {!! $case->solution !!}
                            </div>
                        </div>

                        <div class="bg-gray-100 text-blue-600 p-2 sm:p-3 flex flex-col justify-between"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-lg sm:text-xl mb-2">Results</h3>
                            <div class="text-black text-sm sm:text-lg [&>ul]:list-disc [&>ul]:pl-6 [&>ul>li]:mb-2">
                                {!! $case->results ?? '-' !!}
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mt-4 gap-2 sm:gap-0">
                        <p class="text-xs italic text-black">Abdurrahman Agha Rabbani -
                            {{ $case->created_at->format('m/d/Y') }}</p>
                        @if ($case->images->count())
                            <button onclick="openGalleryModal({{ $case->id }})"
                                class="border border-black bg-white text-black text-xs sm:text-sm px-4 py-1 hover:bg-gray-100">
                                Gallery
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="h-6 w-full bg-gray-300 border-t border-gray-500 text-xs px-4 text-black flex items-center justify-between flex-shrink-0"
            style="box-shadow: inset -1px -1px 0 #ffffff, inset 1px 1px 0 #888888;">
            <span class="font-bold">{{ $caseStudies->count() }} items</span>
        </div>
    </div>
    <div id="galleryModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden items-center justify-center">
        <div id="galleryContent"></div>
    </div>
@endsection

@push('scripts')
    <script>
        function openGalleryModal(id) {
            fetch(`/case-studies/${id}/gallery`)
                .then(response => response.text())
                .then(html => {
                    const modal = document.getElementById('galleryModal');
                    const content = document.getElementById('galleryContent');
                    content.innerHTML = html;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
        }

        function closeGallery() {
            const modal = document.getElementById('galleryModal');
            const content = document.getElementById('galleryContent');
            content.innerHTML = '';
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>
@endpush
