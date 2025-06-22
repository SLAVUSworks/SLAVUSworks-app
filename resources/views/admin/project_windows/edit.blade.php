@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Project</h1>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2"
                    value="{{ old('title', $project->title) }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Image</label>
                <input type="file" name="image" class="w-full">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="" class="mt-2 w-32 h-32 object-cover">
                @endif
            </div>

            <div class="mb-4">
                <label class="block font-medium">Content</label>
                <textarea name="content" class="w-full border rounded px-3 py-2" rows="5">{{ old('content', $project->content) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
