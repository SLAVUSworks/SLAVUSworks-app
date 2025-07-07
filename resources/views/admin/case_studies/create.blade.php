@extends('admin.layouts.admin')

@section('title', 'Add New Case Study')

@section('content')
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Add New Case Study</h2>
        <form action="{{ route('admin.case-studies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Company</label>
                <input type="text" name="company" class="w-full border rounded px-3 py-2" value="{{ old('company') }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Duration</label>
                <input type="text" name="duration" class="w-full border rounded px-3 py-2" value="{{ old('duration') }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Core Problem</label>
                <textarea name="core_problem" rows="3" class="w-full border rounded px-3 py-2" required>{{ old('core_problem') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Solution</label>
                <textarea name="solution" rows="3" class="w-full border rounded px-3 py-2" required>{{ old('solution') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Stacks</label>
                <input id="stacks-tagify" class="w-full border rounded px-3 py-2" placeholder="Laravel, Vue.js, MySQL">
                <input type="hidden" id="stacks" name="technologies_used" value="{{ old('technologies_used') }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Results (optional)</label>
                <textarea name="results" rows="2" class="w-full border rounded px-3 py-2">{{ old('results') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Upload Images</label>
                <div id="image-input-wrapper" class="space-y-2">
                    <input type="file" name="images[]" class="w-full border rounded px-3 py-2">
                </div>
                <button type="button" id="add-image-input" class="mt-2 text-sm text-blue-600 hover:underline">+ Add another
                    image</button>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
    @push('scripts')
        <script>
            document.getElementById('add-image-input').addEventListener('click', function() {
                const wrapper = document.getElementById('image-input-wrapper');
                const input = document.createElement('input');
                input.type = 'file';
                input.name = 'images[]';
                input.className = 'w-full border rounded px-3 py-2';
                wrapper.appendChild(input);
            });
        </script>
    @endpush
@endsection
