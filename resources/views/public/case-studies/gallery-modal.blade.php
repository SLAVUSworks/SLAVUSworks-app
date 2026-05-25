@php
    $windowId = 'galleryWindow' . $caseStudy->id;
@endphp

<div id="{{ $windowId }}"
    class="window w-full md:w-[720px] bg-[#c0c0c0] max-w-[95vw] mx-auto shadow-xl absolute md:top-[10%] md:left-[10%] top-12 left-0 border border-gray-700 z-10"
    data-default="true">

    <div class="title-bar flex items-center justify-between px-2 bg-blue-700 text-white h-6">
        <span class="title-bar-text font-bold text-xs sm:text-sm truncate">Gallery: {{ $caseStudy->title }}</span>
        <div class="title-bar-controls flex gap-1 shrink-0">
            <button onclick="closeGallery()" class="w-4 h-4 bg-white text-black border border-gray-500 flex items-center justify-center text-xs">×</button>
        </div>
    </div>

    <div class="p-3 sm:p-4 overflow-y-auto max-h-[60vh]">
        @if ($caseStudy->images->count())
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 sm:gap-4">
                @foreach ($caseStudy->images as $image)
                    <div class="border border-black bg-white p-1">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Gallery Image"
                            class="w-full h-40 sm:h-64 object-contain">
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600 text-sm">No images available.</p>
        @endif
    </div>
</div>
