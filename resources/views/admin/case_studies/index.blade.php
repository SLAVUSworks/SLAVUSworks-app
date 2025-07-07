@extends('admin.layouts.admin')

@section('title', 'Case Study List')

@section('content')
    <div class="container mx-auto p-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Case Study List</h1>
            <a href="{{ route('admin.case-studies.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add New
            </a>
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Company</th>
                        <th class="border px-4 py-2">Duration</th>
                        <th class="border px-4 py-2">Images</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($caseStudies as $study)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $study->title }}</td>
                            <td class="border px-4 py-2">{{ $study->company }}</td>
                            <td class="border px-4 py-2">{{ $study->duration }}</td>
                            <td class="border px-4 py-2">
                                {{ $study->images->count() }} image(s)
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.case-studies.edit', $study->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('admin.case-studies.destroy', $study->id) }}" method="POST"
                                    class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-600 hover:underline btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border px-4 py-2 text-center">No case study found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
