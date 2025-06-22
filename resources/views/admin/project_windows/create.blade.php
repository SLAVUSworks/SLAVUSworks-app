@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Create Project</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Image</label>
                <input type="file" name="image" class="w-full">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Content</label>
                <textarea name="content" class="w-full border rounded px-3 py-2" rows="5">{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
@endsection
