@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Landing Window</h2>
        <form action="{{ route('admin.landing-windows.update', $landingWindow) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="type" class="block font-medium">Type</label>
                <input type="text" name="type" id="type" value="{{ $landingWindow->type }}" readonly
                    class="w-full border rounded px-3 py-2 bg-gray-100 cursor-not-allowed text-gray-700">
            </div>


            <div>
                <label for="title" class="block font-medium">Title</label>
                <input type="text" name="title" id="title" value="{{ $landingWindow->title }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label for="img" class="block font-medium">Image</label>
                <input type="file" name="img" id="img" class="w-full border rounded px-3 py-2">
                @if ($landingWindow->img)
                    <img src="{{ asset('storage/' . $landingWindow->img) }}" alt="Current Image" class="w-32 mt-2">
                @endif
            </div>

            <div>
                <label for="heading" class="block font-medium">Heading</label>
                <input type="text" name="heading" id="heading" value="{{ $landingWindow->heading }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label for="subheading" class="block font-medium">Subheading</label>
                <input type="text" name="subheading" id="subheading" value="{{ $landingWindow->subheading }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="content" class="block font-medium">Content</label>
                <textarea name="content" id="content" rows="5" class="w-full border rounded px-3 py-2">{{ $landingWindow->content }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
