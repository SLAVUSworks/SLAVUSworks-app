@extends('public.desktop')

@section('title', 'Case Studies')

@section('window')
    @php $windowId = 'caseStudiesWindow'; @endphp

    <div id="{{ $windowId }}"
        class="window w-[1100px] max-w-[95vw] h-[83vh] absolute top-[10%] left-[10%] z-10 border border-gray-700 bg-gray-100 shadow-xl flex flex-col"
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


        <div class="p-4 overflow-auto bg-[#c0c0c0] h-[calc(100%-50px)] space-y-10 w-full box-border">
            <div class="bg-blue-400 text-black p-4 border border-gray-500 shadow-inner flex flex-col font-sans text-sm"
                style="box-shadow: inset -2px -2px 0 #ffffff, inset 2px 2px 0 #888888;">
                <h1 class="text-white text-xl font-semibold">Project Based Case Studies.</h1>
                <p class="text-white text-sm mt-2">Implementing the project in a real case scenario to solve problems and
                    improve work efficiency.</p>
            </div>
            @foreach ($caseStudies as $case)
                <div class="p-4 border border-gray-500 shadow-inner font-sans text-black bg-gray-200"
                    style="box-shadow: inset -2px -2px 0px #ffffff, inset 2px 2px 0px #888888;">
                    <div class="text-2xl font-bold text-black">{{ $case->title }}</div>
                    <div class="text-red-600 text-base">{{ $case->company }}
                        <span class="text-black"> - {{ $case->duration }}</span>
                    </div>

                    <div class="grid md:grid-cols-3 gap-4 mt-4">
                        <div class="md:col-span-2 bg-gray-100 text-red-600 p-3"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-xl mb-2">Core Problem</h3>
                            <p class="text-black text-lg">{{ $case->core_problem }}</p>
                        </div>

                        <div class="bg-gray-100 text-red-600 p-3"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-xl mb-2">Technologies</h3>
                            <div class="text-black text-xs space-x-1">
                                @foreach (explode(',', $case->technologies_used ?? '') as $stack)
                                    <span
                                        class="inline-block border border-black bg-white px-2 py-1 mb-1">{{ trim($stack) }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="md:col-span-2 bg-gray-100 text-red-600 p-3"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-xl mb-2">Solutions</h3>
                            <p class="text-black text-lg">{{ $case->solution }}</p>
                        </div>

                        <div class="bg-gray-100 text-red-600 p-3 flex flex-col justify-between"
                            style="box-shadow: inset -1px -1px 0px #ffffff, inset 1px 1px 0px #888888;">
                            <h3 class="font-bold text-xl mb-2">Results</h3>
                            <p class="text-black text-lg whitespace-pre-line">{{ $case->results ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <p class="text-xs italic text-black">Abdurrahman Agha Rabbani -
                            {{ $case->created_at->format('m/d/Y') }}</p>
                        @if ($case->images->count())
                            <button onclick="openGalleryModal({{ $case->id }})"
                                class="border border-black bg-white text-black text-sm px-4 py-1 hover:bg-gray-100">
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
