@extends('admin.layouts.admin')

@section('title', 'Edit Case Study')

@section('content')
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Case Study</h2>

        <form action="{{ route('admin.case-studies.update', $caseStudy->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2"
                    value="{{ old('title', $caseStudy->title) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Company</label>
                <input type="text" name="company" class="w-full border rounded px-3 py-2"
                    value="{{ old('company', $caseStudy->company) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Duration</label>
                <input type="text" name="duration" class="w-full border rounded px-3 py-2"
                    value="{{ old('duration', $caseStudy->duration) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Core Problem</label>
                <textarea name="core_problem" rows="3" class="w-full border rounded px-3 py-2" required>{{ old('core_problem', $caseStudy->core_problem) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Solution</label>
                <textarea name="solution" rows="3" class="w-full border rounded px-3 py-2" required>{{ old('solution', $caseStudy->solution) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Stacks</label>
                <input id="stacks-tagify" class="w-full border rounded px-3 py-2" placeholder="Laravel, Vue.js, MySQL">
                <input type="hidden" id="stacks" name="technologies_used"
                    value="{{ old('technologies_used', $caseStudy->technologies_used) }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Results (optional)</label>
                <textarea name="results" rows="2" class="w-full border rounded px-3 py-2">{{ old('results', $caseStudy->results) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Add More Images</label>
                <div id="image-input-wrapper" class="space-y-2">
                    <input type="file" name="images[]" class="w-full border rounded px-3 py-2">
                </div>
                <button type="button" id="add-image-input" class="mt-2 text-sm text-blue-600 hover:underline">
                    + Add another image
                </button>
            </div>


            @if ($caseStudy->images->count())
                <div class="mt-8 mb-4">
                    <label class="block font-medium mb-2">Existing Images</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($caseStudy->images as $image)
                            <div class="relative border rounded overflow-hidden">
                                <img src="{{ asset('storage/' . $image->path) }}" class="w-full h-32 object-cover">

                                <button type="button" onclick="deleteImage({{ $image->id }})"
                                    class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded z-10">
                                    X
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
@endsection

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

        function deleteImage(id) {
            Swal.fire({
                title: 'Delete this image?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`{{ url('admin/case-studies/image') }}/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            _method: 'DELETE'
                        })
                    }).then(() => location.reload());
                }
            });
        }
    </script>
@endpush
