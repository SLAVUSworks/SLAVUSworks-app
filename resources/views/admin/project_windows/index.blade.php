@extends('admin.layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Projects</h1>
            <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add New
            </a>
        </div>

        @if ($projects->count())
            <div class="grid grid-cols-1 gap-4">
                @foreach ($projects as $project)
                    <div class="border p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">{{ $project->title }}</h2>
                        <p class="text-sm text-gray-600">{{ $project->slug }}</p>
                        <div class="mt-2">
                            <a href="{{ route('admin.projects.edit', $project->slug) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-600 hover:underline ml-2 btn-delete">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No projects found.</p>
        @endif
    </div>
    @push('scripts')
        <script>
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
