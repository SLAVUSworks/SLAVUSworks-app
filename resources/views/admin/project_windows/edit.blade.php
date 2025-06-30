@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Project</h1>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2"
                    value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Year</label>
                <input type="number" name="year" class="w-full border rounded px-3 py-2"
                    value="{{ old('year', $project->year) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Image</label>
                @if ($project->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image"
                            class="w-32 h-auto rounded">
                    </div>
                @endif
                <input type="file" name="image" class="w-full">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Content</label>
                <textarea name="content" class="w-full border rounded px-3 py-2" rows="5">{{ old('content', $project->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Stacks</label>

                <input id="stacks-tagify" class="w-full border rounded px-3 py-2">

                <input type="hidden" id="stacks" name="stacks" value="{{ old('stacks', $project->stacks) }}">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
