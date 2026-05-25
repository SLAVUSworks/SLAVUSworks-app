@extends('admin.layouts.admin')

@section('title', 'Add New Experience')

@section('content')
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Add New Experience</h2>
        <form action="{{ route('admin.experience.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Job Title</label>
                <input type="text" name="job_title" class="w-full border rounded px-3 py-2" value="{{ old('job_title') }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Company Name</label>
                <input type="text" name="company_name" class="w-full border rounded px-3 py-2"
                    value="{{ old('company_name') }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Category</label>
                <input type="text" name="category" class="w-full border rounded px-3 py-2"
                    value="{{ old('category') }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Job Position (optional)</label>
                <input type="text" name="job_position" class="w-full border rounded px-3 py-2"
                    value="{{ old('job_position') }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Start Date</label>
                <input type="datetime-local" name="start_date" class="w-full border rounded px-3 py-2"
                    value="{{ old('start_date') }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">End Date (leave empty for Present)</label>
                <input type="datetime-local" name="end_date" class="w-full border rounded px-3 py-2"
                    value="{{ old('end_date') }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Description (optional)</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
@endsection
