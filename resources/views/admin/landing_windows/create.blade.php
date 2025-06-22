@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Add Landing Window</h2>
        <form action="{{ route('admin.landing-windows.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf

            <div>
                <label for="type" class="block font-medium">Type</label>
                <select name="type" id="type" class="w-full border rounded px-3 py-2">
                    @foreach ($remainingTypes as $type)
                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label for="title" class="block font-medium">Title</label>
                <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label for="img" class="block font-medium">Image</label>
                <input type="file" name="img" id="img" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="heading" class="block font-medium">Heading</label>
                <input type="text" name="heading" id="heading" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label for="subheading" class="block font-medium">Subheading</label>
                <input type="text" name="subheading" id="subheading" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="content" class="block font-medium">Content</label>
                <textarea name="content" id="content" rows="5" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
@endsection
