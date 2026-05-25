@extends('admin.layouts.admin')

@section('title', 'Edit Experience')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Experience</h1>

        <form action="{{ route('admin.experience.update', $experience->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Job Title</label>
                <input type="text" name="job_title" class="w-full border rounded px-3 py-2"
                    value="{{ old('job_title', $experience->job_title) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Company Name</label>
                <input type="text" name="company_name" class="w-full border rounded px-3 py-2"
                    value="{{ old('company_name', $experience->company_name) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Category</label>
                <input type="text" name="category" class="w-full border rounded px-3 py-2"
                    value="{{ old('category', $experience->category) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Job Position (optional)</label>
                <input type="text" name="job_position" class="w-full border rounded px-3 py-2"
                    value="{{ old('job_position', $experience->job_position) }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Start Date</label>
                <input type="datetime-local" name="start_date" class="w-full border rounded px-3 py-2"
                    value="{{ old('start_date', \Carbon\Carbon::parse($experience->start_date)->format('Y-m-d\TH:i')) }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">End Date (leave empty for Present)</label>
                <input type="datetime-local" name="end_date" class="w-full border rounded px-3 py-2"
                    value="{{ old('end_date', $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y-m-d\TH:i') : '') }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Description (optional)</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description', $experience->description) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
